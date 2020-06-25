<?php
class Chambre implements IGestion{
  
    public function  __construct($row=null){
        if($row!=null){
            $this->hydrate($row);
        }
    }
   //Redefinir la methode hydrate
   public function hydrate($row){
      // $this->date=$row['date'];
   }
}