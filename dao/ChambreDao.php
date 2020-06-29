<?php
class ChambreDao extends Manager {

   protected $tab;
   //888-1000
    public function __construct(){
        $this->tableName="chambre";
        $this->className="Chambre";
    }
    public function add($sql){}
    
    
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
                  
            if($row->getId()== 1){
                $type_ch='individuel';
            }elseif($row->getId()== 2){
                $type_ch = "à deux";
            }
                $output.='
                    <tr class="text-center h-25"> 
                    <td>'.$row->getNum_chambre().'</td>
                    <td>'.$row->getNum_depart().'</td>
                    <td>'.$type_ch.'</td>
                    <td><div class="suiv float-left mr-1"><input id="'.$row->getNum_chambre().'" class="btn  btn-success update" type="button" value="update"></div>
                     <div class="suiv float-left"><input id="'.$row->getNum_chambre().'" class="btn btn-danger delete" type="button" value="delete"></div></td> ';
            } 
        }
           return  $output;
        // return count($data)==1?$data[0]:$data;
    }

    public function update($obj){
        $sql="select * from $this->tableName WHERE `num_chambre` = {$obj} LIMIT 1";
        $data = $this->executeSelect($sql);
        $output=[];
        // return $this->setTables($data);
        foreach($data as $row){
            if($row->getId()== 1){
                $type_ch='individuel';
            }elseif($row->getId()== 2){
                $type_ch = "a deux";
            }
            $output['num_ch']=$row->getNum_chambre();
            $output['num_bat']= $row->getNum_depart();
            $output['type_ch']=$type_ch;
        }
        return $output;
    }
    public function getDataChambre($limit=0,$offset=5){
        $sql="select * from $this->tableName LIMIT {$limit},{$offset}";
        $data=$this->executeSelect($sql);
         return $this->setTables($data);
    }
    public function getOption($sql){
        $output='<select name="option" id="option" class="form-control text-sm ml-0">
                 <option>selectioner le N° de la chambre</option>';
        $data=$this->executeSelect($sql);
        foreach($data as $row){
           $output.=' <option>'.$row->getNum_chambre().'</option>';
        }
        return $output.='</select>';
    }

    public function Delete($num_ch){
       $sql="UPDATE $this->tableName SET `status` = 0  WHERE `num_chambre` =$num_ch";
       return $this->executeUpdate($sql)!=0; 
      
    }
  
   public function addData($data,$act=null){
       if($act != null){
           $sql="UPDATE $this->tableName SET num_chambre=:num_ch, num_depart=:num_bat, id=:type_ch
                     WHERE num_chambre =$act";
       }
       else{
        $sql= "INSERT INTO $this->tableName (num_chambre,num_depart,id)
        VALUES ( :num_ch,:num_bat,:type_ch)";
       }
       return  $this->executePrepare($sql,$data)!=0;
   }
}