<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watch extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','action_id'];

    public function action()
    {
        return $this->belongsTo(Action::class, 'action_id');
    }
}
