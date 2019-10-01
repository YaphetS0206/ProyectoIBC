
<?php include ("save_data.php"); ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Control de Tickets</title>
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="libreria/bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
        
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">    
  </head>
    
  <body> 
     <header style="background-color: black; padding-bottom:1%;padding-top: 1%;margin-bottom: 3%">
        
         <img src="images/logo_ibc.png" width="25%" class=" col-11 col-sm-8 col-md-6 col-lg-2 col-xl-2" >
     </header>    
     
    <!--Ejemplo tabla con DataTables-->
    <div class="container" >
                    <div class="row justify-content-center align-items-center " style=" padding-bottom: 5%">
                         <h1> Control de Tickets </h1>
                    </div>  
       
                    <div class="table-responsive" style="padding-bottom: 1%; ">   

                        <table id="dt_ticket" class="table table-striped table-bordered nowrap  p-b-50" style="width:100%;" >
                        <thead>
                            <tr>
                                <th>Nª Ticket</th>
                                <th>Nª Recibo</th>
                                <th>Estado</th>
                                <th>Observacion</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                              <?php
                              $table = mysqli_query($conn , 'SELECT * FROM ticket');
                             while($row  = mysqli_fetch_array($table)){?>
                              <tr id="<?php echo $row['id_ticket_num']; ?>">
                           <td data-target="ticket"><?php echo $row['id_ticket_num']; ?></td>
                           <td data-target="recibo"><?php echo $row['recibo_str']; ?></td>
                            <td data-target="estado"><?php

                            if( $row['id_estado_num'] ==1)
                            {// echo 'entro 1';
                             echo "<span class='badge badge-pill badge-success'>Pagado</span>" ;
                            }
                            if( $row['id_estado_num'] ==2)
                            {//echo 'entro 2';
                             echo "<span class='badge badge-pill badge-danger'>No pagado</span>" ;
                            }

                            ?>
                              



                            </td>
                            <td data-target="comentario"><?php echo $row['comentario_str']; ?></td>
                       <td><a href="#" data-role="actualizar" class='editor btn btn-info btn-lg' data-id="<?php echo $row['id_ticket_num'] ;?>"  data-toggle=modal data-target='#form'><i class='fa fa-pencil-square-o'></i></a></td>
                        </tr>
                    <?php }
                 ?>
                        </tbody>     
                       </table>                  
                    </div>
                  </div>    
             <div class="col-sm-12 col-md-6">
                <div class="dataTables_filter" id="example_filter"> 
    <!--  <span class="badge badge-pill badge-success">Pagado</span>
      <span class="badge badge-pill badge-danger">No pagado</span> -->


    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content"> 
          <div class="modal-header border-bottom-0"> 
          
           <h5 class="modal-title" id="exampleModalLabel">Actualizar Ticket</h5> 
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST">
            <div class="modal-body">
               <div class="form-group">
                <label for="ticket">N° Ticket</label>
                <input type="text" class="form-control"  name="ticket" id="ticket">
              </div>
              <div class="form-group">
                <label for="recibo">N° Recibo</label>
                <input type="text" class="form-control" id="recibo" name="recibo">
              </div>
              <div class="form-group">
                <label for="estado">Estado</label>
                   <select class="form-control" id="estado" name="estado">
                    <option value="" disabled selected></option>
                    <option value="1">Pagado</option>
                    <option value="2">No Pagado</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="comentario">Comentario:</label>
                <textarea class="form-control" rows="5" id="comentario" name="comentario"></textarea>
              </div>
              <input type="hidden" id="userId" class="form-control">
            </div>
            <div class="modal-footer border-top-0 d-flex justify-content-center">
              <button class="btn btn-success" id="actualizar" name="actualizar" value="Actualizar" >actualizar</button>
            </div> 
          </form>
        </div>
      </div>
    </div>    


      
    <!-- jQuery, Popper.js, Bootstrap JS -->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="js/jquery/jquery-3.4.1.min.js"></script>
    <script src="libreria/bootstrap/js/popper.js"></script>
    <script src="libreria/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- datatables JS -->
    <script type="text/javascript" src="js/datatables.min.js"></script>    
    <script type="text/javascript" src="js/dataTables.responsive.min.js"></script>    
    <script type="text/javascript" src="js/main.js"></script>  
    <script> 

   $(document).on('click','a[data-role=actualizar]',function(){

    // declarramos el id_ticket_num con un dato id porque es incremental y esto lo sacamos del boton update de php
        var id_ticket_num = $(this).data('id');
        var ticket = $('#'+id_ticket_num).children('td[data-target=ticket]').text();
        var recibo = $('#'+id_ticket_num).children('td[data-target=recibo]').text();
        var estado  = $('#'+id_ticket_num).children('td[data-target=estado]').text();
        var comentario = $('#'+id_ticket_num).children('td[data-target=comentario]').text();


            $('#ticket').val(ticket);
            $('#recibo').val(recibo);
            $('#estado').val(estado);
            $('#comentario').val(comentario);
             $('#userId').val(id_ticket_num);
            $('#form').modal('toggle');
  });
 $('#actualizar').click(function(){
          var id_ticket_num = $('#userId').val();
          var ticket =  $('#ticket').val();
          var recibo =  $('#recibo').val();
          var estado =   $('#estado').val();
          var comentario =   $('#comentario').val();

           $.ajax({
              url      : 'conexion.php',
              method   : 'POST', 
              data     : {ticket : ticket , recibo: recibo , estado : estado ,comentario: comentario, id: id_ticket_num},
              success  : function(response){
                //ahora actualice el registro de usuario en la tabla que vamos a indicar 
                  $('#'+id).children('td[data-target=ticket').text(ticket);
                  $('#'+id).children('td[data-target=recibo]').text(recibo);
                  $('#'+id).children('td[data-target=estado]').text(estado);
                  $('#'+id).children('td[data-target=comentario]').text(comentario);
                  $('#form').modal('toggle');
               }
          });
       });
</script>


  </body>
</html>
