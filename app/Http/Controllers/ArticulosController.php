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
        //dd('entro');
    	$Rarticulo = new articulos();
    	$Rarticulo->nombre = $request->nombre;
        $Rarticulo->autor = $request->autor;
        $Rarticulo->contenido = $request->contenido;
        $Rarticulo->save();

        $jsonArticulos = articulosResource::collection(articulos::all());

        return  response()->json([
            'status' => true,
            'data' => $jsonArticulos
        ], 200);
    }

    public function modificar(Request $request, $id)
    {

        $articulo = articulos::find($id);
        
        if(!$articulo){
            return  response()->json([
                'status' => false,
                'data' => 'No se encontro id'
            ], 404);
        }
 
        $articulo->nombre = $request->nombre;
        $articulo->autor = $request->autor;
        $articulo->contenido = $request->contenido;
        $articulo->save();

        $resultado = new articulosResource($articulo);

        return  response()->json([
            'status' => true,
            'data' => $resultado    
        ], 200);
        
    }

    public function eliminar($id)
    {
        dd($id);

        $EArticulo = articulos::find($id);

        if(!$EArticulo)
        {
            return response()->json([
                'status' => false,
                'data' => 'No se encontro id'
                ], 404);
        }
        $EArticulo->delete();

        $resultado = new articulosResource($EArticulo);

        return  response()->json([
            'status' => true,
            'data' => $resultado
        ], 200);
    }
}
