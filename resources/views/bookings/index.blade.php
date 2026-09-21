<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>
</head>
<body>

    <h1>My Bookings</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if ($bookings->isEmpty())
        <p>You don't have any bookings yet.</p>
    @else
        @foreach ($bookings as $booking)
            <div>
                <p>Car ID: {{ $booking->car_id }}</p>
                <p>Start Date: {{ $booking->start_date }}</p>
                <p>End Date: {{ $booking->end_date }}</p>
                <p>Total Price: {{ $booking->total_price }}</p>
                <p>Status: {{ $booking->status }}</p>
            </div>

            <hr>
        @endforeach
    @endif

</body>
</html>