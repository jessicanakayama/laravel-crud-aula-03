<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Http\Requests\MatriculaRequest;
use App\Services\MatriculaService;
use App\Services\AlunoService;
use App\Services\CursoService;
use Illuminate\Support\Facades\Gate;

class MatriculaController extends Controller {

    public function __construct(
        protected MatriculaService $service,
        protected AlunoService $alunoService,
        protected CursoService $cursoService
    ) {}

    public function index() {
        Gate::authorize('viewAny', Matricula::class);

        $data = $this->service->all(
            ['aluno', 'curso'],
            [],
            'id'
        );

        return view('matricula.index', compact(['data']));
    }

    public function create() {
        Gate::authorize('create', Matricula::class);

        $alunos = $this->alunoService->all([], [], 'nome');
        $cursos = $this->cursoService->all([], [], 'nome');

        return view('matricula.create', compact(['alunos', 'cursos']));
    }

    public function store(MatriculaRequest $request) {
        Gate::authorize('create', Matricula::class);

        $this->service->store($request->validated());

        return redirect()->route('matricula.index');
    }

    public function show(string $id) {
        $matricula = $this->service->find($id, ['aluno', 'curso']);

        Gate::authorize('view', $matricula);

        if(isset($matricula)) {
            return view('matricula.show', compact(['matricula']));
        }

        return "<h1>Matrícula não encontrada!</h1>";
    }

    public function edit(string $id) {
        $matricula = $this->service->find($id, ['aluno', 'curso']);

        Gate::authorize('update', $matricula);

        $alunos = $this->alunoService->all([], [], 'nome');
        $cursos = $this->cursoService->all([], [], 'nome');

        if(isset($matricula)) {
            return view(
                'matricula.edit',
                compact(['matricula', 'alunos', 'cursos'])
            );
        }

        return "<h1>Matrícula não encontrada!</h1>";
    }

    public function update(MatriculaRequest $request, string $id) {
        $matricula = $this->service->find($id);

        Gate::authorize('update', $matricula);

        if(isset($matricula)) {
            $this->service->update(
                $request->validated(),
                $id
            );

            return redirect()->route('matricula.index');
        }

        return "<h1>Matrícula não encontrada!</h1>";
    }

    public function destroy(string $id) {
        $matricula = $this->service->find($id);

        Gate::authorize('delete', $matricula);

        if(isset($matricula)) {
            $this->service->remove($id);

            return redirect()->route('matricula.index');
        }

        return "<h1>Matrícula não encontrada!</h1>";
    }
}