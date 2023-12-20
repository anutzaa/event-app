<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{
    use HasFactory;

    public $fillable = ['id', 'name', 'email', 'phone'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

}
