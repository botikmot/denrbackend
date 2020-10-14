<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;
    protected $fillable = [
        'document_id',
        'user_id',
        'office_id',
        'action_office',
        'action_desired',
        'arrival',
        'is_division',
        'is_received',
        'action_mode',
        'status',
        'remarks',
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'office_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function actoffice()
    {
        return $this->belongsTo(Division::class, 'action_office');
    }
}
