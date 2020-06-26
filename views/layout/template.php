<!doctype html>
   <html lang="en">
     <head>
       <title>Title</title>
       <!-- Required meta tags -->
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
       <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

       <link rel="stylesheet" href="<?=BASE_URL?>publics/css/styles.css">
     </head>
     <body class="m-0 p-0 bg-light">
         


      <?php  require_once "header.php";
     
        echo  $content_for_layout?>
     
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 </body>
     
<script>
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
      function loadUser(limit=1 ,offset=0) 
      {
      var action = "pagina";

      $.ajax({
        url : "?url=Chambre/Pagination", 
        method:"POST", 
        data:{action:action,limit:limit,offset:offset}, 
        success:function(data){
          $('#tbody').html('');
          $('#tbody').append(data); 
          
        }
      });
      }
      // scroll

      $('#suivant').click(function(e){
          
          tbody = $('#tbody');
          charger = $('#charger');

          loadUser(limit,offset);
        limit+=5
      })

        
    $('#action').click(function(){
    var num_ch = $('#num_ch').val(); 
    var type = $('#type').val(); 
    var id = $('#num_id').val(); 
    var action = $('#action').val();  
    if(num_ch != '' && type!= '') 
    {
    $.ajax({
    url : "?url=Chambre/setUpdate",   
    method:"POST",    
    data:{num_ch:num_ch, type:type, id:id, action:action}, 
    success:function(data){
      alert(data);  
      $('#customerModal').modal('hide'); 
      loadUser(detinate="Pagination") 
    }
    });
    }
    else
    {
    alert("Both Fields are Required"); 
    }
    });

    $(document).on('click', '.update', function(){
      var id = $(this).attr("id"); 
      var action = "Select";   
      $.ajax({
          url:"?url=Chambre/setUpdate",  
          method:"POST",   
          data:{id:id, action:action},
          
          success:function(data){
              
          $('#customerModal').modal('show'); 
          $('.modal-title').text("Update room"); 
          $('#action').val("Update");     
          $('#num_id').val(id);   
          $('#num_ch').val(data.num_ch);  
          $('#type').val(data.type);  
          
      }
      });
    });
    $(document).on('click', '.delete', function(){
    var id = $(this).attr("id"); 

    if(confirm("Are you sure you want to remove this data?"))
    {
      
    var action = "Delete"; 
    $.ajax({
    url:"??url=Chambre/setUpdate",   
    method:"POST",     
    data:{id:id, action:action}, 
    success:function(data)
    {
      
      console.log(data);
      
    alert(data); 

    }

    })
    $(this).parents('tr').hide();
    }
    else  
    {
    return false; 
    }
    });

      // const id =$(this).attr("id");
      // const tab = id.split("_");
      // objEnCours=$(this);

    })
</script>
   </html>