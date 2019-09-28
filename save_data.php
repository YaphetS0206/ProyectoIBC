
<?php //ACA INCLUYO YO LA CONEXION PHP
include('./controlador/conexion.php');

	if (isset($_POST["username"]) && isset($_POST["pass"]) )
	{
		$usuario=$_POST["username"];
	    $contraseia=$_POST["pass"];
		$query="SELECT * FROM usuario where usuario_str='$usuario' and contraseia_str='$contraseia';";

		$result = mysqli_query($conn, $query);

		if (!$result) {
			die("query FAIL");
		}
		
	}

?>