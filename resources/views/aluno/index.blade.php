<!DOCTYPE html>
<html>
<head>
    <title>Alunos</title>
</head>
<body>

    <h1>Alunos</h1>

    @foreach ($data as $aluno)
        <p>{{ $aluno->nome }}</p>
    @endforeach

</body>
</html>