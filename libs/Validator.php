<?php
class Validator{

    private static $errors = [];

    public static function getErrors()
    {
        return self::$errors; //Validations::erros
    }

    public static function isValid()
    {
        return count(self::$errors) == 0;
    }

    public static function isEmpty($variable, $field, $msg = "Erreur de validation")
    {
        if (empty($variable)) {
            self::$errors[$field] = $msg;
        }
    }

    public static function existe($variable)
    {
        if (isset($variable)) {
            return true;
        }
        return false;
    }
}
/*
private $errors=[];

public function getErrors(){
    return $this->errors;
}

public function isValid(){
   return count($this->errors)==0;
}


public function isVide($champ,$key,$sms="Champ Obligatoire"){
  if($champ==""){
     $this->errors[$key]=$sms;
  }
 }

 public function isEamil($champ,$key,$sms="Champ Obligatoire"){}


*/