<?php
class ChambreController extends Controller{

    
    
     public  function __construct(){
          $this->folder="security";
          $this->layout="template";
         //$this->validator=new Validator();
        
       }
       public function index(){
          $this->view="listerChambre";
          $this->render();
    
      }

      public function listChambre(){
           
          $this->dao = new ChambreDao();
          $this->dao->getDataChambre();
        
          $this->view="listerChambre";
          $this->render();
      }

public function bloquerJoueur(){
     echo "Bloquer";
}

public function fixerNbreQuestion(){
    
}

public function modifierAdmin(){
    
}

public function supprimerAdmin(){
    
}



}