<?php
class ChambreController extends Controller{

    
    
     public  function __construct(){
          $this->folder="security";
          $this->layout="template";
         //$this->validator=new Validator();
        
     }
     

     public function listChambre(){
          ob_start();
          $this->dao = new ChambreDao();
          echo  $this->dao->getDataChambre();
          $this->data_view['tab']=ob_get_clean();
          $this->view="listerChambre";
          $this->render();
          
        
      }
      public function Pagination(){
          ob_start();
           if(isset($_POST['action'])){
               $limit =$_POST['limit'];
               $offset = $_POST['offset'];
               
               $this->dao = new ChambreDao();
               echo $this->dao->getPagination($limit,$offset);
               $this->data_view['tab2']=ob_get_clean();
               echo $this->data_view['tab2'];
           }
             
      }
     

public function bloquerJoueur(){
     echo "Boquer";
}

public function fixerNbreQuestion(){
    
}

public function modifierAdmin(){
    
}

public function supprimerAdmin(){
    
}



}