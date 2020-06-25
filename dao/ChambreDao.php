<?php
class ChambreDao extends Manager {


    public function __construct(){
        $this->tableName="chambre";
        $this->className="Chambre";
    }
    public function add($obj){
        $sql="";
       return $this->executeUpdate($sql)!=0;
    }
    public function update($obj){

    }
    
    public function getDataChambre(){
        $sql="select * from $this->tableName LIMIT 0,7 ";
        $data=$this->executeSelect($sql);
        if(count($data)==0){
              return null;
        }
      // var_dump($data);
       // return count($data)==1?$data[0]:$data;
    
    }
   





}