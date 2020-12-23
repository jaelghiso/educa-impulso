<?php

namespace App\Http\Resources;

use App\Models\Classroom;
use Illuminate\Http\Resources\Json\JsonResource;

class WWbatAreaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'class_id' => $this->class_id,
            'description' => $this->description,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->update_at,
        ];
    }
}
