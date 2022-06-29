<?php

namespace Domain\Products\Resources;

use App\Http\Resources\MediaResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CategoryResource extends JsonResource
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
            'id' => (string) $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'imageUrl' => $this->getFirstMedia('images')->getUrl(),
            'backgroundColor' => $this->background_color,
            'backgroundImageUrl' => $this->getFirstMedia('bg')->getUrl(),
            'tagQuantity' => $this->tag_quantity,
            'storageSpaceQuantity' => $this->storage_space_quantity,
            'storageSpaceUnit' => $this->storage_space_unit
        ];
    }
}
