<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Http\Requests\AlunoRequest;
use App\Services\AlunoService;
use Illuminate\Support\Facades\Gate;

class AlunoController extends Controller {

    public function __construct(
        protected AlunoService $service
    ) {}

    public function index() {
        Gate::authorize('viewAny', Aluno::class);

        $data = $this->service->all([], [], 'nome');

        return view('aluno.index', compact(['data']));
    }

    public function create() {
        Gate::authorize('create', Aluno::class);

        return view('aluno.create');
    }

    public function store(AlunoRequest $request) {
        Gate::authorize('create', Aluno::class);

        $this->service->store($request->validated());

        return redirect()->route('aluno.index');
    }

    public function show(string $id) {
        $aluno = $this->service->find($id);

        Gate::authorize('view', $aluno);

        if(isset($aluno)) {
            return view('aluno.show', compact(['aluno']));
        }

        return "<h1>Aluno não encontrado!</h1>";
    }

    public function edit(string $id) {
        $aluno = $this->service->find($id);

        Gate::authorize('update', $aluno);

        if(isset($aluno)) {
            return view('aluno.edit', compact(['aluno']));
        }

        return "<h1>Aluno não encontrado!</h1>";
    }

    public function update(AlunoRequest $request, string $id) {
        $aluno = $this->service->find($id);

        Gate::authorize('update', $aluno);

        if(isset($aluno)) {
            $this->service->update($request->validated(), $id);

            return redirect()->route('aluno.index');
        }

        return "<h1>Aluno não encontrado!</h1>";
    }

    public function destroy(string $id) {
        $aluno = $this->service->find($id);

        Gate::authorize('delete', $aluno);

        if(isset($aluno)) {
            $this->service->remove($id);

            return redirect()->route('aluno.index');
        }

        return "<h1>Aluno não encontrado!</h1>";
    }
}