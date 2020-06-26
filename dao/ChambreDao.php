<?php
class ChambreDao extends Manager {

   protected $tab;
   //888-1000
    public function __construct(){
        $this->tableName="chambre";
        $this->className="Chambre";
    }
    public function add($sql){
        
    }
    public function update($obj){

    }
    public function setTables($data){
        $output='';
        if(count($data)==0){
            $output= '
            <tr>
            <td align="center">Data not Found</td>
            </tr>
            ';
        }else{
            foreach($data as $row){
            
                $output.='
                    <tr class="text-center h-25"> 
                    <td>'.$row->getNum_chambre().'</td>
                    <td>'.$row->getNum_depart().'</td>
                    <td>'.$row->getId().'</td>
                    <td><div class="suiv float-left mr-1"><input id="id_'.$row->getNum_chambre().'" class="btn  btn-success update" type="button" value="update"></div>
                     <div class="suiv float-left"><input id="id_'.$row->getNum_chambre().'" class="btn btn-danger delete" type="button" value="delete"></div></td> ';
            } 
        }
<<<<<<< HEAD
           return  $output;
        // return count($data)==1?$data[0]:$data;
    }
=======
      // var_dump($data);
       // return count($data)==1?$data[0]:$data;
>>>>>>> refs/remotes/origin/master
    
    public function getDataChambre(){
        $sql="select * from $this->tableName LIMIT 0,5";
        $data=$this->executeSelect($sql);
         return $this->setTables($data);
    }

    public function getPagination($limit,$offset){
        $sql="select * from $this->tableName LIMIT {$limit},{$offset} ";
        $data=$this->executeSelect($sql);
        return $this->setTables($data);
    }
}