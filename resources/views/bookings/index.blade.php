<x-app-layout>
<div class="py-6 max-w-5xl mx-auto px-4">
    <h1 class="text-2xl font-bold">All Bookings</h1>
    <a href="{{ route('vehicles.index') }}" class="text-blue-600">← Back to Vehicles</a>

    <table class="w-full bg-white mt-4 rounded shadow">
        <tr class="border-b">
            <th class="p-3 text-left">Vehicle</th>
            <th class="p-3 text-left">Customer</th>
            <th class="p-3 text-left">Dates</th>
            <th class="p-3 text-left">Total</th>
            <th class="p-3 text-left">Action</th>
        </tr>
        @forelse($bookings as $b)
        <tr class="border-b">
            <td class="p-3">{{ $b->vehicle->name ?? 'Deleted' }}</td>
            <td class="p-3">{{ $b->customer_name }}<br>{{ $b->phone }}</td>
            <td class="p-3">{{ $b->start_date }} to {{ $b->end_date }}</td>
            <td class="p-3">Rs. {{ $b->total_price }}</td>
            <td class="p-3">
                <form action="{{ route('bookings.destroy', $b->id) }}" method="POST" onsubmit="return confirm('Cancel karanda?')">
                    @csrf @method('DELETE')
                    <button class="bg-red-500 text-white px-3 py-1 rounded">Cancel</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td class="p-3" colspan="5">Thawama booking na!</td></tr>
        @endforelse
    </table>
</div>
</x-app-layout>