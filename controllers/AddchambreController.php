<?php
class AddchambreController extends Controller{

    
    
    public  function __construct(){
         $this->folder="security";
         $this->layout="template";
        //$this->validator=new Validator();
       
    }
    public function index(){ 
        $this->view="enregistreChambre";
         $this->render();
  
    } 
    public function addChambre(){
        ob_start();
        $this->view="enregistreChambre";
         $this->render();
        if(isset($_POST['submit'])){
           
            if($_POST['type_ch']=='individuel'){
                $type_ch=1;
            }elseif($_POST['type_ch']== "à deux"){
                $type_ch= 2;
            }
           
            $sql= "INSERT INTO chambre (num_chambre=:num_ch,num_depart=:num_bat,id=:'type_ch) 
                           VALUES ( :num_ch,:num_bat,:type_ch)";
            $tableau = array('num_ch'=>$_POST['num_ch'],'num_bat'=>$_POST['num_bat'],'type_ch'=>$type_ch,);
            $this->dao = new ChambreDao();
            // echo $this->dao->executeUpdate($sql);
             $this->dao->addData($sql,$tableau);
             $this->data_view['t']=ob_get_clean();
             echo $this->data_view['t'];
            
        }
        else echo 'ok';
    }
}