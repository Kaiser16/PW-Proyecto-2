<html lang="es">
<head>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>template/estilos.css">
	<meta charset="utf-8" />
	<title >Inicio de sesión</title>
</head>
<body>
	<div class="bigblock">
	<h1 class="littleblock">Iniciar Sesión</h1>
	<?php if(isset($mensaje)):?>
		<h2 class="bigblock"><?= $mensaje?></h2>
	<?php endif;?>
	<form class="bigblock" name="form_iniciar" action="<?= base_url()?>index.php/usuarios/verify_sesion" method="POST">
		<section class="littleblock" >
		<label  class="label" for="Usuario"> Usuario</label>
		<input type="text" name="user" /> <br/>
		</section>
		<section class="littleblock" >
		<label class="label" for="contraseña"> Contraseña</label>
		<input type="password" name="pass" /> <br/>
		</section >
		<input type="submit" value="Entrar" name="submit" /> <br/>
		<br>
		<a class="topbarblock"	href="<?= base_url().'usuarios/registro'?>" title="Deseo registrarme">Registrarme</a>
	</form>
	</div>
</body>
</html>