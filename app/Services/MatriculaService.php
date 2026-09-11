<?php

namespace App\Services;

use App\Repositories\MatriculaRepository;

class MatriculaService extends BaseService
{
    public function __construct(protected MatriculaRepository $repository)
    {
    }

    protected function getRepository(): mixed
    {
        return $this->repository;
    }

    public function auditMatricula(int|string $disciplina_id, int|string $aluno_id)
    {
        $matricula = $this->repository->findByAlunoDisciplina(
            $aluno_id,
            $disciplina_id
        );

        return $matricula->audits()
            ->with('user')
            ->latest()
            ->get()
            ->transform(function ($audit) {
                $old = is_string($audit->old_values)
                    ? json_decode($audit->old_values, true)
                    : (array) $audit->old_values;

                $new = is_string($audit->new_values)
                    ? json_decode($audit->new_values, true)
                    : (array) $audit->new_values;

                $audit->old_values = array_map('strval', $old ?? []);
                $audit->new_values = array_map('strval', $new ?? []);

                return $audit;
            });
    }
}
