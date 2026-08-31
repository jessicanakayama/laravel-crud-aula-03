@extends('template/main',
    [
        'titulo'=>"Sistema Aula",
        'cabecalho' => 'Alterar Matrícula',
        'rota' => '',
    ]
)

@section('conteudo')

    <form
        action="{{ route('matricula.update', [$matricula->disciplina_id, $matricula->aluno_id]) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <div class="row">

            <div class="col">
                <div class="form-floating mb-3">

                    <select
                        class="form-select @error('aluno_id') is-invalid @enderror"
                        name="aluno_id"
                    >

                        @foreach ($alunos as $aluno)

                            <option
                                value="{{ $aluno->id }}"
                                {{ old('aluno_id', $matricula->aluno_id) == $aluno->id ? 'selected' : '' }}
                            >
                                {{ $aluno->nome }}
                            </option>

                        @endforeach

                    </select>

                    <label>Aluno</label>

                    @if($errors->has('aluno_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('aluno_id') }}
                        </div>
                    @endif

                </div>
            </div>

        </div>

        <div class="row">

            <div class="col">
                <div class="form-floating mb-3">

                    <select
                        class="form-select @error('disciplina_id') is-invalid @enderror"
                        name="disciplina_id"
                    >

                        @foreach ($disciplinas as $disciplina)

                            <option
                                value="{{ $disciplina->id }}"
                                {{ old('disciplina_id', $matricula->disciplina_id) == $disciplina->id ? 'selected' : '' }}
                            >
                                {{ $disciplina->nome }}
                            </option>

                        @endforeach

                    </select>

                    <label>Disciplina</label>

                    @if($errors->has('disciplina_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('disciplina_id') }}
                        </div>
                    @endif

                </div>
            </div>

        </div>

        <div class="row mb-5">

            <div class="col">

                <a href="{{ route('matricula.index') }}"
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