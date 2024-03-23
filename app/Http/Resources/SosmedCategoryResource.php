<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SosmedCategoryResource extends JsonResource
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
            'id'                => $this->id,
            'icon'              =>  asset('storage/uploads/sosmed/' . $this->icon),
            'name'              => $this->name
        ];
    }
}
