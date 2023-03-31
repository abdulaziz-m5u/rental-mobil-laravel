<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
