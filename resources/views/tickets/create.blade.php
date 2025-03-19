@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-body">
            <h2 class="fw-bold text-primary text-center mb-4">
                <i class="fas fa-ticket-alt"></i> Book a Ticket
            </h2>

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('tickets.store') }}" method="POST" class="p-3">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">Select Event</label>
                    <select name="event_id" class="form-select shadow-sm" required>
                        <option selected disabled>Choose an event...</option>
                        @foreach ($events as $event)
                            <option value="{{ $event->id }}">
                                {{ $event->title }} - KES {{ $event->price }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Your Name</label>
                    <input type="text" name="buyer_name" class="form-control shadow-sm" placeholder="Enter your full name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Email</label>
                    <input type="email" name="buyer_email" class="form-control shadow-sm" placeholder="Enter your email" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Quantity</label>
                    <input type="number" name="quantity" class="form-control shadow-sm" min="1" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                        <i class="fas fa-ticket-alt"></i> Book Ticket
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
