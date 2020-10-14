<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'document_id',
        'office_id',
        'action_office',
        'is_received',
        'status',
        'remarks',
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'action_office');
    }

    public function office()
    {
        return $this->belongsTo(Division::class, 'office_id');
    }
}
