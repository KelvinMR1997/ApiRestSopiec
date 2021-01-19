<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserPost;
use App\Http\Requests\UpdateUserPut;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;


class UsersAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   
    //  GET Obtener listado de todos los usuarios
    public function index(Request $request)
  
    {
        // ============API  REST  =============\\
        // Condicional de busqueda de usuarios por nombre o cedula
        function createResponseJson($status,$keyName,$data){
            return response()->json(['status' => $status, $keyName => $data, 'Users length' => count($data)]);
        }

        // Condicional de busqueda
        if ($request->has('txtBuscar')){
            $users = User::where('firstName','like','%'.$request->txtBuscar.'%')->orWhere ('cc','like','%'.$request->txtBuscar.'%')->get();

        }else{
            $users = User::all();
        }
        return createResponseJson("Success!","Users",$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

  
    private function cargarArchivo ($file){
        $nombreArchivo  = time()."." . $file->getClientOriginalExtension(); //8012021926.jpg
        $file->move(public_path('img/faces'),$nombreArchivo); //Mueve la imagen a public/img/faces
        return $nombreArchivo;
    }
    
    public function store(StoreUserPost $request)
    
    {
        // ============API  REST  =============\\
            // $user = User::create($request->all());
            // return $user;
            $input = $request->all();
            if($request->has('avatar'))
            $input['avatar']= $this->cargarArchivo($request->avatar); //Extraer la foto
            $input['password'] =Hash::make($request->password);
            User::create($input);

            return response()->json([
                'res'=> true,
                'message'=> 'Registro creado correctamente'
            ],200);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  GET Mostrar detalles de un usuario
    public function show(User $user)
    {
           // ============API  REST  =============\\
           return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  PUT Actualizar
    public function update(UpdateUserPut $request, User $user)
    {
        // ============API  REST  =============\\
        $input= $request->all();
        if($request->has('avatar'))
            $input['avatar']= $this->cargarArchivo($request->avatar);
        $user->update($input);

        return response()->json([
            'res' => true,
            'message'=> 'Registro actualizado correctamente'
         ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  DELETE
    public function destroy($id)
    {
        // ================API REST =================\\
        User::destroy($id);

        return response()->json([
            'res' => true,
            'message'=> 'Registro eliminado correctamente'
         ],200);
    }

 
}
