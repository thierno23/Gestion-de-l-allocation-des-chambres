<?php
class Chambre implements IGestion{
        protected  $num_chambre;
        protected  $num_depart;
        protected  $id;
        public function  __construct($row=null){
                if($row!=null){
                    $this->hydrate($row);
                }
            }
			
			public function hydrate( $donnees)
			{
			  foreach ($donnees as $key => $value)
			  {
				// On récupère le nom du setter correspondant à l'attribut.
				$method = 'set'.ucfirst($key);
				// Si le setter correspondant existe.
				if (method_exists($this, $method))
				{ 
				  // On appelle le setter.
				  $this->$method($value);
				}
			  }
			}
			
	public function  getNum_chambre() {
		return $this->num_chambre;
	}
	public function setNum_chambre( $num_chambre) {
		$this->num_chambre = $num_chambre;
	}

	public function  getNum_depart() {
		return $this->num_depart;
	}

	public function setNum_depart( $num_depart) {
		$this->num_depart = $num_depart;
	}

	public function  getId() {
		return $this->id;
	}

	public function setId( $id) {
		$this->id = $id;
	}

        
     
}