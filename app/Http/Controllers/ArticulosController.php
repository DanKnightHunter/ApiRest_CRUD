<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\articulos;

class ArticulosController extends Controller
{
    //
    public function index(){
    	$articulo = articulos::all();
    	return $articulo;
    }
    
    public function registrar()
    {
    	
    }
}
