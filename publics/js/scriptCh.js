$(document).ready(function(){
         
    $("#num_bat").on('focusout',function(e){
        let num_bat = $("#num_bat").val();
        let num_ch =''; 
        let random =Math.floor((Math.random() * 10000) + 1);
        num_ch = num_bat+"-"+random ;
        $("#num_ch").attr('value',num_ch)
    })

});
$(document).ready(function(){

 let limit =5
 let offset = 5;
 function loadUser(limite=1 ,offsete=0,chemin='Pagination'){
    var action = "pagina";
    $.ajax({
        url : "?url=Chambre/"+chemin,
        method:"POST", 
        data:{action:action,limit:limite,offset:offsete}, 
        success:function(data){  
            $('#tbody').html(data); 
        }
    });
}
 // pagination
 $('#suivant').click(function(e){
     let tbody = $('#tbody');
     $('#tbody').html(""); 
     loadUser(limit,offset);
     limit+=5
 });
 //mise a jour
$('#action').click(function(){
    var num_ch = $('#num_ch').val(); 
    var num_bat = $('#num_bat').val(); 
    var type_ch = $('#type_ch').val(); 
    var id = $('#num_id').val(); 
    var action = $('#action').val(); 
    console.log(num_ch,num_bat,type_ch,id,action); 
    if(num_ch != '' && type_ch!= '' && num_bat !=''){
        $.ajax({
            url : "?url=Chambre/setUpdate",   
            method:"POST",    
            data:{num_ch:num_ch, num_bat:num_bat,type_ch:type_ch,id:id, action:action}, 
            success:function(data){
                alert(data);  
                $('#customerModal').modal('hide'); 
           
            }
        });
    }
   else{alert("Both Fields are Required"); }
});

$(document).on('click', '.update', function(){
    var num_ch = $(this).attr("id"); 
    console.log(num_ch);
    var action = "Select";  
    $.ajax({
        url:"?url=Chambre/setUpdate",  
        method:"POST",
        data:{num_ch:num_ch, action:action},  
        success:function(data){
            $('#customerModal').modal('show'); 
            $('.modal-title').text("Update room"); 
            $('#action').val("Update"); 
            data = JSON.parse(data);
            $('#num_id').val(num_ch); 
            $('#num_ch').val(data.num_ch);
            $('#num_bat').val(data.num_bat);
            if(data.type_ch=='individuel'){ $('#_2').attr('selected','selected');}
            if(data.type_ch=='a deux'){$('#_3').attr('selected','selected');}
            //  dat = JSON.parse(data)
            // console.log(data)
        }
    });
});
$(document).on('click', '.delete', function(){
    var num_ch = $(this).attr("id"); 
    if(confirm("Are you sure you want to remove this data?")){
        var action = "Delete"; 
        $.ajax({
            url:"?url=Chambre/setDelete",   
            method:"POST",     
            data:{num_ch:num_ch, action:action}, 
            success:function(data){
                console.log(data);
                loadUser();
                alert(data); 
            }
        })
        $(this).parents('tr').hide();
    }else  {return false; }
});
$("#tbody")
    .on("click","tr",function(){
        coul=$("body").css("background-color");
        $(this).css("background-color","orange");
        $("#bd_users tr").not(this).css("background-color",coul);
})
    .on('dblclick',"td",function(){
        $(this).parents().css("background-color",coul);
});

})