<?php

namespace App\Services;

use App\Repositories\MatriculaRepository;

class MatriculaService extends BaseService {

    public function __construct(protected MatriculaRepository $repository) { }

    protected function getRepository(): mixed {
        return $this->repository;
    }
}