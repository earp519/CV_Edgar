<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="estilos.css">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<head>
	<meta charset="UTF-8">
	<title>Formulario Contacto</title>
</head>
<body>
	<div class="wrap">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

			<input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php if (!$enviado && isset($nombre)) echo $nombre ?>" id="nombre">
			<input type="email" class="form-control" name="correo" placeholder="Correo Electronico" value="<?php if (!$enviado && isset($correo)) echo $correo ?>" id="correo">
			<textarea name="mensaje" class="form-control" placeholder="mensaje" id="mensaje"> <?php if (!$enviado && isset($mensaje)) echo $mensaje ?> </textarea>

	<?php if (!empty($errores)): ?>
	<div class="alert error">
		<?php echo $errores; ?>
	</div>
	<?php elseif ($enviado): ?>
	<div class="alert success">
		<p>Enviado Correctamente</p>
	</div>
	<?php endif	 ?>



			<input type="submit" name="submit" class="btn btn-primary" valor="enviar correo">
		</form>
	</div>
</body>
</html>