<?php

namespace Core;

class Request
{
    protected array $get;
    protected array $post;

    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
    }

    public function __get($key)
    {
        return $this->input($key);
    }

    public function input(string $key, $default = null)
    {
        return $this->post[$key] ?? $this->get[$key] ?? $default;
    }

    public function all(): array
    {
        //print_r(array_merge($this->get, $this->post));die;
        return array_merge($this->get, $this->post);
    }

    public function only(array $keys): array
    {
        return array_filter($this->all(), fn($key) => in_array($key, $keys), ARRAY_FILTER_USE_KEY);
    }

    public function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    // public function getUri(): string
    // {
    //     $uri = strtok($_SERVER['REQUEST_URI'], '?');
    //     $basePath = '/miniLaravel'; // adjust to your base path
    //     return str_replace($basePath, '', $uri);
    // }

    public function uri(): string
    {
        $basePath = '/miniLaravel'; // You can abstract this later
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        return str_replace($basePath, '', $uri);
    }

    public function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
