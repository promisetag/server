<?php

namespace Domain\Products\Resources;

use App\Http\Resources\MediaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'basePrice' => $this->base_price,
            // todo: fix the below two lines
            'discountedPrice' => 0.2 * $this->base_price, 
            'quantity' => 12,
            'quantityThreshold' => $this->quantity_threshold,
            'variations' => $this->variations,
            'images' => MediaResource::collection($this->getMedia('images')),
            // todo: fix the below two line
            'reviewsCount' => 40,
            'reviewsAvgRating' => 3.8
        ];
    }
}
