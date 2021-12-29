<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VaccinatorRS extends JsonResource
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
            'number_vaccinate' => $this->number_vaccinate,
            'populations' => $this->populations,
            'number_people_vaccinated' => $this->number_people_vaccinated,
            'number_injection_full' => $this->number_injection_full,
            'date' => $this->date,
        ];
    }
}
