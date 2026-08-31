@extends('template/main',
    [
        'titulo'=>"Sistema Aula",
        'cabecalho' => 'Detalhes do Aluno',
        'rota' => '',
    ]
)

@section('conteudo')

    <div class="row">
        <div class="col">
            <div class="form-floating mb-3">

                <input
                    type="text"
                    class="form-control"
                    value="{{ $aluno->nome }}"
                    disabled
                />

                <label>Nome</label>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-floating mb-3">

                <input
                    type="text"
                    class="form-control"
                    value="{{ $aluno->turma }}"
                    disabled
                />

                <label>Turma</label>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-floating mb-3">

                <input
                    type="text"
                    class="form-control"
                    value="{{ $aluno->curso->nome ?? '-' }}"
                    disabled
                />

                <label>Curso</label>

            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col">

            <a href="{{ route('aluno.index') }}"
               class="btn btn-secondary">

                Voltar

            </a>

        </div>
    </div>

@endsection