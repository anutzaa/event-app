<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'date', 'time', 'location', 'contact_id', 'speaker_id', 'sponsor_id', 'partner_id'];

    public function contact()
    {
    return $this->belongsTo(Contact::class);
    }

    public function speaker()
    {
    return $this->belongsTo(Speaker::class);
    }

    public function sponsor()
    {
    return $this->belongsTo(Sponsor::class);
    }

    public function partner()
    {
    return $this->belongsTo(Partner::class);
    }
}
