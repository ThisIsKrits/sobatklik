<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
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
            'codes'         => $this->codes,
            'type_id'       => $this->type->name,
            'report_date'   => $this->report_date,
            'brand'         => new BrandListDetailResource($this->brand),
            'file'          => AttachResource::collection($this->files),
            'admin_id'      => $this->user->fullname,
            'complaint'     => $this->complaint,
            'status'        => $this->status,
            'review_status' => $this->review_status,
        ];
    }
}
