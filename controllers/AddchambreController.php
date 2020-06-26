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
        $this->view="enregistreChambre";
        $this->render();
        ob_start();
        if(isset($_POST['submit'])){
            $num_ch = $_POST['num_ch'];
            $num_bat= $_POST['num_bat'];
            $type_ch= $_POST['type_ch'];
            if($type_ch=='induviduel'){
                $type_ch=1;
            }elseif($type_ch== "à deux"){
                $type_ch = 2;
            }
            $sql= ("INSERT INTO chambre (num_chambre, num_depart,id) 
              VALUES ( $num_ch, $num_bat,$type_ch )");
              
            $this->dao = new ChambreDao();
             echo $this->dao->executeUpdate($sql);
             $this->data_view['t']=ob_get_clean();
             echo $this->data_view['t'];
            
        }
        else echo 'ok';
    }
}