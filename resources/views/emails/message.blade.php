<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { width: 80%; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        .header { background-color: #f8f8f8; padding: 10px; text-align: center; }
        .content { margin-top: 20px; }
        .footer { margin-top: 30px; font-size: 0.9em; color: #777; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>I would like to barter with you!</h2>
        </div>
        <div class="content">
            {{-- <p>{{ $messageBody }}</p> --}}
            <p>{{ nl2br(e($content)) }}</p>
            {{-- <p>Best regards,<br>The {{ config('app.name') }} Team</p> --}}
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Nextrade. All rights reserved.</p>
        </div>
    </div>
</body>
</html>