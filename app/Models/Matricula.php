<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use OwenIt\Auditing\Contracts\Auditable;	// Linha Adicionada
use OwenIt\Auditing\Auditable as AuditableTrait; // Linha Adicionada

class Matricula extends Model implements Auditable { // Linha Alterada
  
    use AuditableTrait;		// Linha Adicionada
    protected $fillable = [
        'disciplina_id',
        'aluno_id',
    ];

    public function disciplina() {
        return $this->belongsTo('\App\Models\Disciplina');
    }

    public function aluno() {
        return $this->belongsTo('\App\Models\Aluno');
    }
}
