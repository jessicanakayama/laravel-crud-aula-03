<?php

namespace App\Services;

use App\Repositories\AlunoRepository;

class AlunoService extends BaseService {

    public function __construct(protected AlunoRepository $repository) { }

    protected function getRepository(): mixed {
        return $this->repository;
    }
}