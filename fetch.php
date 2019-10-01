 <?php  
 //fetch.php  

 echo 'entro al echo';
/*
 include('./controlador/conexion.php');
 	echo"entro al fetch ";

 if(isset($_POST["ticket_id"]))  
 {  
 	$ticket_id=$_POST["ticket_id"];
 		echo"{$ticket_id}";

      $query = "SELECT id_ticket_num  , recibo_str, id_estado_num , comentario_str  from ticket tic where id_ticket_num='$ticket_id';";  

      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  */
 ?>