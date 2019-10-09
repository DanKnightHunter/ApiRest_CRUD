<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\articulos;
use Carbon\Carbon;

class ArticulosController extends Controller
{
    //
    public function index(){
    	$articulo = articulos::all();
    	return $articulo;
    }
    
    public function registrar(Request $request)
    {
        $mytime = Carbon::now()->toDateTimeString();//Fecha sistema

    	$Rarticulo = new articulos();
    	$Rarticulo->nombre = $request->nombre;
        $Rarticulo->autor = $request->autor;
        $Rarticulo->contenido = $request->contenido;
        $Rarticulo->save();

        return  response()->json([
            'status' => 'ok',
            'data' => 'Inserción correcta'
        ], 200);
    }

    public function modificar(Request $request, $id)
    {
        $MArticulos = articulo::find($id);
        $MArticulos->nombre = $request->nombre;
        $MArticulos->autor = $request->autor;
        $MArticulos->contenido = $request->contenido;
        $MArticulos->save();

        return  response()->json([
            'status' => 'ok',
            'data' => 'Modificación correcta'
        ], 200);

    }
}
