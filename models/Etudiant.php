<?php
class User implements IQuizz {
    //Attributs
       //Encapsulation
        protected  $id;
        protected  $nomComplet;
        protected  $pwd;
        protected  $login;
        protected  $avatar;
        protected  $statut;
        protected  $profil;
// public abstract  function hydrate($row);
  
     public   function __construct($row=null){
         if($row!=null){
             $this->hydrate($row);
         }

     }
    
     public  function hydrate($row){
        $this->id=$row['id']; 
        $this->nomComplet=$row['nomComplet']; 
        $this->profil=$row['profil']; 
     }
      //Methodes
        //Getters
        public function getId(){
            return $this->id;
        }
        public function getNomComplet(){
            return $this->nomComplet;
        }

        public function getPwd(){
            return $this->pwd;
        }

        public function getLogin(){
            return $this->login;
        }

        public function getStatut(){
            return $this->statut;
        }

        public function getAvatar(){
            return $this->avatar;
        }

        public function getProfil(){
            return $this->profil;
        }

        //Setters
    
        public function setId($id){
             $this->id=$id;
        }
        public function setNomComplet($nomComplet){
             $this->nomComplet=$nomComplet;
        }

        public function setPwd($pwd){
            $this->pwd=$pwd;
        }

        public function setLogin($login){
             $this->login=$login;
        }

        public function setStatut($statut){
           $this->statut=$statut;
        }

        public function setAvatar($avatar){
            $this->avatar=$avatar;
        }

        public function setProfil($profil){
            $this->profil=$profil;
        }
}