@extends('template/main',
    [
        'titulo'=>"Sistema Aula",
        'cabecalho' => 'Novo Aluno',
        'rota' => '',
    ]
)

@section('conteudo')

    <form action="{{ route('aluno.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">

                    <input
                        type="text"
                        class="form-control @error('nome') is-invalid @enderror"
                        name="nome"
                        placeholder="Nome"
                        value="{{ old('nome') }}"
                    />

                    <label for="nome">Nome</label>

                    @if($errors->has('nome'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nome') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">

                    <input
                        type="text"
                        class="form-control @error('turma') is-invalid @enderror"
                        name="turma"
                        placeholder="Turma"
                        value="{{ old('turma') }}"
                    />

                    <label for="turma">Turma</label>

                    @if($errors->has('turma'))
                        <div class="invalid-feedback">
                            {{ $errors->first('turma') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">

                    <select
                        class="form-select @error('curso_id') is-invalid @enderror"
                        name="curso_id"
                    >
                        <option value="">Selecione o curso</option>

                        @foreach ($cursos as $curso)
                            <option
                                value="{{ $curso->id }}"
                                {{ old('curso_id') == $curso->id ? 'selected' : '' }}
                            >
                                {{ $curso->nome }}
                            </option>
                        @endforeach
                    </select>

                    <label for="curso_id">Curso</label>

                    @if($errors->has('curso_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('curso_id') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col">

                <a href="{{ route('aluno.index') }}"
                   class="btn btn-secondary btn-block align-content-center">

                    Voltar
                </a>

                <button type="submit"
                        class="btn btn-success btn-block align-content-center">

                    Confirmar

                </button>

            </div>
        </div>

    </form>

@endsection