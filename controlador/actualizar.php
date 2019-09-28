<?php	
	include("conexion.php");

	$idticket=$_POST["idticket"];
    $recibo=$_POST["recibo"];
    $estado=$_POST["estado"];
    $comentario=$_POST["comentario"];

    function modificar($idticket,$recibo,$estado,$comentario){
    	$query= "UPDATE ticket SET recibo_str='$recibo',
    							   id_estado_num='$estado',
    							   comentario_str='$comentario'
    							WHERE id_ticket_num='$idticket' AND 
    								  id_evento_num=1 AND 
    								  id_actividad_num=1";
    	$resultado = mysqli_master_query($conexion, $query);
    	verificar_resultado($resultado);
    	cerrar($conexion);


    	 "


    	select tic.id_ticket_num , tic.recibo_str,tic.id_estado_num,tic.comentario_str from ticket tic where tic.id_evento_num=1 and tic.id_actividad_num=1 order by tic.id_ticket_num desc;"
    }

?>