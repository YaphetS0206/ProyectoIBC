
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
                <input type="text" class="form-control" id="ticket">
              </div>
              <div class="form-group">
                <label for="recibo">N° Recibo</label>
                <input type="text" class="form-control" id="recibo">
              </div>
              <div class="form-group">
                <label for="estado">Estado</label>
                   <select class="form-control" id="estado">
                    <option value="" disabled selected></option>
                    <option value="1">Pagado</option>
                    <option value="2">No Pagado</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="comentario">Comment:</label>
                <textarea class="form-control" rows="5" id="comentario"></textarea>
              </div>
            </div>
       <div class="modal-footer border-top-0 d-flex justify-content-center">

              <button type="submit" class="btn btn-success" id="actualizar">actualizar</button>
            
            </div> 
          </form>
        </div>
      </div>
    </div>    
      
    <!-- jQuery, Popper.js, Bootstrap JS -->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/jquery/jquery-3.4.1.min.js"></script>
    <script src="libreria/bootstrap/js/popper.js"></script>
    <script src="libreria/bootstrap/js/bootstrap.min.js"></script>
  
    <!-- datatables JS -->
    <script type="text/javascript" src="js/datatables.min.js"></script>    
    <script type="text/javascript" src="js/dataTables.responsive.min.js"></script>    
    <script type="text/javascript" src="js/main.js"></script>  
    
  </body>
</html>
