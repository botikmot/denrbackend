<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LogCollection extends JsonResource
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
          'document_id' => $this->document_id,
          'created_at' => $this->created_at,
          'document' => [
            'control_id' => $this->document->control_id,
            'subject' => $this->document->subject,
          ],
          'division' => [
            'name' => $this->division->name ?? '',
            'abbr' => $this->division->abbr ?? ''
          ]
        ];
    }
}
