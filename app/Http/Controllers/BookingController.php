<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('vehicle')->latest()->get();
        return view('bookings.index', compact('bookings'));
    }

    public function create(Request $request)
    {
        $vehicles = Vehicle::where('status', 'available')->get();
        $selected = $request->vehicle_id;
        return view('bookings.create', compact('vehicles', 'selected'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'vehicle_id' => 'required',
            'customer_name' => 'required',
            'phone' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $vehicle = Vehicle::findOrFail($data['vehicle_id']);
        $days = (strtotime($data['end_date']) - strtotime($data['start_date'])) / 86400 + 1;

        $data['user_id'] = auth()->id();
        $data['total_price'] = $vehicle->price_per_day * $days;
        $data['status'] = 'pending';

        Booking::create($data);
        $vehicle->update(['status' => 'rented']);

        return redirect()->route('vehicles.index')->with('success', 'Booking Successful! Total: Rs. ' . $data['total_price']);
    }

    public function destroy(Booking $booking)
    {
        $booking->vehicle->update(['status' => 'available']);
        $booking->delete();
        return back()->with('success', 'Booking Cancelled!');
    }
}