<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandListDetailResource extends JsonResource
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
            'id'            => $this->id,
            'logo'          => $this->logo,
            'maskot'        => $this->maskot,
            'name'          => $this->name,
            'tagline'       => $this->tagline,
            'address'       => AddressBrandResource::collection($this->addresses),
            'contact'       => ContactBrandResource::collection($this->contacts),
            'sosmed'        => SosmedBrandResource::collection($this->sosmeds),
            'status'        => $this->status
        ];
    }
}
