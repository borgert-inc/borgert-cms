<?php

namespace App\Libraries;

//@todo: When happy to support PHP 7 and above only, we can swap the use of isset()?: for ??
class RequestHandler
{
    public function get_upload_data($id)
    {
        return isset($_FILES[$id]) ? $_FILES[$id] : null;
    }

    public function get_post_param($id)
    {
        return isset($_POST[$id]) ? $_POST[$id] : null;
    }

    public function get_query_param($id)
    {
        return isset($_GET[$id]) ? $_GET[$id] : null;
    }

    public function get_server_var($id)
    {
        return isset($_SERVER[$id]) ? $_SERVER[$id] : null;
    }
}
