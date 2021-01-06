<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClassroomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Summary $summary
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'course_id' => $this->course_id,
            'summary_id' => $this->summary_id,
            'wwbat_areas_id' => $this->wwbat_areas_id,
            'big_words_areas_id' => $this->big_words_areas_id,
            'schedule_areas_id' => $this->schedule_areas_id,
            'do_now_areas_id' => $this->do_now_areas_id,
            'guided_practice_areas_id' => $this->guided_practice_areas_id,
            'individual_practice_areas_id' => $this->individual_practice_areas_id,
            'exit_ticket_areas_id' => $this->exit_ticket_areas_id,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->update_at,
        ];
    }
}
