<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    
    public function watchprofile(Request $req)
    {
        $user = $req->user();
        if (!$user) {
            return response()->json(['error' => 'No autenticado'], 401);
        }
        return response()->json([
            'id' => $user->id, // Se incluye el ID del usuario autenticado
            'name' => $user->name,
            'email' => $user->email,
            'rol_idROLES' => $user->rol_idROLES
        ], 200);
    }
    public function updateProfile(Request $req)
    {
        $user = $req->user();
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:4'
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $user->name = $req->name;
        $user->email = $req->email;
        if ($req->filled('password')) {
            $user->password = Hash::make($req->password);
        }
        $user->save();
        return response()->json(['message' => 'Perfil actualizado correctamente'], 200);
    }
}
