<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\articulos;
use Carbon\Carbon;

class ArticulosController extends Controller
{
    //
    public function mostrar(){
    	$articulo = articulos::all();
    	return $articulo;
    }
    
    public function registrar(Request $request)
    {
    	$Rarticulo = new articulos();
    	$Rarticulo->nombre = $request->nombre;
        $Rarticulo->autor = $request->autor;
        $Rarticulo->contenido = $request->contenido;
        $Rarticulo->save();

        return  response()->json([
            'status' => 'ok',
            'data' => 'Insercion correcta'
        ], 200);
    }

    public function modificar(Request $request, $id)
    {
        $MArticulo = articulos::find($id);
        $MArticulo->nombre = $request->nombre;
        $MArticulo->autor = $request->autor;
        $MArticulo->contenido = $request->contenido;
        $MArticulo->save();

        return  response()->json([
            'status' => 'ok',
            'data' => 'Modificacion correcta'
        ], 200);
    }

    public function eliminar($id)
    {
        $EArticulo = articulos::find($id);
        $EArticulo->delete();

        return  response()->json([
            'status' => 'ok',
            'data' => 'Eliminacion correcta'
        ], 200);
    }
}
