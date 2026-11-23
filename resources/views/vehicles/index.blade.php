<x-app-layout>
    <x-slot name="header">
        <h2>Vehicle Rent Shop</h2>
    </x-slot>

    <div style="padding:20px">
        <a href="{{ route('vehicles.create') }}" style="background:black;color:white;padding:10px 15px;border-radius:5px;text-decoration:none;">+ Add Vehicle</a>
        <a href="{{ route('bookings.index') }}" style="background:black;color:white;padding:10px 15px;border-radius:5px;text-decoration:none;margin-left:10px;">Bookings</a>

        <br><br>

        @if($vehicles->count() == 0)
            <p>Thawama vehicle na. Add Vehicle obanna!</p>
        @endif

        @foreach($vehicles as $vehicle)
            <div style="border:1px solid #ccc;padding:15px;margin-bottom:10px;border-radius:8px;">
                <h3>{{ $vehicle->brand }} {{ $vehicle->model }}</h3>
                <p>Price: Rs. {{ $vehicle->price_per_day }} / day</p>
                <p>Status: {{ $vehicle->status }}</p>
                <a href="{{ route('bookings.create', ['vehicle_id' => $vehicle->id]) }}">Book Now</a>
            </div>
        @endforeach
    </div>
</x-app-layout>