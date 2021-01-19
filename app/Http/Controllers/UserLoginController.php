<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserPost;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{
    // POST Registrar usuario de api

    // private function cargarArchivo ($file){
    //     $nombreArchivo  = time()."." . $file->getClientOriginalExtension(); //8012021926.jpg
    //     $file->move(public_path('img/faces'),$nombreArchivo); //Mueve la imagen a public/img/faces
    //     return $nombreArchivo;
    // }
    
    // public function store(StoreUserPost $request)
    
    // {
    //     // ============API  REST  =============\\
    //         // $user = User::create($request->all());
    //         // return $user;
    //         $input = $request->all();
    //         if($request->has('avatar'))
    //         $input['avatar']= $this->cargarArchivo($request->avatar); //Extraer la foto
    //         $input['password'] =Hash::make($request->password);
    //         User::create($input);
    //         return response()->json([
    //             'res'=> true,
    //             'message'=> 'Registro creado correctamente'
    //         ],200);
    // }

    // Loguear usuario de api
    public function login (Request $request)
    {
        $user = User::wherecc($request->cc)->first();
        if ( !is_null($user) && Hash::check($request->password, $user->password))
        {
            // $user->api_token= Str::random(100);
            // $user->save();
            $token = $user->createToken('sopiecA')->accessToken;

            return response()->json([
                'res'=> true,
                'token'=>$token,
                'message' => 'Bienvenido a la Api de SOPIEC'
            ],200);
        }
        else{
            return response()->json([
                'res'=> false,
                'message' => 'ID o contraseña incorrecta'
            ],200);
        }
    }

    public function logout(){
        
        $user = auth()->user();
        $user->tokens->each(function($token, $key){
            $token->delete();
        });
        $user->save();

        return response()->json([
            'res'=> true,
            'message' => 'Sesion finalizada'
        ],200);
    }
}
