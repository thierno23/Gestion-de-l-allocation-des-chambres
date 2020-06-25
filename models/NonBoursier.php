<?php
class Joueur extends User{
   private $score;
   //Propriete de Navigation
   //OneTomany
    private $collectionJeu=[];

   public function __construct($row=null){
       $this->profil="Joueur";
       if($row!=null){
           $this->hydrate($row);
       }

   }
   //Redefinition
   public  function hydrate($row){
    $this->id=$row['id']; 
    $this->nomComplet=$row['nomComplet']; 
    $this->score=$row['score']; 
   }
   public function getScore(){
       return $this->score;
   }

   public function setScore($score){
       $this->score=$score;
   }

   public function setProfil($profil){
        
}



   
}