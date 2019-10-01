

<?php
  include('./controlador/conexion.php');  

	if(isset($_POST["ticket"])&& isset($_POST["recibo"])&& isset($_POST["estado"])&& isset($_POST["comentario"])){

       $ticket=$_POST["ticket"];
       $recibo=$_POST["recibo"];
       $estado=$_POST["estado"];
       $comentario=$_POST["comentario"];




 $query= "UPDATE ticket SET recibo_str='$recibo',id_estado_num='$estado',comentario_str='$comentario'
                WHERE id_ticket_num='$ticket'     
                AND id_evento_num=12 AND id_actividad_num=1";



      $result = mysqli_query($conn,$query);
    }

?>


   
