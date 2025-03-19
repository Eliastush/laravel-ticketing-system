@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<style>
    .table {
        border-radius: 8px;
        overflow: hidden;
    }
    .table thead {
        background-color: #343a40;
        color: white;
    }
    .table tbody tr:hover {
        background-color: #f8f9fa;
    }
    .btn-sm {
        padding: 5px 10px;
        font-size: 0.9rem;
    }
    .badge {
        font-size: 0.9rem;
    }
</style>

<div class="container">
    <h1 class="mb-4 text-center fw-bold">🎭 Upcoming Events</h1>
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('events.create') }}" class="btn btn-primary">➕ Create Event</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover shadow-sm rounded">
            <thead class="bg-dark text-light">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Price</th>
                    <th>Available Tickets</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td class="fw-bold">{{ $event->title }}</td>
                        <td>{{ Str::limit($event->description, 50) }}</td>
                        <td>{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</td>
                        <td><span class="badge bg-success">KES {{ number_format($event->price, 2) }}</span></td>
                        <td>{{ $event->available_tickets }}</td>
                        <td class="text-center">
                            <a href="{{ route('events.show', $event->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> View</a>
                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
