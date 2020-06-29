<?php
class Etudiant implements IGestion {
    //Attributs
       //Encapsulation
        protected  $matricule;
        protected  $prenom;
        protected  $nom;
        protected  $email;
        protected  $tel;
        protected  $date_naiss;
        protected  $type_ed;
        
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
	public function getId() {
		return $this->id;
	}

	public function setId( $id) {
		$this->id = $id;
	}

	public function getMatricule() {
		return $this->matricule;
	}

	public function setMatricule( $matricule) {
		$this->matricule = $matricule;
	}
	public function getPrenom() {
		return $this->prenom;
	}

	public function setPrenom( $prenom) {
		$this->prenom = $prenom;
	}

	public function getNom() {
		return $this->nom;
	}

	public function setNom( $nom) {
		$this->nom = $nom;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail( $email) {
		$this->email = $email;
	}

	public function getTel() {
		return $this->tel;
	}

	public function setTel( $tel) {
		$this->tel = $tel;
	}
	public function getDate_naiss() {
		return $this->date_naiss;
	}

	public function setDate_naiss( $date_naiss) {
		$this->date_naiss = $date_naiss;
	}
	public function getType_ed() {
		return $this->type_ed;
	}

	public function setType_ed( $type_ed) {
		$this->type_ed = $type_ed;
	}

// public abstract  function hydrate($row);
     
}