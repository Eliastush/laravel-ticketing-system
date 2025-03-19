@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4 border-0 rounded-4">
        <h1 class="text-gradient fw-bold mb-3"><i class="fas fa-ticket-alt"></i> Ticket Details</h1>
        
        <p><strong>🎟 Event:</strong> <span class="text-info">{{ $ticket->event->title }}</span></p>
        <p><strong>👤 Buyer Name:</strong> <span class="text-success">{{ $ticket->buyer_name }}</span></p>
        <p><strong>📧 Email:</strong> <span class="text-warning">{{ $ticket->buyer_email }}</span></p>
        <p><strong>🎫 Quantity:</strong> <span class="badge bg-gradient-primary px-3 py-2">{{ $ticket->quantity }}</span></p>

        <h3 class="mt-4">📌 Scan QR Code</h3>
        <div class="text-center p-3 bg-light rounded shadow-sm animate-glow">
            {!! $ticket->generateQrCode() !!}
        </div>

        <div class="mt-4 d-flex gap-3">
            <a href="mailto:{{ $ticket->buyer_email }}?subject=Your Ticket for {{ $ticket->event->title }}&body=Hello {{ $ticket->buyer_name }},%0D%0A%0D%0AYour ticket for {{ $ticket->event->title }} is ready.%0D%0A%0D%0APlease download it from your account.%0D%0A%0D%0AThanks!" class="btn btn-gradient">
                <i class="fas fa-envelope"></i> Send via Email
            </a>

            <a href="{{ route('tickets.download', $ticket->id) }}" class="btn btn-gradient">
                <i class="fas fa-file-pdf"></i> Download Ticket PDF
            </a>
        </div>
    </div>
</div>

<style>
    /* Gradient text for the title */
    .text-gradient {
        background: linear-gradient(45deg, #ff416c, #ff4b2b);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Glowing QR Code effect */
    .animate-glow {
        animation: glow 2s infinite alternate;
        border-radius: 10px;
        padding: 10px;
    }

    @keyframes glow {
        0% { box-shadow: 0 0 5px #ff416c; }
        100% { box-shadow: 0 0 20px #ff4b2b; }
    }

    /* Gradient buttons with hover effect */
    .btn-gradient {
        background: linear-gradient(45deg, #36D1DC, #5B86E5);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        transition: 0.3s;
    }

    .btn-gradient:hover {
        background: linear-gradient(45deg, #5B86E5, #36D1DC);
        transform: scale(1.05);
    }

    /* Stylish badge */
    .bg-gradient-primary {
        background: linear-gradient(45deg, #ff416c, #ff4b2b);
        color: white;
        border-radius: 8px;
    }
</style>
@endsection
