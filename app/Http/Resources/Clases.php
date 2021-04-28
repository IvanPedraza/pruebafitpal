<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Clases extends JsonResource
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
            'id'        => $this->id,
            'nombre'    => $this->nombre,
            'fecha'     => $this->fecha,
            'cupos'     => (int) $this->cupos,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
