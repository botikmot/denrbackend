<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['level_id','services_id','name'];

    public function office()
    {
        return $this->hasMany(Office::class);
    }

}
