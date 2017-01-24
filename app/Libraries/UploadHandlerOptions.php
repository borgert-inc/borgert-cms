<?php

namespace App\Libraries;

class UploadHandlerOptions
{
    public $options;    //public because parent class does reference it directly at times.
    protected $req;

    public function __construct(array $options, RequestHandler $req)
    {
        $this->req = $req;
        $this->options = $options + $this->default_options();
    }

    public function get_singular_param_name()
    {
        return substr($this->options['param_name'], 0, -1);
    }

    public function get_user_path()
    {
        if ($this->options['user_dirs']) {
            return $this->get_user_id().'/';
        }

        return '';
    }

    protected function get_user_id()
    {
        @session_start();

        return session_id();
    }

    protected function default_options()
    {
        return [
            'script_url' => $this->get_full_url().'/'.$this->basename($this->req->get_server_var('SCRIPT_NAME')),
            'upload_dir' => dirname($this->req->get_server_var('SCRIPT_FILENAME')).'/files/',
            'upload_url' => $this->get_full_url().'/files/',
            'input_stream' => 'php://input',
            'user_dirs' => false,
            'mkdir_mode' => 0755,
            'param_name' => 'files',
            // Set the following option to 'POST', if your server does not support
            // DELETE requests. This is a parameter sent to the client:
            'delete_type' => 'DELETE',
            'access_control_allow_origin' => '*',
            'access_control_allow_credentials' => false,
            'access_control_allow_methods' => [
                'OPTIONS',
                'HEAD',
                'GET',
                'POST',
                'PUT',
                'PATCH',
                'DELETE',
            ],
            'access_control_allow_headers' => [
                'Content-Type',
                'Content-Range',
                'Content-Disposition',
            ],
            // By default, allow redirects to the referer protocol+host:
            'redirect_allow_target' => '/^'.preg_quote(
              parse_url($this->req->get_server_var('HTTP_REFERER'), PHP_URL_SCHEME)
                .'://'
                .parse_url($this->req->get_server_var('HTTP_REFERER'), PHP_URL_HOST)
                .'/', // Trailing slash to not match subdomains by mistake
              '/' // preg_quote delimiter param
            ).'/',
            // Enable to provide file downloads via GET requests to the PHP script:
            //     1. Set to 1 to download files via readfile method through PHP
            //     2. Set to 2 to send a X-Sendfile header for lighttpd/Apache
            //     3. Set to 3 to send a X-Accel-Redirect header for nginx
            // If set to 2 or 3, adjust the upload_url option to the base path of
            // the redirect parameter, e.g. '/files/'.
            'download_via_php' => false,
            // Read files in chunks to avoid memory limits when download_via_php
            // is enabled, set to 0 to disable chunked reading of files:
            'readfile_chunk_size' => 10 * 1024 * 1024, // 10 MiB
            // Defines which files can be displayed inline when downloaded:
            'inline_file_types' => '/\.(gif|jpe?g|png)$/i',
            // Defines which files (based on their names) are accepted for upload:
            'accept_file_types' => '/.+$/i',
            // The php.ini settings upload_max_filesize and post_max_size
            // take precedence over the following max_file_size setting:
            'max_file_size' => null,
            'min_file_size' => 1,
            // The maximum number of files for the upload directory:
            'max_number_of_files' => null,
            // Defines which files are handled as image files:
            'image_file_types' => '/\.(gif|jpe?g|png)$/i',
            // Use exif_imagetype on all files to correct file extensions:
            'correct_image_extensions' => false,
            // Image resolution restrictions:
            'max_width' => null,
            'max_height' => null,
            'min_width' => 1,
            'min_height' => 1,
            // Set the following option to false to enable resumable uploads:
            'discard_aborted_uploads' => true,
            // Set to 0 to use the GD library to scale and orient images,
            // set to 1 to use imagick (if installed, falls back to GD),
            // set to 2 to use the ImageMagick convert binary directly:
            'image_library' => 1,
            // Uncomment the following to define an array of resource limits
            // for imagick:
            /*
            'imagick_resource_limits' => array(
                imagick::RESOURCETYPE_MAP => 32,
                imagick::RESOURCETYPE_MEMORY => 32
            ),
            */
            // Command or path for to the ImageMagick convert binary:
            'convert_bin' => 'convert',
            // Uncomment the following to add parameters in front of each
            // ImageMagick convert call (the limit constraints seem only
            // to have an effect if put in front):
            /*
            'convert_params' => '-limit memory 32MiB -limit map 32MiB',
            */
            // Command or path for to the ImageMagick identify binary:
            'identify_bin' => 'identify',
            'image_versions' => [
                // The empty image version key defines options for the original image:
                '' => [
                    // Automatically rotate images based on EXIF meta data:
                    'auto_orient' => true,
                ],
                // Uncomment the following to create medium sized images:
                /*
                'medium' => array(
                    'max_width' => 800,
                    'max_height' => 600
                ),
                */
                'thumbnail' => [
                    // Uncomment the following to use a defined directory for the thumbnails
                    // instead of a subdirectory based on the version identifier.
                    // Make sure that this directory doesn't allow execution of files if you
                    // don't pose any restrictions on the type of uploaded files, e.g. by
                    // copying the .htaccess file from the files directory for Apache:
                    //'upload_dir' => dirname($this->req->get_server_var('SCRIPT_FILENAME')).'/thumb/',
                    //'upload_url' => $this->get_full_url().'/thumb/',
                    // Uncomment the following to force the max
                    // dimensions and e.g. create square thumbnails:
                    //'crop' => true,
                    'max_width' => 80,
                    'max_height' => 80,
                ],
            ],
            'print_response' => true,
        ];
    }

    protected function get_full_url()
    {
        $https = $this->is_https();

        return
            ($https ? 'https://' : 'http://').
            (! empty($_SERVER['REMOTE_USER']) ? $_SERVER['REMOTE_USER'].'@' : '').
            (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ($_SERVER['SERVER_NAME'].
            ($https && $_SERVER['SERVER_PORT'] === 443 ||
            $_SERVER['SERVER_PORT'] === 80 ? '' : ':'.$_SERVER['SERVER_PORT']))).
            substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/'));
    }

    protected function is_https()
    {
        return ! empty($_SERVER['HTTPS']) && strcasecmp($_SERVER['HTTPS'], 'on') === 0 ||
            ! empty($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
                strcasecmp($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') === 0;
    }

    //@todo: this method is duplicated from UploadHandler. Needs to be de-duped.
    protected function basename($filepath, $suffix = null)
    {
        $splited = preg_split('/\//', rtrim($filepath, '/ '));

        return substr(basename('X'.$splited[count($splited) - 1], $suffix), 1);
    }
}
