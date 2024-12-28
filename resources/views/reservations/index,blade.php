@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">My Reservations</h1>

    <div class="mb-4">
        <form method="POST" action="{{ route('reservations.store') }}">
            @csrf
            <div class="mb-2">
                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                <input type="date" id="date" name="date" class="mt-1 block w-full border-gray-300 rounded-md">
            </div>
            <div class="mb-2">
                <label for="time" class="block text-sm font-medium text-gray-700">Time</label>
                <input type="time" id="time" name="time" class="mt-1 block w-full border-gray-300 rounded-md">
            </div>
            <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                Create Reservation
            </button>
        </form>
    </div>

    <h2 class="text-xl font-semibold mb-4">Your Reservations</h2>
    <table class="w-full table-auto border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Date</th>
                <th class="border px-4 py-2">Time</th>
                <th class="border px-4 py-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reservations as $reservation)
                <tr>
                    <td class="border px-4 py-2">{{ $reservation->date }}</td>
                    <td class="border px-4 py-2">{{ $reservation->time }}</td>
                    <td class="border px-4 py-2">{{ $reservation->status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center text-gray-500 py-4">No reservations found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
