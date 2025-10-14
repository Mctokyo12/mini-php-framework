<?php
namespace App\Models;
class MonModel 
{
    public   function inscription(string $name , string $password) : string
    {
        $message = "inscription reussie avec succes $name";
        return $message;
    }
}
