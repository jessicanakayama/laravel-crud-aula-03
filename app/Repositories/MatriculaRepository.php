<?php

namespace App\Repositories;

use App\Models\Matricula;

class MatriculaRepository extends BaseRepository {

    public function __construct(protected Matricula $model) {}

    protected function getModel(): mixed {
        return $this->model;
    }
}