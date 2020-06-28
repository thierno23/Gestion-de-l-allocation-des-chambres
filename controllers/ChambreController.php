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
               echo $this->dao->getDataChambre($limit,$offset);
               $this->data_view['tab2']=ob_get_clean();
               echo $this->data_view['tab2'];
           }
             
      }
      public function setDelete(){
           ob_start();
          $num_ch=0;
          if(isset($_POST['action'])){
               $num_ch = $_POST['num_ch'];
                $this->dao = new ChambreDao();
               echo $this->dao->Delete($num_ch);
               $this->data_view['ta']=ob_get_clean();
               echo $this->data_view['ta'];
          }
     }    
          
      public function setUpdate(){
          ob_start();
          $output='';
          $obj = $_POST['num_ch'];
          if(isset($_POST['action'])== "Select"){
               
               $this->dao = new ChambreDao();
               $output = $this->dao->update($obj);
               echo json_encode($output);
               //$this->data_view['up']=ob_get_clean();
               //echo  $this->data_view['up'];
          }
          if($_POST['action']== "Update"){
               $type_ch= $_POST['type_ch']=='individuel'?1:2;
               $tableau = array(':num_ch'=>$_POST['num_ch'],':num_bat'=>$_POST['num_bat'],':type_ch'=>$type_ch);
               $this->dao = new ChambreDao();
               echo  $this->dao->addData($tableau,$obj);
               
               $this->data_view['p']=ob_get_clean();
               echo  $this->data_view['p'];
          }
          
     }
    

}