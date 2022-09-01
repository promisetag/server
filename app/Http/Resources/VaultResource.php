<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VaultResource extends JsonResource
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
            "id" => (string) $this->id,
            "status" => $this->status,
            "storageAllotted" => $this->storage_space_allotted,
            "storageUsed" => $this->storage_space_used,
            "qrCodeUrl" => $this->getFirstMedia("qr code")->getUrl(),
        ];
    }
}
