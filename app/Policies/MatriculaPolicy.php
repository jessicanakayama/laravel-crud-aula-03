<?php

namespace App\Policies;

use App\Models\Matricula;
use App\Models\User;
use App\Services\PermissionService;

class MatriculaPolicy {

    public function __construct(protected PermissionService $service) {}

    public function viewAny(User $user): bool {
        return $this->service->isAuthorized('matricula.index');
    }

    public function view(User $user, Matricula $matricula): bool {
        return $this->service->isAuthorized('matricula.show');
    }

    public function create(User $user): bool {
         return $this->service->isAuthorized('matricula.create');
    }

    public function update(User $user, Matricula $matricula): bool {
        return $this->service->isAuthorized('matricula.edit');

    }

    public function delete(User $user, Matricula $matricula): bool {
        return $this->service->isAuthorized('matricula.delete');

    }
    public function restore(User $user, Matricula $matricula): bool {
        return $this->service->isAuthorized('matricula.delete');
    }

    public function forceDelete(User $user, Matricula $matricula): bool
    {
        return $this->service->isAuthorized('matricula.delete');
    }
}