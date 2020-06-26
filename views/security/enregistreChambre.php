 <div class="d-flex align-items-center justify-content-center">
     <div class="row">
         <form class="col  bg-light py-3" method="post" action="Addchambre/addChambre">
             <div class="form-row">

                 <div class="form-group col-12">
                     <input type="text" class="form-control" name="num_bat" value="" id="num_bat" placeholder="Numero batiment">
                 </div>
                 <div class="form-group col-12">
                     <input type="text" class="form-control" name="num_ch" id="num_ch" placeholder="Numero chambre"
                         readonly>
                 </div>
             </div>
             <div class="form-row">
                 <div class="form-group col-12  ">
                     <select id="type_ch" name="type_ch" class=" form-control text-sm ml-0">
                         <option selected>TYPE DE CHAMBRE</option>
                         <option>individuel</option>
                         <option>à deux</option>
                     </select>
                 </div>
             </div>
             <button type="submit" name="submit" class=" btn btn-primary">Enregistrer</button>
         </form>
     </div>
 </div>