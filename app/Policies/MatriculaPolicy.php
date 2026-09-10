<?php

namespace App\Policies;

use App\Models\Matricula;
use App\Models\User;
use App\Services\PermissionService;

class MatriculaPolicy {

    public function __construct(protected PermissionService $service) {}

    public function viewAny(User $user): bool {
        return $this->service->isAuthorized('matricula.index', $user);
    }

    public function view(User $user, Matricula $matricula): bool {
        return $this->service->isAuthorized('matricula.show', $user);
    }

    public function create(User $user): bool {
         return $this->service->isAuthorized('matricula.create', $user);
    }

    public function update(User $user, Matricula $matricula): bool {
        return $this->service->isAuthorized('matricula.edit', $user);

    }

    public function delete(User $user, Matricula $matricula): bool {
        return $this->service->isAuthorized('matricula.delete', $user);

    }
    public function restore(User $user, Matricula $matricula): bool {
        return $this->service->isAuthorized('matricula.delete', $user);
    }

    public function forceDelete(User $user, Matricula $matricula): bool
    {
        return $this->service->isAuthorized('matricula.delete', $user);
    }
}