<x-app-layout>
<div class="py-6 max-w-xl mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Book Vehicle</h1>
    <form action="{{ route('bookings.store') }}" method="POST" class="bg-white p-6 rounded shadow space-y-3">
        @csrf
        <label>Select Vehicle</label>
        <select name="vehicle_id" class="w-full border p-2 rounded" required>
            @foreach($vehicles as $v)
                <option value="{{ $v->id }}" @if($selected == $v->id) selected @endif>
                    {{ $v->name }} - Rs. {{ $v->price_per_day }}/Day
                </option>
            @endforeach
        </select>

        <input name="customer_name" placeholder="Your Name" class="w-full border p-2 rounded" required>
        <input name="phone" placeholder="Phone - 0771234567" class="w-full border p-2 rounded" required>
        <label>Start Date</label>
        <input name="start_date" type="date" class="w-full border p-2 rounded" required>
        <label>End Date</label>
        <input name="end_date" type="date" class="w-full border p-2 rounded" required>

        <button class="bg-green-600 text-white px-6 py-2 rounded w-full">Confirm Booking</button>
    </form>
</div>
</x-app-layout>
