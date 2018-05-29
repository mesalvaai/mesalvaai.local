<h1>Pagina frutas - index</h1>

<a href="<?php echo e(route('naranjitas')); ?>" title="">Naranjas</a>
<a href="<?php echo e(url('pera')); ?>" title="">Peras</a>
<a href="<?php echo e(action('FrutasController@naranja')); ?>" title="">Laranja</a>
<a href="<?php echo e(action('FrutasController@pera')); ?>" title="">Peras</a>

<hr>

<form action="<?php echo e(url('/receber')); ?>" method="post" accept-charset="utf-8">
	<?php echo e(csrf_field()); ?>

	<label>Nome da Fruta</label>
	<input type="text" name="name">
	<label for="">Description</label>
	<input type="text" name="description">
	<input type="submit" name="enviar" value="ENVIAR">
</form>
