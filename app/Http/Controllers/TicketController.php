<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Event;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('event')->get();
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        $events = Event::where('available_tickets', '>', 0)->get();
        return view('tickets.create', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'buyer_name' => 'required',
            'buyer_email' => 'required|email',
            'quantity' => 'required|integer|min:1',
        ]);

        $event = Event::findOrFail($request->event_id);

        if ($request->quantity > $event->available_tickets) {
            return redirect()->back()->with('error', 'Not enough tickets available.');
        }

        // Deduct tickets from event
        $event->update([
            'available_tickets' => $event->available_tickets - $request->quantity
        ]);

        // Save ticket purchase
        Ticket::create($request->all());

        return redirect()->route('tickets.index')->with('success', 'Ticket booked successfully.');
    }

    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }


public function downloadTicket(Ticket $ticket)
{
    $pdf = Pdf::loadView('tickets.pdf', compact('ticket'));
    return $pdf->download('ticket_' . $ticket->id . '.pdf');
}

}
