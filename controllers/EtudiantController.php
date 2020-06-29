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
    public function ScrollZone(){
        ob_start();
        
             $limit =$_POST['limit'];
             $offset = $_POST['offset'];
             $this->dao = new EtudiantDao();
             echo $this->dao->getDataEtudiant($limit,$offset);
             $this->data_view['tab2']=ob_get_clean();
             echo $this->data_view['tab2'];
         
    }


    public function validData(){
         var_dump($_POST);
        extract($_POST);
        if (Validator::existe($submit)) {
            $matricule='5644-98';
            Validator::isEmpty($matricule, "matricule");
            Validator::isEmpty($nom, "nom");
            Validator::isEmpty($prenom, "prenom");
            Validator::isEmpty($email, "email");
            Validator::isEmpty($tel, "tel");
            Validator::isEmpty($date_naiss, "date_naiss");
            Validator::isEmpty($type_etud, "type_etud");
          
            if (!Validator::getErrors()) {
                $type= 2;
                $this->dao=new EtudiantDao();
                $object=$matricule. "' ,'" .$nom. "','" .$prenom. "' ,'" .$email. "' ,'" .$tel. "' ,'" .$date_naiss. "' ,'" .$type;
               // $req = "insert into etudiant (prenom, nom, matricule, email, telephone, date,  typeEtu) VALUES ('" .$object. "')";
      
                echo $this->dao->add($object);
               
            }/*else{
             $this->data_view['errors']=$this->validator->getErrors();
             $this->inscriptionchambre();

           }*/

        }
    }
}