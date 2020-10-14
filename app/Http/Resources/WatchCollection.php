<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WatchCollection extends JsonResource
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
            'action' => [
                'id' =>  $this->action->id,
                'is_received' => $this->action->is_received,
                'status' => $this->action->status,
                'remarks' => $this->action->remarks,
                'document' => [
                    'id' => $this->action->document->id,
                    'control_id' => $this->action->document->control_id,
                    'subject' => $this->action->document->subject
                ],
                'actoffice' => [
                    'id' =>  $this->action->actoffice->id ?? '',
                    'name' => $this->action->actoffice->name ?? '',
                    'abbr' => $this->action->actoffice->abbr ?? ''
                ]
            ]
        ];
    }
}
