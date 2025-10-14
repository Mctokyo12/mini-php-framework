<?php
namespace Core;
class Request 
{
    private function methode():string  
    {
        return strtoupper($_SERVER['REQUEST_METHOD']) ?? "GET";
    }

    public  function isPost() : bool
    {
        return $this->methode() === "POST";
    }

    public  function isGet() : bool
    {
        return $this->methode() === "GET";
    }

    public  function post(string $key , $default = null) : mixed
    {
        return $_POST[$key] ?? $default;
    }
    public  function get(string $key , $default = null) : mixed
    {
        return $_GET[$key] ?? $default;
    }

    public  function all() : array
    {
        return array_merge($_GET , $_POST);
    }

    public  function filter(array $data ) : array
    {
        return filter_var_array($data , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

}
