<?php // aca siempre hay que hacer los querys y toda la vaina 
//ya que es una buena practica.

$conn =mysqli_connect('localhost','root', '', 'ibc') or 
	die(mysqli_erro($mysqli));

if(isset($_POST['ticket'])&& isset($_POST["recibo"])&& isset($_POST["estado"])&& isset($_POST["comentario"])){
	
	$ticket = $_POST['ticket'];
	$recibo = $_POST['recibo'];
	$estado = $_POST['estado'];
	$comentario = $_POST['comentario'];

	//  query to update data 
	$result  = mysqli_query($conn , "UPDATE ticket SET recibo_str='$recibo',id_estado_num='$estado',comentario_str='$comentario'
                WHERE id_ticket_num='$ticket'");
	/*if($result){
		echo 'data updated';
	}*/

}













/*

	if(isset($_POST["ticket"])&& isset($_POST["recibo"])&& isset($_POST["estado"])&& isset($_POST["comentario"])){

       $ticket=$_POST["ticket"];
       $recibo=$_POST["recibo"];
       $estado=$_POST["estado"];
       $comentario=$_POST["comentario"];




 $query= "UPDATE ticket SET recibo_str='$recibo',id_estado_num='$estado',comentario_str='$comentario'
                WHERE id_ticket_num='$ticket'     
                AND id_evento_num=12 AND id_actividad_num=1";



      $result = mysqli_query($conn,$query);

    }*/

?>