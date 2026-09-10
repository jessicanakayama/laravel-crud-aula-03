<?php

namespace App\Policies;

use App\Models\Aluno;
use App\Models\User;
use App\Services\PermissionService;

class AlunoPolicy {

    public function __construct(protected PermissionService $service) {}

    public function viewAny(User $user): bool {
        return $this->service->isAuthorized('aluno.index', $user);
    }

    public function view(User $user, Aluno $aluno): bool {
        return $this->service->isAuthorized('aluno.show', $user);
    }

    public function create(User $user): bool {
         return $this->service->isAuthorized('aluno.create', $user);
    }

    public function update(User $user, Aluno $aluno): bool {
        return $this->service->isAuthorized('aluno.edit', $user);
    }

    public function delete(User $user, Aluno $aluno): bool {
        return $this->service->isAuthorized('aluno.delete', $user);

    }
    public function restore(User $user, Aluno $aluno): bool {
        return $this->service->isAuthorized('aluno.delete', $user);
    }

    public function forceDelete(User $user, Aluno $aluno): bool
    {
        return $this->service->isAuthorized('aluno.delete', $user);
    }
}