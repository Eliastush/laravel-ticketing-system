<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'event_date', 'price', 'available_tickets'];

    // Define the relationship with tickets
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
