<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            'event_date' => (string) $this->event_date,
            'event_time' => (string) $this->event_time,
            'title' => $this->title,
            'description' => $this->description,
            'priority' => $this->priority,
            'tags' => $this->tags,
            'topics' => $this->topics,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->update_at,
        ];
    }
}
