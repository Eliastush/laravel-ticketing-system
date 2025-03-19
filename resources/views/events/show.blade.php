@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded">
        <div class="card-body">
            <h2 class="fw-bold text-primary">{{ $event->title }}</h2>
            <p class="text-muted">{{ $event->description }}</p>

            <div class="mb-3">
                <span class="badge bg-secondary"><i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</span>
                <span class="badge bg-success ms-2"><i class="fas fa-money-bill-wave"></i> KES {{ number_format($event->price, 2) }}</span>
            </div>

            <p class="fw-bold">
                <i class="fas fa-ticket-alt"></i> Tickets Left: 
                <span class="{{ $event->available_tickets > 0 ? 'text-success' : 'text-danger' }}">
                    {{ $event->available_tickets }}
                </span>
            </p>

            @if ($event->available_tickets > 0)
                <form method="get" action="{{ url('tickets/create')}}">
                    @csrf
                    <button type="submit" class="btn btn-success btn-lg mt-2">
                        <i class="fas fa-shopping-cart"></i> Buy Ticket
                    </button>
                </form>
            @else
                <div class="alert alert-danger mt-3">
                    <i class="fas fa-exclamation-circle"></i> Tickets Sold Out
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
