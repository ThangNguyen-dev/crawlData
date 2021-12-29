<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VnexpressRS extends JsonResource
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
            'data' => [
                'number_infection' => $this->number_infections,
                'number_dead' => $this->number_dead,
                'new_case' => $this->new_case,
                'new_dead' => $this->new_dead,
                'date' => $this->date,
            ],
        ];
    }
}
