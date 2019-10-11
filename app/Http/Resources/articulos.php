<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class articulos extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'autor' => $this->autor,
            'contenido' => $this->contenido,
        ];
    }
}
