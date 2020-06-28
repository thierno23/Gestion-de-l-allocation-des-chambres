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
           
        if(isset($_POST['submit'])){
           
            if($_POST['type_ch']=='individuel'){
                $type_ch=1;
            }elseif($_POST['type_ch']== "à deux"){
                $type_ch= 2;
            }
           
           $tableau = array('num_ch'=>150,'num_bat'=>$_POST['num_bat'],'type_ch'=>$type_ch,);
            
            $this->dao = new ChambreDao();
            // echo $this->dao->executeUpdate($sql);
             echo $this->dao->addData($tableau);
             $this->data_view['t']=ob_get_clean();
            if( $this->data_view['t']!=0)  echo "<script>alert('enregitrer')</script>";
            $this->view="enregistreChambre";
            $this->render();
        }
        else echo 'ok';
    }
}