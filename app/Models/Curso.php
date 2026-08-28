<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;	// Linha Adicionada
use OwenIt\Auditing\Auditable as AuditableTrait; // Linha Adicionada

class Curso extends Model implements Auditable { // Linha Alterada
  
    use AuditableTrait;		// Linha Adicionada
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'duracao',
    ];

    public function disciplina() {
        return $this->hasMany('\App\Models\Disciplina');
    }

    public function aluno() {
        return $this->hasMany('\App\Models\Aluno');
    }
}