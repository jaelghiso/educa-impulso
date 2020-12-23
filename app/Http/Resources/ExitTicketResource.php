<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExitTicketResource extends JsonResource
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
            'urlExitTicket' => $this->urlExitTicket,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->update_at,
        ];
    }
}
