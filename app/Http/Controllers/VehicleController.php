<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::latest()->paginate(9);
        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        return view('vehicles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'price_per_day' => 'required|numeric',
            'seats' => 'required|integer',
            'transmission' => 'required',
            'fuel' => 'required',
            'image' => 'nullable|image',
            'description' => 'nullable',
            'status' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('vehicles', 'public');
        }

        Vehicle::create($data);
        return redirect()->route('vehicles.index')->with('success', 'Vehicle Added!');
    }

    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $data = $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'price_per_day' => 'required|numeric',
            'seats' => 'required|integer',
            'transmission' => 'required',
            'fuel' => 'required',
            'image' => 'nullable|image',
            'description' => 'nullable',
            'status' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('vehicles', 'public');
        }

        $vehicle->update($data);
        return redirect()->route('vehicles.index')->with('success', 'Vehicle Updated!');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Vehicle Deleted!');
    }
}