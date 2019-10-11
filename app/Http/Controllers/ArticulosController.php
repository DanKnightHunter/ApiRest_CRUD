<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\articulos;
use Carbon\Carbon;

//use App\articulos;
use App\Http\Resources\articulos as articulosResource;

class ArticulosController extends Controller
{
    //
    public function mostrar(){
    	$articulo = articulos::all();
    	return articulosResource::collection($articulo);
    }
    
    public function registrar(Request $request)
    {
    	$Rarticulo = new articulos();
    	$Rarticulo->nombre = $request->nombre;
        $Rarticulo->autor = $request->autor;
        $Rarticulo->contenido = $request->contenido;
        $Rarticulo->save();

        $jsonArticulos = articulosResource::collection(articulos::all());

        return  response()->json([
            'status' => '1',
            'data' => $jsonArticulos
        ], 200);
    }

    public function modificar(Request $request, $id)
    {

        if(articulos::where('id', $id)->exists()){
            $MArticulo = articulos::find($id);
            $MArticulo->nombre = $request->nombre;
            $MArticulo->autor = $request->autor;
            $MArticulo->contenido = $request->contenido;
            $MArticulo->save();

            $jsonArticulos = articulosResource::collection(articulos::all());

            return  response()->json([
                'status' => '1',
                'data' => $jsonArticulos    
            ], 200);

        }else{
            return  response()->json([
                'status' => '0',
                'data' => 'No se encontro id'
            ], 200);
        }
        
    }

    public function eliminar($id)
    {
        if(articulos::where('id', $id)->exists())
        {
            $EArticulo = articulos::find($id);
            $EArticulo->delete();

            $jsonArticulos = articulosResource::collection(articulos::all());

            return  response()->json([
            'status' => '1',
            'data' => $jsonArticulos
            ], 200);
        }else{
            return  response()->json([
                'status' => '0',
                'data' => 'No se encontro id'
            ], 200);
        }
    }
}
