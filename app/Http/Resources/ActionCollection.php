<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
//use Illuminate\Http\Resources\Json\ResourceCollection;

class ActionCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'action_desired' => $this->action_desired,
            'document_id' => $this->document_id,
            'action_mode' => $this->action_mode,
            'is_received' => $this->is_received,
            'status' => $this->status,
            'remarks' => $this->remarks,
            'updated_at' => $this->updated_at,
            'document' => [
                'id' => $this->document->id,
                'control_id' => $this->document->control_id,
                'subject' => $this->document->subject,
                'type' => $this->document->type,
                'classification' => $this->document->classification,
                'sender' => $this->document->sender
            ],
            'division' => [
                'name' => $this->division->name ?? '',
                'abbr' => $this->division->abbr ?? ''
            ],
            'user' => [
                'name' => $this->user->name ?? '',
                'profile_photo_url' => $this->user->profile_photo_url ?? ''
            ]
        ];
    }
}
