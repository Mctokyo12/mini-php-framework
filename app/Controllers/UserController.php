<?php
namespace App\Controllers;

use App\Models\MonModel;
use App\Models\UserModel;
use Core\Request;
use Core\Validator;



class UserController 
{
    private $model;
    private $userModel;

    private $request;


    public function __construct($model) {
        $this->userModel = $model;
        $this->request = new Request();
    }

    public function showHome() 
    {   
        $users = $this->userModel->all();
        view("home" , ["users"=>$users]);
    }

    public function showInscription(Request $request)
    { 
        
        view("inscription" , ["request"=>$request->all()]);
    }

    public  function handleInscription() 
    {
        if ($this->request->isPost()) {
            $data = $this->request->filter($this->request->all());
            $validator = new Validator($data,
                [
                    "name"=>"required|min:2|max:20",
                    "password"=>"required|min:3|max:15"
                ]
            );
            if ($validator->fails()) {
               view("inscription" , ["errors"=>$validator->errors()]);
            }

            $name = $data['name'];
            $password = $data["password"];
            $message = "";
            view("inscription" , ["message"=>$message]);
            
        }
    }

 }
 