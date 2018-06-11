<div>
    <h1>Lista dos Estudantes:</h1>
 
    @foreach ( $students as $student )
        <p>Nome: {{ $student->name }}</p>
    @emtpy
        <p>Nenhum Estudante Cadastrado</p>
    @endforeach
</div>