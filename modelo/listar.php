

<?php	
	include("conexion.php");

	$query ="select tic.id_ticket_num , tic.recibo_str,tic.id_estado_num,tic.comentario_str from ticket tic where tic.id_evento_num=1 and tic.id_actividad_num=1 order by tic.id_ticket_num desc;";
	$resultado=mysqli_master_query($conexion, $query);

	if(!$resultado)
	{
		die("Error: No se esta listando");
	}
	else{
		while($data= mysqli_fetch($resultado))
		{
			$arreglo["data"][]=array_map("utf8_encode", $data);
		}

		echo json_encode($arreglo);
	}
mysqli_bind_result($resultado)

?>
