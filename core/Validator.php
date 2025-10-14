<?php

namespace Core;
class Validator 
{
    private array $data;
    private array $rules;
    private array $errors;
    
    public function __construct(array $data , array $rules){
        $this->data = $data;
        $this->rules = $rules;
        $this->validate();
    }

    public function validate(): void{
        foreach ($this->rules as $filed => $rulesSet) {
            $rules = explode("|" , $rulesSet);
            $value = trim($this->data[$filed] ?? "");

            foreach ($rules as $rule) {
                if ($rule === "required" && $value === "") {
                    $this->addError($filed , "Le champ $filed est requis.");
                }   

                if ($rule === "emaid" && !filter_var($value , FILTER_VALIDATE_EMAIL)) {
                    $this->addError($filed , "Le champ $filed n'a pas une email valide.");
                }
                
                if (str_starts_with($rule , "min:")) {
                    $min = (int) substr($rule,4);
                    if (strlen($value) < $min) {
                        $this->addError($filed , "Le champ $filed  doit conteni au moin $min caracters.");
                    }
                }
                
                if (str_starts_with($rule , "max:")) {
                    $max = (int) substr($rule,4);
                    if (strlen($value) > $max) {
                        $this->addError($filed , "Le champ $filed  doit conteni maximun $max caracters.");
                    }
                }
            }
        }
    }

    private function addError(string $filed, string $message) : void
    {
        $this->errors[$filed][] = $message;
    }

    public   function fails() : bool
    {
        return !empty($this->errors);
    }

    public  function errors() : array
    {
       return $this->errors;
    }

}
