<x-app-layout>
<div class="py-6 max-w-2xl mx-auto px-4">
    <div class="bg-white p-6 rounded shadow">
        @if($vehicle->image)
            <img src="{{ asset('storage/'.$vehicle->image) }}" class="w-full h-64 object-cover rounded">
        @endif
        <h1 class="text-2xl font-bold mt-3">{{ $vehicle->name }}</h1>
        <p>{{ $vehicle->brand }} | {{ $vehicle->type }} | {{ $vehicle->seats }} Seats</p>
        <p>{{ $vehicle->transmission }} | {{ $vehicle->fuel }}</p>
        <p class="font-bold text-lg mt-2">Rs. {{ $vehicle->price_per_day }} / Day</p>
        <p class="mt-2">{{ $vehicle->description }}</p>
        <p>Status: {{ $vehicle->status }}</p>

        <div class="mt-4 flex gap-2">
            <a href="{{ route('bookings.create', ['vehicle_id' => $vehicle->id]) }}" class="bg-green-600 text-white px-4 py-2 rounded">Book This Vehicle</a>
            <a href="{{ route('vehicles.index') }}" class="bg-gray-200 px-4 py-2 rounded">Back</a>
        </div>
    </div>
</div>
</x-app-layout>