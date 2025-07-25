<?php

namespace Core;

class Response
{
    protected $content;
    protected int $status;

    public function __construct($content = '', int $status = 200)
    {
        $this->content = $content;
        $this->status = $status;
    }

    public function send()
    {
        http_response_code($this->status);
        echo $this->content;
    }
}
