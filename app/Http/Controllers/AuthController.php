<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{
    public function register(Request $req)
    {
        //Validar los datos de entrada
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:4',
        ];
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        //Crear usuario en la base de datos
        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'email_verified_at' => now(),
            'password' => Hash::make($req->password),
            'rol_idROLES' => 0
        ]);
       $token = $user->createToken('Personal Acces Token')->plainTextToken;
        $response = [ 'user' => $user, 'token' => $token];
        return response()->json($response, 200);
    }

    public Function login (Request $req)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];
        $req -> validate($rules);

        // Buscar el usuario
        $user = User::where('email', $req->email)->first();

        // Verificar si el usuario existe y la contraseña es correcta
        if ($user && Hash::check($req->password, $user->password)){
            $token = $user->createToken('Personal Access Token')->plainTextToken;
            $response=['user'=>$user,'token'=>$token];
            return response()->json($response, 200);
        }
        $response = ['message' => 'Credenciales incorrectas, intentelo de nuevo'];
        return response()->json($response, 400);
    }

    public function logout(Request $req)
    {
        $user = $req->user();
        $user->tokens()->delete();
        return response()->json(['message' => 'Sesión cerrada correctamente'], 200);
    }

}
