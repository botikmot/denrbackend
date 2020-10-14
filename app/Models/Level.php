<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    
    protected $fillable = ['name'];

    public function office()
    {
        return $this->hasMany(Office::class);
    }

    public function services()
    {
        return $this->hasMany(Services::class);
    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }
}
