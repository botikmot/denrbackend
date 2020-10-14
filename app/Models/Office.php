<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $fillable = [
        'level_id',
        'services_id',
        'category_id',
        'name',
        'abbr'
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'office_id');
    }

}
