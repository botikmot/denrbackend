<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    protected $fillable = ['level_id','services_id','name','abbr'];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function actions()
    {
        return $this->hasMany(Action::class, 'action_office');
    }
}
