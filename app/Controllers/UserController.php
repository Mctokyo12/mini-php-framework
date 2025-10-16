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
        view("home" , ["message"=>"Bienvenue la team","users"=>$users]);
    }

    public  function showAbout() 
    {
        view("about");
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
                    "nom"=>"required|min:2|max:20",
                    "prenom"=>"required|min:2|max:20",
                    "email"=>"required|email",
                    "password"=>"required|min:3|max:15"
                ]
            );

            if ($validator->fails()) {
               view("inscription" , ["errors"=>$validator->errors()]);
               return;
            }

            $data['password'] = sha1($data["password"]);

            $name = $data['nom'];
            $password = sha1($data["password"] );
            $email = $data['email'];
            $prenom = $data['prenom'];

            $id = $this->userModel->create($data);
            $user = $this->userModel->find($id);


            $message = "";
            view("inscription" , ["user"=>$user]);
            
        }
    }

 }
 