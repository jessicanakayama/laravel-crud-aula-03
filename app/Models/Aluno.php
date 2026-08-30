<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

use OwenIt\Auditing\Contracts\Auditable;	// Linha Adicionada
use OwenIt\Auditing\Auditable as AuditableTrait; // Linha Adicionada

class Aluno extends Model implements Auditable { // Linha Alterada
  
     use AuditableTrait;		// Linha Adicionada
     use SoftDeletes;

    protected $fillable = [
        'nome',
        'turma',
        'curso_id',
    ];

    public function curso() {
        return $this->belongsTo('\App\Models\Curso');
    }

    public function disciplina() {
        return $this->belongsToMany('\App\Models\Disciplina', 'matriculas');
    }
}
