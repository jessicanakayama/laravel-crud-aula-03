@extends('template/main',
    [
        'titulo'=>"Sistema Aula",
        'cabecalho' => 'Detalhes da Matrícula',
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
                    value="{{ $matricula->aluno->nome ?? '-' }}"
                    disabled
                />

                <label>Aluno</label>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col">

            <div class="form-floating mb-3">

                <input
                    type="text"
                    class="form-control"
                    value="{{ $matricula->disciplina->nome ?? '-' }}"
                    disabled
                />

                <label>Disciplina</label>

            </div>

        </div>

    </div>

    <div class="row mb-5">

        <div class="col">

            <a href="{{ route('matricula.index') }}"
               class="btn btn-secondary">

                Voltar

            </a>

        </div>

    </div>

@endsection