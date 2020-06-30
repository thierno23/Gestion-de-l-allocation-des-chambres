<style>
#scrollZone{
    max-height: 20em;
     width: 70%;
    margin: auto;
    overflow: scroll;
    
}

</style>
<div id="scrollZone" class=" align-items-center justify-content-center">
    <div class="row ">
        <div class="col">
            <table id="" class="table table-striped" >
                <thead>
                    <tr class="text-sm-center h-25">
                        <th id="">Matricule</th>
                        <th id="">Prenom</th>
                        <th id="">Nom</th>
                        <th id="">Email</th>
                        <th id="">Tel</th>
                        <th id="">Date</th>
                        <th id="">Func</th>
                    </tr>
                </thead>
                <tbody id="t_body">
                    <tr class="text-center ">
                       <td>2333KAOU5468</td>
                        <td>Kane</td>
                        <td>Abdou</td>
                        <td>kane@gmail.com</td>
                        <td>002125878</td>
                        <td>88/2/5878</td>
                        <td>
                            <div class="suiv float-left mr-1"><input id="suiv" class="btn btn-success" type="button"
                                    value="update"></div>
                            <div class="suiv float-left"><input id="suiv" class="btn btn-danger" type="button"
                                    value="delete"></div>
                        </td>
                        <?php  echo @$this->data_view['tab']?>
                    </tr>

                </tbody>
            </table>
            <!-- <div class="suivant float-right"><input id="suivant" class="btn btn-success" type="button" value="suivant"> -->
            </div>
        </div>
    </div>

       <!-- This is Customer Modal. It will be use for Create new Records and Update Existing Records!-->
       <div id="customerModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create New Records</h4>
                </div>
                <div class="modal-body">
                    <label>Entrer numero chambre</label>
                    <input type="text" name="num_ch" id="num_ch" class="form-control "
                         />
                   
                    <label>Entrer numero batiment</label>
                    <input type="text" name="num_bat" id="num_bat"  class="form-control "
                         />
                    <br />
                    <label>Choisir le type</label>
                    <select id="type_ch"  name="type_ch" class="form-control text-sm ml-0">
                        <option id="_1" >TYPE DE CHAMBRE</option>
                        <option id="_2" >individuel</option>
                        <option id="_3" >à deux</option>
                    </select>
                    <!-- <input type="text" name="type" id="type" class="form-control" placeholder="Chamger le type de la chambre"/> -->
                    <br />
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="num_id" id="num_id" />
                    <input type="submit" name="action" id="action" class="btn btn-success" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>