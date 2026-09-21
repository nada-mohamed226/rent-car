<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Booking</title>
</head>
<body>

    <h1>Create Booking</h1>

    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf

        <input type="hidden" name="car_id" value="{{ $car }}">

        <div>
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
        </div>

        <br>

        <div>
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" required>
        </div>

        <br>

        <button type="submit">Book Now</button>
    </form>

</body>
</html>