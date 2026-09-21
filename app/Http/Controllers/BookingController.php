<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function create($car)
    {
        return view('bookings.create', compact('car'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);


        $car = \App\Models\Car::findOrFail($validated['car_id']);

        $alreadyBooked = Booking::where('car_id', $validated['car_id'])
            ->whereIn('status', ['pending', 'confirmed'])
            ->where(function ($query) use ($validated) {
                $query->where('start_date', '<', $validated['end_date'])
                ->where('end_date', '>', $validated['start_date']);

            })
            ->exists();


        if ($alreadyBooked) {
            return back()->withErrors([
                'car_id' => 'This car is already booked for the selected dates.',
            ])->withInput();
        }

        $start = Carbon::parse($validated['start_date']);
        $end = Carbon::parse($validated['end_date']);

        $days = $start->diffInDays($end);

        $total = $days * $car->price_per_day;
        
        $booking = Booking::create([
            'user_id' => Auth::id(),
            'car_id' => $validated['car_id'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'total_price' => $total,
            'status' => 'pending',
        ]);

        return redirect()->route('bookings.index')
            ->with('success', 'Booking created successfully.');

    }

    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('bookings.index', compact('bookings'));
    }

}