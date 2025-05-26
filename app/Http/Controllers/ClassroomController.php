<?php

namespace App\Http\Controllers;
use App\Models\Challenge;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        // Lógica para listar todos los Classroom
        $challenges = Challenge::all();
        
        if ($challenges->isEmpty()) {
            $data = [
                'message' => 'No hay retos disponibles',
                'status' => 200
            ];
            return response()->json($data, 404);
        }
        return response()->json($challenges ,200);
    }
    
}
