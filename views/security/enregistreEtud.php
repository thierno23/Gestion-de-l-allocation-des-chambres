
<div class="row align-items-center justify-content-center">
<form class="col-md-6 col-sm-7 col-lg-5 col-10  bg-light py-3" method="post" action="?url=Etudiant/validData">
  <div class="form-row">
        <div class="form-group col-md-6">
            <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom">
        </div>
        <div class="form-group col-md-6">
            <input type="text" class="form-control" name="nom" id="nom"  placeholder="Nom">
        </div>
  </div>
  <div class="form-group">
       <input type="email" class="form-control" name="email" id="email" placeholder="Address Email">
  </div>
  <div class="form-row">
        <div class="form-group col-md-6">
            <input type="tel" class="form-control" name="tel" id="tel" placeholder="Téléphone">
        </div>
        
        <div class="form-group col-md-6">
            <input type="date" class="form-control" name="date_naiss" id="date_naiss" placeholder="Date de Naissance">
        </div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-6 ">
     <?php  echo $this->data_view["choix"];?>
        
    </div>
    <div  id="champ" class="form-group col-md-6 "></div>
          
   </div>
 
  <button type="submit"  name="submit" class="btn btn-primary">Enregistrer</button>
</form>
</div>