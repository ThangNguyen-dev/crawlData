<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NumberInjectionDateRS extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'province' => $this->province,
            'number_infections' => $this->number_infections,
            'number_dead' => $this->number_dead,
            'level' => $this->level,
            'date' => $this->date,
        ];
    }
}
