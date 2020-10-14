<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TrackCollection extends JsonResource
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
            'is_received' => $this->is_received ?? '',
            'status' => $this->status ?? '',
            'remarks' => $this->remarks ?? '',
            'created_at' => $this->created_at,
            'document' => [
                'id' => $this->document->id,
                'control_id' => $this->document->control_id,
                'subject' => $this->document->subject,
                'type' => $this->document->type ?? '',
                'classification' => $this->document->classification ?? '',
                'sender' => $this->document->sender
            ],
            'division' => [
                'abbr' => $this->division->abbr
            ],
            'office' => [
                'abbr' => $this->office->abbr
            ]
        ];
    }
}
