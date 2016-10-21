<?php

namespace App\Libraries;

//@todo: When happy to support PHP 7 and above only, we can swap the use of isset()?: for ??
class RequestHandler
{
    public function get_upload_data($id)
    {
        return isset($_FILES[$element]) ? $_FILES[$element] : null;
    }

    public function get_post_param($id)
    {
        return isset($_POST[$element]) ? $_POST[$element] : null;
    }

    public function get_query_param($id)
    {
        return isset($_GET[$element]) ? $_GET[$element] : null;
    }

    public function get_server_var($id)
    {
        return isset($_GET[$element]) ? $_GET[$element] : null;
    }
}
