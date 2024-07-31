<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $updated_at
 * @property mixed $created_at
 * @property integer $id
 * @property integer $user_id
 * @property mixed $type
 * @property mixed $make
 * @property mixed $model
 * @property mixed $year
 * @property mixed $mileage
 * @property mixed $color
 * @property mixed $price
 * @property mixed $description
 * @property mixed $photos
 */
class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'type' => $this->type,
            'make' => $this->make,
            'model' => $this->model,
            'year' => $this->year,
            'mileage' => $this->mileage,
            'color' => $this->color,
            'price' => $this->price,
            'description' => $this->description,
            'photos' => $this->photos,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
