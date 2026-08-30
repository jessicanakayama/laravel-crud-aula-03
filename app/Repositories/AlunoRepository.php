<?php

namespace App\Repositories;

use App\Models\Aluno;

class AlunoRepository extends BaseRepository {

    public function __construct(protected Aluno $model) {}

    protected function getModel(): mixed {
        return $this->model;
    }
}