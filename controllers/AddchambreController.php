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
           
            $sql= "INSERT INTO chambre (num_chambre,num_depart,id) 
                        VALUES ( 1,2,3)";
            //$tableau = array('num_ch'=>55,'num_bat'=>5,'type_ch'=>1,);
            $this->dao = new ChambreDao();
             echo $this->dao->executeUpdate($sql);
             //$this->dao->addData($sql,$tableau);
             $this->data_view['t']=ob_get_clean();
             echo $this->data_view['t'];
            
        }
        else echo 'ok';
    }
}