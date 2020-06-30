$(document).ready(function(){


        //  Scroll
    const scrollZone = $('#scrollZone')
    let offset= 5;
     
    scrollZone.scroll(function(){
    //console.log(scrollZone[0].clientHeight)
    const st = scrollZone[0].scrollTop;
    const sh = scrollZone[0].scrollHeight;
    const ch = scrollZone[0].clientHeight;

    console.log(st,sh, ch);
    
    if(sh-st <= ch){
        $.ajax({
            type: "POST",
            url: "?url=Etudiant/ScrollZone",
            data: {limit:5,offset:offset},
            success: function (data) {
                console.log(data);
                $('#t_body').html(data);
                offset +=5;
            }
        });
    }
    })
    var choix = "";

     var champ = $("#champ") 
    $( "#type_etud" ).change(function () {
    $( "select option:selected" ).each(function() {
    choix = $( this ).val();
    })
    champ.html('')
    if(choix == "op_1")  { champ.append("<span>vous n'avez pas de logement</span>"); }
    if(choix == "op_3")    {champ.append('<input type=text id="address" name="address" placeholder="Entrer l\'address" class="form-control col-12"> ');} 
    if(choix == "op_2"){
        $.ajax({
            type: "POST",
            url: "?url=Security/Option",
            data: {date:1},
            success: function (data) {
                champ.html(data);
               
            }
        });
    }
})

})

$("#t_body")
    .on("click","tr",function(){
        coul=$("body").css("background-color");
        $(this).css("background-color","orange");
        $("#bd_users tr").not(this).css("background-color",coul);
})
    .on('dblclick',"td",function(){
        $(this).parents().css("background-color",coul);
});
function printData(data,tbody){
    $.each(data, function(indice,vente){
        tbody.append(`
        <tr class="text-center">
            <td>${vente.heure}</td>
            <td>${vente.telephone}</td>
            <td>${vente.montant}</td>
        </tr>
    `);
});
}
