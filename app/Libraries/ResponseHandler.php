<?php

namespace App\Libraries;

class ResponseHandler
{
    protected $response = [];

    public function set_response(array $content)
    {
        $this->response = $content;
    }

    public function get_response()
    {
        return $this->response;
    }

    public function body($str)
    {
        echo $str;
    }

    public function header($str)
    {
        header($str);
    }
}
