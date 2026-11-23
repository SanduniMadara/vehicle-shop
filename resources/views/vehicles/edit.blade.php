<x-app-layout>
<div class="py-6 max-w-2xl mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Edit Vehicle</h1>
    <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow space-y-3">
        @csrf @method('PUT')
        <input name="name" value="{{ $vehicle->name }}" class="w-full border p-2 rounded" required>
        <input name="brand" value="{{ $vehicle->brand }}" class="w-full border p-2 rounded" required>
        <select name="type" class="w-full border p-2 rounded">
            <option @if($vehicle->type=='Car') selected @endif>Car</option>
            <option @if($vehicle->type=='Van') selected @endif>Van</option>
            <option @if($vehicle->type=='Bus') selected @endif>Bus</option>
            <option @if($vehicle->type=='Bike') selected @endif>Bike</option>
        </select>
        <input name="price_per_day" type="number" value="{{ $vehicle->price_per_day }}" class="w-full border p-2 rounded" required>
        <input name="seats" type="number" value="{{ $vehicle->seats }}" class="w-full border p-2 rounded" required>
        <select name="transmission" class="w-full border p-2 rounded">
            <option @if($vehicle->transmission=='Auto') selected @endif>Auto</option>
            <option @if($vehicle->transmission=='Manual') selected @endif>Manual</option>
        </select>
        <select name="fuel" class="w-full border p-2 rounded">
            <option @if($vehicle->fuel=='Petrol') selected @endif>Petrol</option>
            <option @if($vehicle->fuel=='Diesel') selected @endif>Diesel</option>
            <option @if($vehicle->fuel=='Hybrid') selected @endif>Hybrid</option>
            <option @if($vehicle->fuel=='Electric') selected @endif>Electric</option>
        </select>
        <select name="status" class="w-full border p-2 rounded">
            <option value="available" @if($vehicle->status=='available') selected @endif>available</option>
            <option value="rented" @if($vehicle->status=='rented') selected @endif>rented</option>
        </select>
        <input name="image" type="file" class="w-full border p-2 rounded">
        <textarea name="description" class="w-full border p-2 rounded">{{ $vehicle->description }}</textarea>
        <button class="bg-green-600 text-white px-6 py-2 rounded">Update</button>
    </form>
</div>
</x-app-layout>