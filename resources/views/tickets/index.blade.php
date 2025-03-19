@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="fw-bold text-primary mb-3"><i class="fas fa-ticket-alt"></i> My Tickets</h1>

    <a href="{{ route('tickets.create') }}" class="btn btn-success mb-4">
        <i class="fas fa-plus-circle"></i> Book Ticket
    </a>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($tickets->isEmpty())
        <div class="alert alert-info text-center">
            <i class="fas fa-info-circle"></i> You have no tickets booked yet.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Event</th>
                        <th>Buyer Name</th>
                        <th>Email</th>
                        <th>Quantity</th>
                        <th>Action</th>  <!-- New Column for View Ticket -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->event->title }}</td>
                            <td>{{ $ticket->buyer_name }}</td>
                            <td>{{ $ticket->buyer_email }}</td>
                            <td><span class="badge bg-primary">{{ $ticket->quantity }}</span></td>
                            <td>
                                <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> View Ticket
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
