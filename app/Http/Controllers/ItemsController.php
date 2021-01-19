<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Requests\StoreItemPost;
use App\Http\Requests\UpdateItemPut;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         // ============API  REST  =============\\
        // Condicional de busqueda de usuarios por nombre o cedula
        function createResponseJson($status,$keyName,$data){
            return response()->json(['status' => $status, $keyName => $data, 'Items length' => count($data)]);
        }
        // Condicional de busqueda
        if ($request->has('txtBuscar')){
            $items = Item::where('serial','like','%'.$request->txtBuscar.'%')->orWhere ('nombre','like','%'.$request->txtBuscar.'%')->orWhere ('marca','like','%'.$request->txtBuscar.'%')->get();

        }else{
            $items = Item::all();
        }
        return createResponseJson("Success!","Items",$items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemPost $request)
    {
        $input = $request->all();
        // dd($input);

        Item::create($input);

        return response()->json([
            'res'=> true,
            'message'=> 'Item creado correctamente'
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return $item;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemPut $request, Item $item)
    {
          // ============API  REST  =============\\
          $input= $request->all();
          $item->update($input);
  
          return response()->json([
              'res' => true,
              'message'=> 'Item actualizado correctamente'
           ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
             // ================API REST =================\\
             Item::destroy($id);

             return response()->json([
                 'res' => true,
                 'message'=> 'Item eliminado correctamente'
              ],200);
    }
}
