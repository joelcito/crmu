<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function register(Request $request){

        // FUNCION PARA CREAR USUARIO MEDIANTE APIS
        $validator = Validator::make($request->all(), [
            'name'       => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users',
            'password'   => 'required|string|min:8'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'password'  => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'access_token' => $token,
            'token_typo' => 'Beare'
        ]);

    }

    public function login(Request $request){

        // FUNCION INICIAR SESSION DE UN USUARIO
        if(!Auth::attempt($request->only('email', 'password'))){
            return response()->json([
                'status'        => 'error',
                'message' => 'Error de User y/o Contraseña'
            ]);
        }

        $user = User::where('email',$request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        User::whereId($user->id)->update([
            'token_access' => $token
        ]);

        return response()->json([
            'status'        => 'success',
            'message'       => 'Hola '.$user->name,
            'accessToken'   => $token,
            'token_type'    => 'Beare',
            'user'          => $user
        ]);

    }

    public function logout(Request $request){

        // ELIMINAMOS TODOS LOS TOKEN CREADOS PARA ACCEDER AL SISTEMA
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Gracias por utilizar el sistema de CRM'
        ];
    }
}
