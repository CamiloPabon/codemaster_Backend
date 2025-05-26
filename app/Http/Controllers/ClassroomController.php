<?php

namespace App\Http\Controllers;
use App\Models\classroom;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        // Lógica para listar todos los Classroom
        $classroom = classroom::all();
        
        if ($classroom->isEmpty()) {
            $data = [
                'message' => 'No hay cursos disponibles',
                'status' => 200
            ];
            return response()->json($data, 200);
        }
        return response()->json($classroom, 200);
    }
    
}
