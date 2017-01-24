<?php

namespace App\Libraries;

/*
 * jQuery File Upload Plugin PHP Class
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

class UploadHandler
{
    protected $options;

    // PHP File Upload error message codes:
    // http://php.net/manual/en/features.file-upload.errors.php
    protected $error_messages = [
        1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
        3 => 'The uploaded file was only partially uploaded',
        4 => 'No file was uploaded',
        6 => 'Missing a temporary folder',
        7 => 'Failed to write file to disk',
        8 => 'A PHP extension stopped the file upload',
        'post_max_size' => 'The uploaded file exceeds the post_max_size directive in php.ini',
        'max_file_size' => 'File is too big',
        'min_file_size' => 'File is too small',
        'accept_file_types' => 'Filetype not allowed',
        'max_number_of_files' => 'Maximum number of files exceeded',
        'max_width' => 'Image exceeds maximum width',
        'min_width' => 'Image requires a minimum width',
        'max_height' => 'Image exceeds maximum height',
        'min_height' => 'Image requires a minimum height',
        'abort' => 'File upload aborted',
        'image_resize' => 'Failed to resize image',
    ];

    protected $image_objects = [];
    protected $req;
    protected $res;
    protected $opts;

    public function __construct(array $options = [], $initialize = true, array $error_messages = [])
    {
        $this->req = new RequestHandler();
        $this->res = new ResponseHandler();
        $this->opts = new UploadHandlerOptions($options, $this->req);

        $this->error_messages = $error_messages + $this->error_messages;
        if ($initialize) {
            $this->initialize();
        }
    }

    protected function initialize()
    {
        switch ($this->req->get_server_var('REQUEST_METHOD')) {
            case 'OPTIONS':
            case 'HEAD':
                $this->head();
                break;
            case 'GET':
                $this->get($this->opts->options['print_response']);
                break;
            case 'PATCH':
            case 'PUT':
            case 'POST':
                $this->post($this->opts->options['print_response']);
                break;
            case 'DELETE':
                $this->delete($this->opts->options['print_response']);
                break;
            default:
                $this->res->header('HTTP/1.1 405 Method Not Allowed');
        }
    }

    protected function get_upload_path($file_name = null, $version = null)
    {
        $file_name = $file_name ? $file_name : '';
        if (empty($version)) {
            $version_path = '';
        } else {
            $version_dir = @$this->opts->options['image_versions'][$version]['upload_dir'];
            if ($version_dir) {
                return $version_dir.$this->opts->get_user_path().$file_name;
            }
            $version_path = $version.'/';
        }

        return $this->opts->options['upload_dir'].$this->opts->get_user_path()
            .$version_path.$file_name;
    }

    protected function get_query_separator($url)
    {
        return strpos($url, '?') === false ? '?' : '&';
    }

    protected function get_download_url($file_name, $version = null, $direct = false)
    {
        if (! $direct && $this->opts->options['download_via_php']) {
            $url = $this->opts->options['script_url']
                .$this->get_query_separator($this->opts->options['script_url'])
                .$this->opts->get_singular_param_name()
                .'='.rawurlencode($file_name);
            if ($version) {
                $url .= '&version='.rawurlencode($version);
            }

            return $url.'&download=1';
        }
        if (empty($version)) {
            $version_path = '';
        } else {
            $version_url = @$this->opts->options['image_versions'][$version]['upload_url'];
            if ($version_url) {
                return $version_url.$this->opts->get_user_path().rawurlencode($file_name);
            }
            $version_path = rawurlencode($version).'/';
        }

        return $this->opts->options['upload_url'].$this->opts->get_user_path()
            .$version_path.rawurlencode($file_name);
    }

    protected function set_additional_file_properties($file)
    {
        $file->deleteUrl = $this->opts->options['script_url']
            .$this->get_query_separator($this->opts->options['script_url'])
            .$this->opts->get_singular_param_name()
            .'='.rawurlencode($file->name);
        $file->deleteType = $this->opts->options['delete_type'];
        if ($file->deleteType !== 'DELETE') {
            $file->deleteUrl .= '&_method=DELETE';
        }
        if ($this->opts->options['access_control_allow_credentials']) {
            $file->deleteWithCredentials = true;
        }
    }

    // Fix for overflowing signed 32 bit integers,
    // works for sizes up to 2^32-1 bytes (4 GiB - 1):
    protected function fix_integer_overflow($size)
    {
        if ($size < 0) {
            $size += 2.0 * (PHP_INT_MAX + 1);
        }

        return $size;
    }

    protected function get_file_size($file_path, $clear_stat_cache = false)
    {
        if ($clear_stat_cache) {
            if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
                clearstatcache(true, $file_path);
            } else {
                clearstatcache();
            }
        }

        return $this->fix_integer_overflow(filesize($file_path));
    }

    protected function is_valid_file_object($file_name)
    {
        $file_path = $this->get_upload_path($file_name);
        if (is_file($file_path) && $file_name[0] !== '.') {
            return true;
        }

        return false;
    }

    protected function get_file_object($file_name)
    {
        if ($this->is_valid_file_object($file_name)) {
            $file = new \stdClass();
            $file->name = $file_name;
            $file->size = $this->get_file_size(
                $this->get_upload_path($file_name)
            );
            $file->url = $this->get_download_url($file->name);
            foreach ($this->opts->options['image_versions'] as $version => $options) {
                if (! empty($version)) {
                    if (is_file($this->get_upload_path($file_name, $version))) {
                        $file->{$version.'Url'} = $this->get_download_url(
                            $file->name,
                            $version
                        );
                    }
                }
            }
            $this->set_additional_file_properties($file);

            return $file;
        }
    }

    protected function get_file_objects($iteration_method = 'get_file_object')
    {
        $upload_dir = $this->get_upload_path();
        if (! is_dir($upload_dir)) {
            return [];
        }

        return array_values(array_filter(array_map(
            [$this, $iteration_method],
            scandir($upload_dir)
        )));
    }

    protected function count_file_objects()
    {
        return count($this->get_file_objects('is_valid_file_object'));
    }

    protected function get_error_message($error)
    {
        return isset($this->error_messages[$error]) ?
            $this->error_messages[$error] : $error;
    }

    public function get_config_bytes($val)
    {
        $val = trim($val);
        $last = strtolower($val[strlen($val) - 1]);
        $val = (int) $val;
        switch ($last) {
            case 'g':
                $val *= 1024;
            case 'm':
                $val *= 1024;
            case 'k':
                $val *= 1024;
        }

        return $this->fix_integer_overflow($val);
    }

    protected function validate($uploaded_file, $file, $error, $index)
    {
        if ($error) {
            $file->error = $this->get_error_message($error);

            return false;
        }
        $content_length = $this->fix_integer_overflow(
            (int) $this->req->get_server_var('CONTENT_LENGTH')
        );
        $post_max_size = $this->get_config_bytes(ini_get('post_max_size'));
        if ($post_max_size && ($content_length > $post_max_size)) {
            $file->error = $this->get_error_message('post_max_size');

            return false;
        }
        if (! preg_match($this->opts->options['accept_file_types'], $file->name)) {
            $file->error = $this->get_error_message('accept_file_types');

            return false;
        }
        if ($uploaded_file && is_uploaded_file($uploaded_file)) {
            $file_size = $this->get_file_size($uploaded_file);
        } else {
            $file_size = $content_length;
        }
        if ($this->opts->options['max_file_size'] && (
                $file_size > $this->opts->options['max_file_size'] ||
                $file->size > $this->opts->options['max_file_size'])
            ) {
            $file->error = $this->get_error_message('max_file_size');

            return false;
        }
        if ($this->opts->options['min_file_size'] &&
            $file_size < $this->opts->options['min_file_size']) {
            $file->error = $this->get_error_message('min_file_size');

            return false;
        }
        if (is_int($this->opts->options['max_number_of_files']) &&
                ($this->count_file_objects() >= $this->opts->options['max_number_of_files']) &&
                // Ignore additional chunks of existing files:
                ! is_file($this->get_upload_path($file->name))) {
            $file->error = $this->get_error_message('max_number_of_files');

            return false;
        }
        $max_width = @$this->opts->options['max_width'];
        $max_height = @$this->opts->options['max_height'];
        $min_width = @$this->opts->options['min_width'];
        $min_height = @$this->opts->options['min_height'];
        if (($max_width || $max_height || $min_width || $min_height)
           && preg_match($this->opts->options['image_file_types'], $file->name)) {
            list($img_width, $img_height) = $this->get_image_size($uploaded_file);

            // If we are auto rotating the image by default, do the checks on
            // the correct orientation
            if (
                @$this->opts->options['image_versions']['']['auto_orient'] &&
                function_exists('exif_read_data') &&
                ($exif = @exif_read_data($uploaded_file)) &&
                (((int) @$exif['Orientation']) >= 5)
            ) {
                $tmp = $img_width;
                $img_width = $img_height;
                $img_height = $tmp;
                unset($tmp);
            }
        }
        if (! empty($img_width)) {
            if ($max_width && $img_width > $max_width) {
                $file->error = $this->get_error_message('max_width');

                return false;
            }
            if ($max_height && $img_height > $max_height) {
                $file->error = $this->get_error_message('max_height');

                return false;
            }
            if ($min_width && $img_width < $min_width) {
                $file->error = $this->get_error_message('min_width');

                return false;
            }
            if ($min_height && $img_height < $min_height) {
                $file->error = $this->get_error_message('min_height');

                return false;
            }
        }

        return true;
    }

    protected function upcount_name_callback($matches)
    {
        $index = isset($matches[1]) ? ((int) $matches[1]) + 1 : 1;
        $ext = isset($matches[2]) ? $matches[2] : '';

        return ' ('.$index.')'.$ext;
    }

    protected function upcount_name($name)
    {
        return preg_replace_callback(
            '/(?:(?: \(([\d]+)\))?(\.[^.]+))?$/',
            [$this, 'upcount_name_callback'],
            $name,
            1
        );
    }

    protected function get_unique_filename($file_path, $name, $size, $type, $error,
            $index, $content_range)
    {
        while (is_dir($this->get_upload_path($name))) {
            $name = $this->upcount_name($name);
        }
        // Keep an existing filename if this is part of a chunked upload:
        $uploaded_bytes = $this->fix_integer_overflow((int) $content_range[1]);
        while (is_file($this->get_upload_path($name))) {
            if ($uploaded_bytes === $this->get_file_size(
                    $this->get_upload_path($name))) {
                break;
            }
            $name = $this->upcount_name($name);
        }

        return $name;
    }

    protected function fix_file_extension($file_path, $name, $size, $type, $error,
            $index, $content_range)
    {
        // Add missing file extension for known image types:
        if (strpos($name, '.') === false &&
                preg_match('/^image\/(gif|jpe?g|png)/', $type, $matches)) {
            $name .= '.'.$matches[1];
        }
        if ($this->opts->options['correct_image_extensions'] &&
                function_exists('exif_imagetype')) {
            switch (@exif_imagetype($file_path)) {
                case IMAGETYPE_JPEG:
                    $extensions = ['jpg', 'jpeg'];
                    break;
                case IMAGETYPE_PNG:
                    $extensions = ['png'];
                    break;
                case IMAGETYPE_GIF:
                    $extensions = ['gif'];
                    break;
            }
            // Adjust incorrect image file extensions:
            if (! empty($extensions)) {
                $parts = explode('.', $name);
                $extIndex = count($parts) - 1;
                $ext = strtolower(@$parts[$extIndex]);
                if (! in_array($ext, $extensions)) {
                    $parts[$extIndex] = $extensions[0];
                    $name = implode('.', $parts);
                }
            }
        }

        return $name;
    }

    protected function trim_file_name($file_path, $name, $size, $type, $error,
            $index, $content_range)
    {
        // Remove path information and dots around the filename, to prevent uploading
        // into different directories or replacing hidden system files.
        // Also remove control characters and spaces (\x00..\x20) around the filename:
        $name = trim($this->basename(stripslashes($name)), ".\x00..\x20");
        // Use a timestamp for empty filenames:
        if (! $name) {
            $name = str_replace('.', '-', microtime(true));
        }

        return $name;
    }

    protected function get_file_name($file_path, $name, $size, $type, $error,
            $index, $content_range)
    {
        $name = $this->trim_file_name($file_path, $name, $size, $type, $error,
            $index, $content_range);

        return $this->get_unique_filename(
            $file_path,
            $this->fix_file_extension($file_path, $name, $size, $type, $error,
                $index, $content_range),
            $size,
            $type,
            $error,
            $index,
            $content_range
        );
    }

    protected function get_scaled_image_file_paths($file_name, $version)
    {
        $file_path = $this->get_upload_path($file_name);
        if (! empty($version)) {
            $version_dir = $this->get_upload_path(null, $version);
            if (! is_dir($version_dir)) {
                mkdir($version_dir, $this->opts->options['mkdir_mode'], true);
            }
            $new_file_path = $version_dir.'/'.$file_name;
        } else {
            $new_file_path = $file_path;
        }

        return [$file_path, $new_file_path];
    }

    protected function gd_get_image_object($file_path, $func, $no_cache = false)
    {
        if (empty($this->image_objects[$file_path]) || $no_cache) {
            $this->gd_destroy_image_object($file_path);
            $this->image_objects[$file_path] = $func($file_path);
        }

        return $this->image_objects[$file_path];
    }

    protected function gd_set_image_object($file_path, $image)
    {
        $this->gd_destroy_image_object($file_path);
        $this->image_objects[$file_path] = $image;
    }

    protected function gd_destroy_image_object($file_path)
    {
        $image = (isset($this->image_objects[$file_path])) ? $this->image_objects[$file_path] : null;

        return $image && imagedestroy($image);
    }

    protected function gd_imageflip($image, $mode)
    {
        if (function_exists('imageflip')) {
            return imageflip($image, $mode);
        }
        $new_width = $src_width = imagesx($image);
        $new_height = $src_height = imagesy($image);
        $new_img = imagecreatetruecolor($new_width, $new_height);
        $src_x = 0;
        $src_y = 0;
        switch ($mode) {
            case '1': // flip on the horizontal axis
                $src_y = $new_height - 1;
                $src_height = -$new_height;
                break;
            case '2': // flip on the vertical axis
                $src_x = $new_width - 1;
                $src_width = -$new_width;
                break;
            case '3': // flip on both axes
                $src_y = $new_height - 1;
                $src_height = -$new_height;
                $src_x = $new_width - 1;
                $src_width = -$new_width;
                break;
            default:
                return $image;
        }
        imagecopyresampled(
            $new_img,
            $image,
            0,
            0,
            $src_x,
            $src_y,
            $new_width,
            $new_height,
            $src_width,
            $src_height
        );

        return $new_img;
    }

    protected function gd_orient_image($file_path, $src_img)
    {
        if (! function_exists('exif_read_data')) {
            return false;
        }
        $exif = @exif_read_data($file_path);
        if ($exif === false) {
            return false;
        }
        $orientation = (int) @$exif['Orientation'];
        if ($orientation < 2 || $orientation > 8) {
            return false;
        }
        switch ($orientation) {
            case 2:
                $new_img = $this->gd_imageflip(
                    $src_img,
                    defined('IMG_FLIP_VERTICAL') ? IMG_FLIP_VERTICAL : 2
                );
                break;
            case 3:
                $new_img = imagerotate($src_img, 180, 0);
                break;
            case 4:
                $new_img = $this->gd_imageflip(
                    $src_img,
                    defined('IMG_FLIP_HORIZONTAL') ? IMG_FLIP_HORIZONTAL : 1
                );
                break;
            case 5:
                $tmp_img = $this->gd_imageflip(
                    $src_img,
                    defined('IMG_FLIP_HORIZONTAL') ? IMG_FLIP_HORIZONTAL : 1
                );
                $new_img = imagerotate($tmp_img, 270, 0);
                imagedestroy($tmp_img);
                break;
            case 6:
                $new_img = imagerotate($src_img, 270, 0);
                break;
            case 7:
                $tmp_img = $this->gd_imageflip(
                    $src_img,
                    defined('IMG_FLIP_VERTICAL') ? IMG_FLIP_VERTICAL : 2
                );
                $new_img = imagerotate($tmp_img, 270, 0);
                imagedestroy($tmp_img);
                break;
            case 8:
                $new_img = imagerotate($src_img, 90, 0);
                break;
            default:
                return false;
        }
        $this->gd_set_image_object($file_path, $new_img);

        return true;
    }

    protected function gd_create_scaled_image($file_name, $version, $options)
    {
        if (! function_exists('imagecreatetruecolor')) {
            error_log('Function not found: imagecreatetruecolor');

            return false;
        }
        list($file_path, $new_file_path) =
            $this->get_scaled_image_file_paths($file_name, $version);
        $type = strtolower(substr(strrchr($file_name, '.'), 1));
        switch ($type) {
            case 'jpg':
            case 'jpeg':
                $src_func = 'imagecreatefromjpeg';
                $write_func = 'imagejpeg';
                $image_quality = isset($options['jpeg_quality']) ?
                    $options['jpeg_quality'] : 75;
                break;
            case 'gif':
                $src_func = 'imagecreatefromgif';
                $write_func = 'imagegif';
                $image_quality = null;
                break;
            case 'png':
                $src_func = 'imagecreatefrompng';
                $write_func = 'imagepng';
                $image_quality = isset($options['png_quality']) ?
                    $options['png_quality'] : 9;
                break;
            default:
                return false;
        }
        $src_img = $this->gd_get_image_object(
            $file_path,
            $src_func,
            ! empty($options['no_cache'])
        );
        $image_oriented = false;
        if (! empty($options['auto_orient']) && $this->gd_orient_image(
                $file_path,
                $src_img
            )) {
            $image_oriented = true;
            $src_img = $this->gd_get_image_object(
                $file_path,
                $src_func
            );
        }
        $max_width = $img_width = imagesx($src_img);
        $max_height = $img_height = imagesy($src_img);
        if (! empty($options['max_width'])) {
            $max_width = $options['max_width'];
        }
        if (! empty($options['max_height'])) {
            $max_height = $options['max_height'];
        }
        $scale = min(
            $max_width / $img_width,
            $max_height / $img_height
        );
        if ($scale >= 1) {
            if ($image_oriented) {
                return $write_func($src_img, $new_file_path, $image_quality);
            }
            if ($file_path !== $new_file_path) {
                return copy($file_path, $new_file_path);
            }

            return true;
        }
        if (empty($options['crop'])) {
            $new_width = $img_width * $scale;
            $new_height = $img_height * $scale;
            $dst_x = 0;
            $dst_y = 0;
            $new_img = imagecreatetruecolor($new_width, $new_height);
        } else {
            if (($img_width / $img_height) >= ($max_width / $max_height)) {
                $new_width = $img_width / ($img_height / $max_height);
                $new_height = $max_height;
            } else {
                $new_width = $max_width;
                $new_height = $img_height / ($img_width / $max_width);
            }
            $dst_x = 0 - ($new_width - $max_width) / 2;
            $dst_y = 0 - ($new_height - $max_height) / 2;
            $new_img = imagecreatetruecolor($max_width, $max_height);
        }
        // Handle transparency in GIF and PNG images:
        switch ($type) {
            case 'gif':
            case 'png':
                imagecolortransparent($new_img, imagecolorallocate($new_img, 0, 0, 0));
            case 'png':
                imagealphablending($new_img, false);
                imagesavealpha($new_img, true);
                break;
        }
        $success = imagecopyresampled(
            $new_img,
            $src_img,
            $dst_x,
            $dst_y,
            0,
            0,
            $new_width,
            $new_height,
            $img_width,
            $img_height
        ) && $write_func($new_img, $new_file_path, $image_quality);
        $this->gd_set_image_object($file_path, $new_img);

        return $success;
    }

    protected function imagick_get_image_object($file_path, $no_cache = false)
    {
        if (empty($this->image_objects[$file_path]) || $no_cache) {
            $this->imagick_destroy_image_object($file_path);
            $image = new \Imagick();
            if (! empty($this->opts->options['imagick_resource_limits'])) {
                foreach ($this->opts->options['imagick_resource_limits'] as $type => $limit) {
                    $image->setResourceLimit($type, $limit);
                }
            }
            $image->readImage($file_path);
            $this->image_objects[$file_path] = $image;
        }

        return $this->image_objects[$file_path];
    }

    protected function imagick_set_image_object($file_path, $image)
    {
        $this->imagick_destroy_image_object($file_path);
        $this->image_objects[$file_path] = $image;
    }

    protected function imagick_destroy_image_object($file_path)
    {
        $image = (isset($this->image_objects[$file_path])) ? $this->image_objects[$file_path] : null;

        return $image && $image->destroy();
    }

    protected function imagick_orient_image($image)
    {
        $orientation = $image->getImageOrientation();
        $background = new \ImagickPixel('none');
        switch ($orientation) {
            case \imagick::ORIENTATION_TOPRIGHT: // 2
                $image->flopImage(); // horizontal flop around y-axis
                break;
            case \imagick::ORIENTATION_BOTTOMRIGHT: // 3
                $image->rotateImage($background, 180);
                break;
            case \imagick::ORIENTATION_BOTTOMLEFT: // 4
                $image->flipImage(); // vertical flip around x-axis
                break;
            case \imagick::ORIENTATION_LEFTTOP: // 5
                $image->flopImage(); // horizontal flop around y-axis
                $image->rotateImage($background, 270);
                break;
            case \imagick::ORIENTATION_RIGHTTOP: // 6
                $image->rotateImage($background, 90);
                break;
            case \imagick::ORIENTATION_RIGHTBOTTOM: // 7
                $image->flipImage(); // vertical flip around x-axis
                $image->rotateImage($background, 270);
                break;
            case \imagick::ORIENTATION_LEFTBOTTOM: // 8
                $image->rotateImage($background, 270);
                break;
            default:
                return false;
        }
        $image->setImageOrientation(\imagick::ORIENTATION_TOPLEFT); // 1
        return true;
    }

    protected function imagick_create_scaled_image($file_name, $version, $options)
    {
        list($file_path, $new_file_path) =
            $this->get_scaled_image_file_paths($file_name, $version);
        $image = $this->imagick_get_image_object(
            $file_path,
            ! empty($options['crop']) || ! empty($options['no_cache'])
        );
        if ($image->getImageFormat() === 'GIF') {
            // Handle animated GIFs:
            $images = $image->coalesceImages();
            foreach ($images as $frame) {
                $image = $frame;
                $this->imagick_set_image_object($file_name, $image);
                break;
            }
        }
        $image_oriented = false;
        if (! empty($options['auto_orient'])) {
            $image_oriented = $this->imagick_orient_image($image);
        }
        $new_width = $max_width = $img_width = $image->getImageWidth();
        $new_height = $max_height = $img_height = $image->getImageHeight();
        if (! empty($options['max_width'])) {
            $new_width = $max_width = $options['max_width'];
        }
        if (! empty($options['max_height'])) {
            $new_height = $max_height = $options['max_height'];
        }
        if (! ($image_oriented || $max_width < $img_width || $max_height < $img_height)) {
            if ($file_path !== $new_file_path) {
                return copy($file_path, $new_file_path);
            }

            return true;
        }
        $crop = ! empty($options['crop']);
        if ($crop) {
            $x = 0;
            $y = 0;
            if (($img_width / $img_height) >= ($max_width / $max_height)) {
                $new_width = 0; // Enables proportional scaling based on max_height
                $x = ($img_width / ($img_height / $max_height) - $max_width) / 2;
            } else {
                $new_height = 0; // Enables proportional scaling based on max_width
                $y = ($img_height / ($img_width / $max_width) - $max_height) / 2;
            }
        }
        $success = $image->resizeImage(
            $new_width,
            $new_height,
            isset($options['filter']) ? $options['filter'] : \imagick::FILTER_LANCZOS,
            isset($options['blur']) ? $options['blur'] : 1,
            $new_width && $new_height // fit image into constraints if not to be cropped
        );
        if ($success && $crop) {
            $success = $image->cropImage(
                $max_width,
                $max_height,
                $x,
                $y
            );
            if ($success) {
                $success = $image->setImagePage($max_width, $max_height, 0, 0);
            }
        }
        $type = strtolower(substr(strrchr($file_name, '.'), 1));
        switch ($type) {
            case 'jpg':
            case 'jpeg':
                if (! empty($options['jpeg_quality'])) {
                    $image->setImageCompression(\imagick::COMPRESSION_JPEG);
                    $image->setImageCompressionQuality($options['jpeg_quality']);
                }
                break;
        }
        if (! empty($options['strip'])) {
            $image->stripImage();
        }

        return $success && $image->writeImage($new_file_path);
    }

    protected function imagemagick_create_scaled_image($file_name, $version, $options)
    {
        list($file_path, $new_file_path) =
            $this->get_scaled_image_file_paths($file_name, $version);
        $resize = @$options['max_width']
            .(empty($options['max_height']) ? '' : 'X'.$options['max_height']);
        if (! $resize && empty($options['auto_orient'])) {
            if ($file_path !== $new_file_path) {
                return copy($file_path, $new_file_path);
            }

            return true;
        }
        $cmd = $this->opts->options['convert_bin'];
        if (! empty($this->opts->options['convert_params'])) {
            $cmd .= ' '.$this->opts->options['convert_params'];
        }
        $cmd .= ' '.escapeshellarg($file_path);
        if (! empty($options['auto_orient'])) {
            $cmd .= ' -auto-orient';
        }
        if ($resize) {
            // Handle animated GIFs:
            $cmd .= ' -coalesce';
            if (empty($options['crop'])) {
                $cmd .= ' -resize '.escapeshellarg($resize.'>');
            } else {
                $cmd .= ' -resize '.escapeshellarg($resize.'^');
                $cmd .= ' -gravity center';
                $cmd .= ' -crop '.escapeshellarg($resize.'+0+0');
            }
            // Make sure the page dimensions are correct (fixes offsets of animated GIFs):
            $cmd .= ' +repage';
        }
        if (! empty($options['convert_params'])) {
            $cmd .= ' '.$options['convert_params'];
        }
        $cmd .= ' '.escapeshellarg($new_file_path);
        exec($cmd, $output, $error);
        if ($error) {
            error_log(implode('\n', $output));

            return false;
        }

        return true;
    }

    protected function get_image_size($file_path)
    {
        if ($this->opts->options['image_library']) {
            if (extension_loaded('imagick')) {
                $image = new \Imagick();
                try {
                    if (@$image->pingImage($file_path)) {
                        $dimensions = [$image->getImageWidth(), $image->getImageHeight()];
                        $image->destroy();

                        return $dimensions;
                    }

                    return false;
                } catch (\Exception $e) {
                    error_log($e->getMessage());
                }
            }
            if ($this->opts->options['image_library'] === 2) {
                $cmd = $this->opts->options['identify_bin'];
                $cmd .= ' -ping '.escapeshellarg($file_path);
                exec($cmd, $output, $error);
                if (! $error && ! empty($output)) {
                    // image.jpg JPEG 1920x1080 1920x1080+0+0 8-bit sRGB 465KB 0.000u 0:00.000
                    $infos = preg_split('/\s+/', substr($output[0], strlen($file_path)));
                    $dimensions = preg_split('/x/', $infos[2]);

                    return $dimensions;
                }

                return false;
            }
        }
        if (! function_exists('getimagesize')) {
            error_log('Function not found: getimagesize');

            return false;
        }

        return @getimagesize($file_path);
    }

    protected function create_scaled_image($file_name, $version, $options)
    {
        if ($this->opts->options['image_library'] === 2) {
            return $this->imagemagick_create_scaled_image($file_name, $version, $options);
        }
        if ($this->opts->options['image_library'] && extension_loaded('imagick')) {
            return $this->imagick_create_scaled_image($file_name, $version, $options);
        }

        return $this->gd_create_scaled_image($file_name, $version, $options);
    }

    protected function destroy_image_object($file_path)
    {
        if ($this->opts->options['image_library'] && extension_loaded('imagick')) {
            return $this->imagick_destroy_image_object($file_path);
        }
    }

    protected function is_valid_image_file($file_path)
    {
        if (! preg_match($this->opts->options['image_file_types'], $file_path)) {
            return false;
        }
        if (function_exists('exif_imagetype')) {
            return @exif_imagetype($file_path);
        }
        $image_info = $this->get_image_size($file_path);

        return $image_info && $image_info[0] && $image_info[1];
    }

    protected function handle_image_file($file_path, $file)
    {
        $failed_versions = [];
        foreach ($this->opts->options['image_versions'] as $version => $options) {
            if ($this->create_scaled_image($file->name, $version, $options)) {
                if (! empty($version)) {
                    $file->{$version.'Url'} = $this->get_download_url(
                        $file->name,
                        $version
                    );
                } else {
                    $file->size = $this->get_file_size($file_path, true);
                }
            } else {
                $failed_versions[] = $version ? $version : 'original';
            }
        }
        if (count($failed_versions)) {
            $file->error = $this->get_error_message('image_resize')
                    .' ('.implode($failed_versions, ', ').')';
        }
        // Free memory:
        $this->destroy_image_object($file_path);
    }

    protected function handle_file_upload($uploaded_file, $name, $size, $type, $error,
            $index = null, $content_range = null)
    {
        $file = new \stdClass();
        $file->name = $this->get_file_name($uploaded_file, $name, $size, $type, $error,
            $index, $content_range);
        $file->size = $this->fix_integer_overflow((int) $size);
        $file->type = $type;
        if ($this->validate($uploaded_file, $file, $error, $index)) {
            $this->handle_form_data($file, $index);
            $upload_dir = $this->get_upload_path();
            if (! is_dir($upload_dir)) {
                mkdir($upload_dir, $this->opts->options['mkdir_mode'], true);
            }
            $file_path = $this->get_upload_path($file->name);
            $append_file = $content_range && is_file($file_path) &&
                $file->size > $this->get_file_size($file_path);
            if ($uploaded_file && is_uploaded_file($uploaded_file)) {
                // multipart/formdata uploads (POST method uploads)
                if ($append_file) {
                    file_put_contents(
                        $file_path,
                        fopen($uploaded_file, 'r'),
                        FILE_APPEND
                    );
                } else {
                    move_uploaded_file($uploaded_file, $file_path);
                }
            } else {
                // Non-multipart uploads (PUT method support)
                file_put_contents(
                    $file_path,
                    fopen($this->opts->options['input_stream'], 'r'),
                    $append_file ? FILE_APPEND : 0
                );
            }
            $file_size = $this->get_file_size($file_path, $append_file);
            if ($file_size === $file->size) {
                $file->url = $this->get_download_url($file->name);
                if ($this->is_valid_image_file($file_path)) {
                    $this->handle_image_file($file_path, $file);
                }
            } else {
                $file->size = $file_size;
                if (! $content_range && $this->opts->options['discard_aborted_uploads']) {
                    unlink($file_path);
                    $file->error = $this->get_error_message('abort');
                }
            }
            $this->set_additional_file_properties($file);
        }

        return $file;
    }

    protected function readfile($file_path)
    {
        $file_size = $this->get_file_size($file_path);
        $chunk_size = $this->opts->options['readfile_chunk_size'];
        if ($chunk_size && $file_size > $chunk_size) {
            $handle = fopen($file_path, 'rb');
            while (! feof($handle)) {
                echo fread($handle, $chunk_size);
                @ob_flush();
                @flush();
            }
            fclose($handle);

            return $file_size;
        }

        return readfile($file_path);
    }

    protected function handle_form_data($file, $index)
    {
        // Handle form data, e.g. $_POST['description'][$index]
    }

    protected function get_version_param()
    {
        return $this->basename(stripslashes($this->req->get_query_param('version')));
    }

    protected function get_file_name_param()
    {
        $name = $this->opts->get_singular_param_name();

        return $this->basename(stripslashes($this->req->get_query_param($name)));
    }

    protected function get_file_names_params()
    {
        $params = $this->req->get_query_param($this->opts->options['param_name']);
        if (! $params) {
            return;
        }
        foreach ($params as $key => $value) {
            $params[$key] = $this->basename(stripslashes($value));
        }

        return $params;
    }

    protected function get_file_type($file_path)
    {
        switch (strtolower(pathinfo($file_path, PATHINFO_EXTENSION))) {
            case 'jpeg':
            case 'jpg':
                return 'image/jpeg';
            case 'png':
                return 'image/png';
            case 'gif':
                return 'image/gif';
            default:
                return '';
        }
    }

    protected function download()
    {
        switch ($this->opts->options['download_via_php']) {
            case 1:
                $redirect_header = null;
                break;
            case 2:
                $redirect_header = 'X-Sendfile';
                break;
            case 3:
                $redirect_header = 'X-Accel-Redirect';
                break;
            default:
                return $this->res->header('HTTP/1.1 403 Forbidden');
        }
        $file_name = $this->get_file_name_param();
        if (! $this->is_valid_file_object($file_name)) {
            return $this->res->header('HTTP/1.1 404 Not Found');
        }
        if ($redirect_header) {
            return $this->download_redirect_header($redirect_header, $file_name);
        }
        $this->direct_download($file_name);
    }

    protected function download_redirect_header($redirect_header, $file_name)
    {
        $url = $this->get_download_url($file_name, $this->get_version_param(), true);

        return $this->res->header($redirect_header.': '.$url);
    }

    protected function direct_download()
    {
        $file_path = $this->get_upload_path($file_name, $this->get_version_param());
        // Prevent browsers from MIME-sniffing the content-type:
        $this->res->header('X-Content-Type-Options: nosniff');
        if (! preg_match($this->opts->options['inline_file_types'], $file_name)) {
            $this->res->header('Content-Type: application/octet-stream');
            $this->res->header('Content-Disposition: attachment; filename="'.$file_name.'"');
        } else {
            $this->res->header('Content-Type: '.$this->get_file_type($file_path));
            $this->res->header('Content-Disposition: inline; filename="'.$file_name.'"');
        }
        $this->res->header('Content-Length: '.$this->get_file_size($file_path));
        $this->res->header('Last-Modified: '.gmdate('D, d M Y H:i:s T', filemtime($file_path)));
        $this->readfile($file_path);
    }

    protected function send_content_type_header()
    {
        $this->res->header('Vary: Accept');
        if (strpos($this->req->get_server_var('HTTP_ACCEPT'), 'application/json') !== false) {
            $this->res->header('Content-type: application/json');
        } else {
            $this->res->header('Content-type: text/plain');
        }
    }

    protected function send_access_control_headers()
    {
        $this->res->header('Access-Control-Allow-Origin: '.$this->opts->options['access_control_allow_origin']);
        $this->res->header('Access-Control-Allow-Credentials: '
            .($this->opts->options['access_control_allow_credentials'] ? 'true' : 'false'));
        $this->res->header('Access-Control-Allow-Methods: '
            .implode(', ', $this->opts->options['access_control_allow_methods']));
        $this->res->header('Access-Control-Allow-Headers: '
            .implode(', ', $this->opts->options['access_control_allow_headers']));
    }

    public function generate_response($content, $print_response = true)
    {
        $this->res->set_response($content);
        if ($print_response) {
            $json = json_encode($content);
            $redirect = stripslashes($this->req->get_post_param('redirect'));
            if ($redirect && preg_match($this->opts->options['redirect_allow_target'], $redirect)) {
                $this->res->header('Location: '.sprintf($redirect, rawurlencode($json)));

                return;
            }
            $this->head();
            if ($this->req->get_server_var('HTTP_CONTENT_RANGE')) {
                $files = isset($content[$this->opts->options['param_name']]) ?
                    $content[$this->opts->options['param_name']] : null;
                if ($files && is_array($files) && is_object($files[0]) && $files[0]->size) {
                    $this->res->header('Range: 0-'.(
                        $this->fix_integer_overflow((int) $files[0]->size) - 1
                    ));
                }
            }
            $this->res->body($json);
        }

        return $content;
    }

    public function head()
    {
        $this->res->header('Pragma: no-cache');
        $this->res->header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->res->header('Content-Disposition: inline; filename="files.json"');
        // Prevent Internet Explorer from MIME-sniffing the content-type:
        $this->res->header('X-Content-Type-Options: nosniff');
        if ($this->opts->options['access_control_allow_origin']) {
            $this->send_access_control_headers();
        }
        $this->send_content_type_header();
    }

    public function get($print_response = true)
    {
        if ($print_response && $this->req->get_query_param('download')) {
            return $this->download();
        }
        // summary: if ?file=name then file=get_file(name) else files=get_files()
        $file_name = $this->get_file_name_param();
        if ($file_name) {
            $response = [
                $this->opts->get_singular_param_name() => $this->get_file_object($file_name),
            ];
        } else {
            $response = [
                $this->opts->options['param_name'] => $this->get_file_objects(),
            ];
        }

        return $this->generate_response($response, $print_response);
    }

    public function post($print_response = true)
    {
        if ($this->req->get_query_param('_method') === 'DELETE') {
            return $this->delete($print_response);
        }
        $upload = $this->req->get_upload_data($this->opts->options['param_name']);
        // Parse the Content-Disposition header, if available:
        $content_disposition_header = $this->req->get_server_var('HTTP_CONTENT_DISPOSITION');
        $file_name = $content_disposition_header ?
            rawurldecode(preg_replace(
                '/(^[^"]+")|("$)/',
                '',
                $content_disposition_header
            )) : null;
        // Parse the Content-Range header, which has the following form:
        // Content-Range: bytes 0-524287/2000000
        $content_range_header = $this->req->get_server_var('HTTP_CONTENT_RANGE');
        $content_range = $content_range_header ?
            preg_split('/[^0-9]+/', $content_range_header) : null;
        $size = $content_range ? $content_range[3] : null;
        $files = [];
        if ($upload) {
            if (is_array($upload['tmp_name'])) {
                // param_name is an array identifier like "files[]",
                // $upload is a multi-dimensional array:
                foreach ($upload['tmp_name'] as $index => $value) {
                    $files[] = $this->handle_file_upload(
                        $upload['tmp_name'][$index],
                        $file_name ? $file_name : $upload['name'][$index],
                        $size ? $size : $upload['size'][$index],
                        $upload['type'][$index],
                        $upload['error'][$index],
                        $index,
                        $content_range
                    );
                }
            } else {
                // param_name is a single object identifier like "file",
                // $upload is a one-dimensional array:
                $files[] = $this->handle_file_upload(
                    isset($upload['tmp_name']) ? $upload['tmp_name'] : null,
                    $file_name ? $file_name : (isset($upload['name']) ?
                            $upload['name'] : null),
                    $size ? $size : (isset($upload['size']) ?
                            $upload['size'] : $this->req->get_server_var('CONTENT_LENGTH')),
                    isset($upload['type']) ?
                            $upload['type'] : $this->req->get_server_var('CONTENT_TYPE'),
                    isset($upload['error']) ? $upload['error'] : null,
                    null,
                    $content_range
                );
            }
        }
        $response = [$this->opts->options['param_name'] => $files];

        return $this->generate_response($response, $print_response);
    }

    public function delete($print_response = true)
    {
        $file_names = $this->get_file_names_params();
        if (empty($file_names)) {
            $file_names = [$this->get_file_name_param()];
        }
        $response = [];
        foreach ($file_names as $file_name) {
            $file_path = $this->get_upload_path($file_name);
            $success = is_file($file_path) && $file_name[0] !== '.' && unlink($file_path);
            if ($success) {
                foreach ($this->opts->options['image_versions'] as $version => $options) {
                    if (! empty($version)) {
                        $file = $this->get_upload_path($file_name, $version);
                        if (is_file($file)) {
                            unlink($file);
                        }
                    }
                }
            }
            $response[$file_name] = $success;
        }

        return $this->generate_response($response, $print_response);
    }

    protected function basename($filepath, $suffix = null)
    {
        $splited = preg_split('/\//', rtrim($filepath, '/ '));

        return substr(basename('X'.$splited[count($splited) - 1], $suffix), 1);
    }
}
