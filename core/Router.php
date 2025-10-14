<?php

namespace Core;

// use ReflectionMethod;
use Core\Request;

class Router 
{
    private array $Routes = [];

    public   function get(string $url , callable|array $action)
    {
        $this->addRoute('GET' , $url , $action);
    }

    public   function post(string $url , callable|array $action)
    {
        $this->addRoute('POST' , $url , $action);
    }

    public   function put(string $url , callable|array $action)
    {
        $this->addRoute('PUT' , $url , $action);
    }

    public   function patch(string $url , callable|array $action)
    {
        $this->addRoute('PATCH' , $url , $action);
    }
    public   function delete(string $url , callable|array $action)
    {
        $this->addRoute('DELETE' , $url , $action);
    }

    private function addRoute(string $methode , string $url , callable|array $action) 
    {
      $pattern = preg_replace("/\{(\w+)\}/" , '([\w-]+)',$url);
      $pattern = "#^". trim($pattern , "/")."$#";
      $this->Routes[$methode][]=[
        "pattern"=>$pattern,
        'action'=> $action
      ];
    }

    public  function dispatch() 
    {  
        $request = new Request();
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'] , PHP_URL_PATH);
        $uri = trim(str_replace(BASE_PATH , "" , $uri) , "/");
        
        if(!isset($this->Routes[$method])){
            http_response_code(404);
            echo "Route not found";
            return;
        }

        foreach ($this->Routes[$method] as $route) {
            // var_dump($route['pattern']);exit;
            if (preg_match($route['pattern'] , $uri, $matches)) {
                array_shift($matches);
                $params = [];

                if (is_array($route['action'])) {
                    [$controllerClass , $methode] = $route['action'];
                    if (class_exists($controllerClass) && method_exists($controllerClass , $methode)) {
                        
                        $reflection = new \ReflectionClass($controllerClass);
                        $constructor = $reflection->getConstructor();
                        $param = $constructor ? $constructor->getParameters() : [];
                    
                        if (count($param) === 0) {
                            $controller = new $controllerClass();
                        } else {
                            $modelName = str_replace("Controller" ,"Model" , $controllerClass);
                            if (class_exists($modelName)) {
                                $model = new $modelName();
                                $controller = new $controllerClass($model);

                            } else {
                                throw new \Exception("Model class $modelName does not exist", 1);
                            }    
                        }

                        $reflectionMethode = new \ReflectionMethod($controllerClass , $methode);
                        foreach ($reflectionMethode->getParameters() as $param) {
                            if ($param->getType() && $param->getType()->getName() === Request::class) {
                                $params[] = $request;
                            }else{
                                if(!empty($matches)){
                                    $params[] = $matches[0];
                                }   
                            }
                        }

                        // var_dump($params);
                        // exit;
                        $reflectionMethode->invokeArgs($controller , $params); 
                        // call_user_func_array([$controller , $methode] , $matches)
                        return;
                    }

                }elseif (is_callable($route['action'])) {
                    $param[] = $request;
                    $param[] = $matches[0] ??  null;
                    call_user_func_array($route['action'] , $param);
                    return;
                }
            }
        }

        http_response_code(404);
        echo "Route not found";

    }


}
