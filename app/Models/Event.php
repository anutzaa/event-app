<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    public $fillable = ['id', 'title', 'description', 'date', 'time', 'location', 'price', 'contact_ID'];

    public function speakers()
    {
        return $this->belongsToMany(Speaker::class);
    }

    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class);
    }

    public function partners()
    {
        return $this->belongsToMany(Partner::class);
    }
}
