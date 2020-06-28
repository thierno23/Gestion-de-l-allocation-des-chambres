<?php
class EtudiantDao extends Manager {


    public function __construct(){
        $this->tableName="etudiant";
        $this->className="Etudiant";
    }

    public function add($obj){

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
                    <td>'.$row->getPrenom().'</td>
                    <td>'.$row->getNom().'</td>
                    <td>'.$row->getEmail().'</td>
                    <td>'.$row->getTel().'</td>
                    <td>'.$row->getDate_naiss().'</td>
                    <td><div class="suiv float-left mr-1"><input id="'.$row->getMatricule() .'" class="btn  btn-success update" type="button" value="update"></div>
                     <div class="suiv float-left"><input id="'.$row->getMatricule() .'" class="btn btn-danger delete" type="button" value="delete"></div></td> ';
            } 
        }
           return  $output;
        // return count($data)==1?$data[0]:$data;
    }

    public function getDataEtudiant($limit=0,$offset=5){
        $sql="select * from $this->tableName LIMIT {$limit},{$offset}";
        $data=$this->executeSelect($sql);
         return $this->setTables($data);
    }



}