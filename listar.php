

<?php	
	include('./controlador/conexion.php');
	

	$query ="SELECT tic.id_ticket_num id_ticket_num , tic.recibo_str recibo_str, tic.id_estado_num id_estado_num, est.estado_str estado, tic.comentario_str comentario_str from ticket tic inner join estado est on tic.id_estado_num=est.id_estado_num where tic.id_estado_num=1 order by tic.id_ticket_num desc;";
	$result=mysqli_query($conn, $query);

	if(!$result)
	{
		die("Error: No se esta listando");
	}
	else{
		while($data= mysqli_fetch_assoc($result))
		{
			$arreglo["data"][]=$data;
			//array_map("utf8_encode", $data);
		}

		echo json_encode($arreglo);
	}
		mysqli_free_result($result);

?>
