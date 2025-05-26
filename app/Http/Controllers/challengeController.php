<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Challenge;
use Illuminate\Support\Facades\Validator;

class ChallengeController extends Controller
{
    public function index()
    {
        $challenges = Challenge::all();
        
        if ($challenges->isEmpty()) {
            $data = [
                'message' => 'No hay retos disponibles',
                'status' => 200
            ];
            return response()->json($data, 404);
        }
        return response()->json($challenges ,200);
    }//cierra la funcion index


#funcion para almacenar retos
    public function store(Request $request)
    {
        $validator = Validator ::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'difficulty' => 'required|integer',
            'lenguage' => 'required|string|max:50'
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de los datos',
                'status' => 400,
                'errors' => $validator->errors()
            ];
            return response()->json($data, 400);
        }
        $challenge = Challenge::create([
            'name' => $request->name,
            'description' => $request->description,
            'difficulty' => $request->difficulty,
            'lenguage' => $request->lenguage,

        ]);

        if ($challenge) {
            $data = [
                'message' => 'Retos creado correctamente',
                'status' => 201,
                'data' => $challenge
            ];
            return response()->json($data, 201);
        } else {
            $data = [
                'message' => 'Error al crear el reto',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
    }//cierra la funcion store

#funcion para mostrar un reto por id
    public function show($id)
    {
        $challenge = Challenge::find($id);
        if (!$challenge) {
            $data = [
                'message' => 'No se encontro el reto',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        return response()->json($challenge, 200);
    }//cierra la funcion show   

    public function destroy($id)
    {
        $challenge = Challenge::find($id);
        if (!$challenge) {
            $data = [
                'message' => 'No se encontro el reto',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $challenge->delete();
        $data = [
            'message' => 'Reto eliminado correctamente',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $challenge = Challenge::find($id);
        if (!$challenge) {
            $data = [
                'message' => 'No se encontro el reto',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'difficulty' => 'required|integer',
            'lenguage' => 'required|string|max:20'
        ]);
        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de los datos',
                'status' => 400,
                'errors' => $validator->errors()
            ];
            return response()->json($data, 400);
        }
        $challenge->update([
            'name' => $request->name,
            'description' => $request->description,
            'difficulty' => $request->difficulty,
            'lenguage' => $request->lenguage,
        ]);
        $data = [
            'message' => 'Reto actualizado correctamente',
            'status' => 200,
            'data' => $challenge
        ];
        return response()->json($data, 200);
    }
    
    public function classroom()
    {
        return $this->hasMany(Classroom::class, 'challenge_id');
    }

    public function statistics()
    {
        return $this->hasMany(Statistic::class, 'challenge_id');
    }
}
