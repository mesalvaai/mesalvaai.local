<h1>Pagina frutas - index</h1>

<a href="{{ route('naranjitas') }}" title="">Naranjas</a>
<a href="{{ url('pera') }}" title="">Peras</a>
<a href="{{ action('FrutasController@naranja') }}" title="">Laranja</a>
<a href="{{ action('FrutasController@pera') }}" title="">Peras</a>

<hr>

<form action="{{ url('/receber') }}" method="post" accept-charset="utf-8">
	{{ csrf_field() }}
	<label>Nome da Fruta</label>
	<input type="text" name="name">
	<label for="">Description</label>
	<input type="text" name="description">
	<input type="submit" name="enviar" value="ENVIAR">
</form>
