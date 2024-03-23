<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandListResource extends JsonResource
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
            'logo'          => asset('storage/uploads/logo/' . $this->logo),
            'maskot'        => asset('storage/uploads/maskot/' . $this->maskot),
            'name'          => $this->name,
            'tagline'       => $this->tagline,
            'address'       => AddressBrandResource::collection($this->addresses),
            'isActive'      => $this->status_text
        ];
    }
}
