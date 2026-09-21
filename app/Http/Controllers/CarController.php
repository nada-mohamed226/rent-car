<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::query();

        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $cars = $query->latest()->get();

        return view('cars.index', compact('cars'));
    }

   
    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }
    public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'brand' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'transmission' => 'required|string|max:255',
        'seats' => 'required|integer|min:1',
        'price_per_day' => 'required|numeric|min:0',
        'image' => 'nullable|string|max:255',
        'description' => 'nullable|string',
    ]);

    Car::create($data);

    return redirect()->route('cars.index');
}
public function update(Request $request, Car $car)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'brand' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'transmission' => 'required|string|max:255',
        'seats' => 'required|integer|min:1',
        'price_per_day' => 'required|numeric|min:0',
        'image' => 'nullable|string|max:255',
        'description' => 'nullable|string',
    ]);

    $car->update($data);

    return redirect()->route('cars.show', $car->id);
}
public function destroy(Car $car)
{
    $car->delete();

    return redirect()->route('cars.index');
}
}