<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'buyer_name', 'buyer_email', 'quantity'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function generateQrCode()
    {
        $ticketData = url('/tickets/' . $this->id);
        return QrCode::size(150)->generate($ticketData);
    }
}
