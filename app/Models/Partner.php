<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    public $fillable = ['id', 'name', 'email', 'phone', 'address'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

}
