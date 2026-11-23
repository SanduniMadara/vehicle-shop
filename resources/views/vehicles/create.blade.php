<x-app-layout>
<div class="py-6 max-w-2xl mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Add New Vehicle</h1>

    <form action="{{ route('vehicles.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow space-y-3">
        @csrf
        <input name="name" placeholder="Name - Ex: Axio" class="w-full border p-2 rounded" required>
        <input name="brand" placeholder="Brand - Ex: Toyota" class="w-full border p-2 rounded" required>

        <select name="type" class="w-full border p-2 rounded">
            <option>Car</option><option>Van</option><option>Bus</option><option>Bike</option>
        </select>

        <input name="price_per_day" type="number" placeholder="Price Per Day - Ex: 8000" class="w-full border p-2 rounded" required>
        <input name="seats" type="number" placeholder="Seats - Ex: 4" class="w-full border p-2 rounded" required>

        <select name="transmission" class="w-full border p-2 rounded">
            <option>Auto</option><option>Manual</option>
        </select>

        <select name="fuel" class="w-full border p-2 rounded">
            <option>Petrol</option><option>Diesel</option><option>Hybrid</option><option>Electric</option>
        </select>

        <select name="status" class="w-full border p-2 rounded">
            <option value="available">available</option>
            <option value="rented">rented</option>
        </select>

        <input name="image" type="file" class="w-full border p-2 rounded">
        <textarea name="description" placeholder="Description" class="w-full border p-2 rounded"></textarea>

        <button class="bg-blue-600 text-white px-6 py-2 rounded">Save Vehicle</button>
    </form>
</div>
</x-app-layout>