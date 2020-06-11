<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>template/estilos.css">
	<title><?= urldecode($titulo); ?></title>
</head>
<body>	
	<h1 class="littleblock">Post sobre <?= urldecode($titulo); ?></h1>
	<section class="comentario" style="background-color: #6B5B95;">
	<img class="postimg" src="<?=base_url()?>images/<?= urldecode($imagen); ?>" width="100">
	<table>
		<tr>
			<th>
			<div class="post">
				<p class="littleblock">Usuario: <a href="<?=base_url().'index.php/un_usuario/usu/',urldecode($id_usuario)?>"><?= urldecode($id_usuario); ?></a></p>
			</div>
			<br>
			<div class="post">
				<?= urldecode($opinion); ?>
			</div>
			</th>
		</tr>
	</table>
	</section>
	<?php if(isset($comentarios)): ?>
	<?php foreach ($comentarios as $fila):?>
		<?php 
			$res = $this->usuarios_model->get_usuario($fila->id_usuario);
			$imagen = array_shift($res)->imagen;
		?>
		<section class="comentario"style="background-color: #7289da;">
			<img class="postimg" src="<?=base_url()?>images/<?= $imagen; ?>">
			<table>
				<tr>
					<th>
					<div class="post">
						<p class="littleblock" >Respuesta de <a href="<?=base_url().'index.php/un_usuario/usu/',$fila->id_usuario?>"><?=$fila->id_usuario?></a></p>
					</div>
					<br>
					<div class="post">
						<?= $fila->comentario ?>
					</div>
					</th>
				</tr>
			</table>
		</section>
	<?php endforeach; ?>
	
	<section class="littleblock">
	<?=form_open(base_url().'index.php/un_post/comentar')?>
		<?= form_label('Comentario','Comentario',array('class'=>'label')); ?> 
		<br>
		<?= form_textarea('comentario','','class="textarea" row="50xp"' ); ?>
		<br>
		<?=form_submit('submit','Enviar Comentario','class="label"');?>
		<?=form_hidden('id_post',urldecode($id))?>
	<?=form_close()?>
	</section>
	<?php endif; ?>
</body>
</html>