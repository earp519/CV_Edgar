<?php 	
/// el simbolo "!" se utiliza para decir "Si no hay algo"
/// por ejemplo if(!empty($mensaje)) dice "si no esta vacio el campo mensaje"
$errores='';
$enviado='';

if (isset($_POST['submit'])) {
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$mensaje = $_POST['mensaje'];

	if(!empty($nombre)){
		$nombre = trim($nombre);
		$nombre	= filter_var($nombre, FILTER_SANITIZE_STRING);
	} else  {
		$errores .= 'Por favor ingresa un nombre <br/>';	
	}
	if (!empty ($correo)) {
		$correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
		if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
			$errores .='Por favor ingresa un correo valido <br/>';
		}
	} else {
		$errores .='Por favor ingresa un correo <br/> ';
	}

	if (!empty($mensaje)) {
		$mensaje = htmlspecialchars($mensaje);
		$mensaje = trim($mensaje);
		$mensaje = stripcslashes($mensaje);
	} else{
		$errores .='Por favor ingresa mensaje <br/>';
	}
	if (!$errores) {
		$enviar_a ='earp519@hotmail.com';
		$asunto = 'correo enviado desde mi formulario de pagina';
		$mensaje_preparado ="de: $nombre \n";
		$mensaje_preparado .= "Correo: $correo \n ";
		$mensaje_preparado .= "Mensaje: ". $mensaje;

		mail($enviar_a, $asunto, $mensaje_preparado);
		$enviado ='true';	
	}
}

require 'index.view.php';
 ?>