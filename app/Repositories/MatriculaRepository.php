<?php

namespace App\Repositories;

use App\Models\Matricula;

class MatriculaRepository extends BaseRepository {

    public function __construct(protected Matricula $model) {}

    protected function getModel(): mixed {
        return $this->model;
    }

    public function findByAlunoDisciplina(
    int|string $aluno_id,
    int|string $disciplina_id
) {
    return $this->getModel()
        ->where('aluno_id', $aluno_id)
        ->where('disciplina_id', $disciplina_id)
        ->firstOrFail();
}

}