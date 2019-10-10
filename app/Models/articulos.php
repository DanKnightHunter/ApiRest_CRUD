<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class articulos extends Model
{
    //
	use SoftDeletes;
    
    protected $table = 'articulos';
}
