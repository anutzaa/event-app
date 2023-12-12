<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    public $fillable = ['id', 'title', 'description', 'date', 'time', 'location', 'contact_ID'];

    public function speakers()
    {
        return $this->belongsToMany(Speaker::class, 'events_speakers');
    }

    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class, 'events_sponsors');
    }

    public function partners()
    {
        return $this->belongsToMany(Partner::class, 'events_partners');
    }
}
