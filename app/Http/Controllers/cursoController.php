<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Curso;

class cursoController extends Controller
{
    public function getCursos()
    {
        $cursos = Curso::all();
        return response()->json($cursos);
    }
}
