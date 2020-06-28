<?php
class EtudiantController extends Controller{

    public  function __construct(){
        $this->folder="security";
        $this->layout="template";
       //$this->validator=new Validator();
      
   }
    public function index(){
        $this->view="listerEtudiant";
         $this->render();
  
    }
    public function listEtudiant(){
        ob_start();
        $this->dao = new EtudiantDao();
        echo  $this->dao->getDataEtudiant();
        $this->data_view['tab']=ob_get_clean();
        $this->view="listerEtudiant";
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