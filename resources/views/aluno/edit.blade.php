@extends('template/main',
    [
        'titulo'=>"Sistema Aula",
        'cabecalho' => 'Alterar Aluno',
        'rota' => '',
    ]
)

@section('conteudo')

    <form action="{{ route('aluno.update', $aluno->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">

                    <input
                        type="text"
                        class="form-control @error('nome') is-invalid @enderror"
                        name="nome"
                        value="{{ old('nome', $aluno->nome) }}"
                    />

                    <label>Nome</label>

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
                        value="{{ old('turma', $aluno->turma) }}"
                    />

                    <label>Turma</label>

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

                        @foreach ($cursos as $curso)
                            <option
                                value="{{ $curso->id }}"
                                {{ old('curso_id', $aluno->curso_id) == $curso->id ? 'selected' : '' }}
                            >
                                {{ $curso->nome }}
                            </option>
                        @endforeach

                    </select>

                    <label>Curso</label>

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
                   class="btn btn-secondary">

                    Voltar

                </a>

                <button type="submit"
                        class="btn btn-success">

                    Confirmar

                </button>

            </div>
        </div>

    </form>

@endsection