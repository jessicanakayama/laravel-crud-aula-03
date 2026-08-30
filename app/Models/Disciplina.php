<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

use OwenIt\Auditing\Contracts\Auditable;	// Linha Adicionada
use OwenIt\Auditing\Auditable as AuditableTrait; // Linha Adicionada

class Disciplina extends Model implements Auditable { // Linha Alterada
  
    use AuditableTrait;		// Linha Adicionada
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'carga_horaria',
        'curso_id',
    ];

    public function curso() {
        return $this->belongsTo('\App\Models\Curso');
    }

    public function aluno() {
        return $this->belongsToMany('\App\Models\Aluno', 'matriculas');
    }
}
