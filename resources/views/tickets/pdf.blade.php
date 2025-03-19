<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🎟️ Ticket - {{ $ticket->event->title }}</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            text-align: center; 
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2); 
            padding: 20px; 
        }
        .ticket-container { 
            background: #fff; 
            border: 3px dashed #007bff; 
            padding: 20px; 
            width: 60%; 
            margin: auto; 
            border-radius: 10px; 
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .ticket-header { 
            font-size: 24px; 
            font-weight: bold; 
            color: #007bff; 
            margin-bottom: 10px; 
        }
        .ticket-info { 
            font-size: 18px; 
            margin: 10px 0; 
        }
        .qr-code {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            padding: 10px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 255, 0.3);
            animation: glow 2s infinite alternate;
        }
        @keyframes glow {
            0% { box-shadow: 0 0 5px rgba(0, 0, 255, 0.3); }
            100% { box-shadow: 0 0 20px rgba(0, 0, 255, 0.7); }
        }
    </style>
</head>
<body>
    <div class="ticket-container">
        <h2 class="ticket-header">🎟️ Event Ticket</h2>
        <p class="ticket-info"><strong>Event:</strong> {{ $ticket->event->title }}</p>
        <p class="ticket-info"><strong>Buyer Name:</strong> {{ $ticket->buyer_name }}</p>
        <p class="ticket-info"><strong>Email:</strong> {{ $ticket->buyer_email }}</p>
        <p class="ticket-info"><strong>Quantity:</strong> <span style="background:#007bff;color:white;padding:5px 10px;border-radius:5px;">{{ $ticket->quantity }}</span></p>

        <h3>📌 Scan QR Code</h3>
        <div class="qr-code">
            {!! QrCode::size(180)->gradient(0, 0, 255, 0, 255, 255, 'diagonal')->generate(url('/tickets/' . $ticket->id)) !!}
        </div>
    </div>
</body>
</html>
