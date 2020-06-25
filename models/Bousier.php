<?php
class Admin extends User{
    
    public function __construct($row=null){
        $this->profil="Admin";
        if($row!=null){
            $this->hydrate($row);
        }
    }
    //Redefinition
    public function setProfil($profil){
        
    }
}