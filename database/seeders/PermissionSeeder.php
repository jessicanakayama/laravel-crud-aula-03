<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // PROFESSOR - DISCIPLINA
            ["role_id" => 1, "resource_id" => 6],
            ["role_id" => 1, "resource_id" => 7],
            ["role_id" => 1, "resource_id" => 8],
            ["role_id" => 1, "resource_id" => 9],
            // PROFESSOR - ALUNO
            ["role_id" => 1, "resource_id" => 11],
            ["role_id" => 1, "resource_id" => 12],
            ["role_id" => 1, "resource_id" => 13],
            ["role_id" => 1, "resource_id" => 14],
            // PROFESSOR - MATRICULA
            ["role_id" => 1, "resource_id" => 16],
            ["role_id" => 1, "resource_id" => 17],
            //  COORDENADOR - CURSO
            ["role_id" => 2, "resource_id" => 1],
            ["role_id" => 2, "resource_id" => 2],
            ["role_id" => 2, "resource_id" => 3],
            ["role_id" => 2, "resource_id" => 4],
            ["role_id" => 2, "resource_id" => 5],
            // COORDENADOR - DISCIPLINA
            ["role_id" => 2, "resource_id" => 6],
            ["role_id" => 2, "resource_id" => 7],
            ["role_id" => 2, "resource_id" => 8],
            ["role_id" => 2, "resource_id" => 9],
            ["role_id" => 2, "resource_id" => 10],
            // COORDENADOR - ALUNO
            ["role_id" => 2, "resource_id" => 11],
            ["role_id" => 2, "resource_id" => 13],
            // COORDENADOR - MATRICULA
            ["role_id" => 2, "resource_id" => 16],
            ["role_id" => 2, "resource_id" => 17],
            ["role_id" => 2, "resource_id" => 20],
        ];
        DB::table('permissions')->insert($data);
    }
}
