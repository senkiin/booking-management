<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/main.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/main.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/main.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.8/main.min.js"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100 min-h-screen">
    <div class="container mx-auto p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-4xl font-bold">Dashboard</h1>
            <div>
                @auth
                <a href="{{ route('profile.edit') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600">Profile</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg shadow hover:bg-red-600">Logout</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="px-4 py-2 bg-green-500 text-white rounded-lg shadow hover:bg-green-600">Login</a>
                @endauth
            </div>
        </div>

        <!-- Calendar -->
        @auth
        <div id="calendar" class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow"></div>
        @else
        <p class="text-center text-gray-500 dark:text-gray-400">Please log in to see your calendar.</p>
        @endauth
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            if (calendarEl) {
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: [
                        @foreach (App\Models\Reservation::where('user_id', Auth::id())->get() as $reservation)
                        {
                            title: 'Reservation',
                            start: '{{ $reservation->date }}T{{ $reservation->time }}',
                            allDay: false,
                        },
                        @endforeach
                    ],
                    selectable: true,
                    dateClick: function(info) {
                        alert('Selected date: ' + info.dateStr);
                    }
                });

                calendar.render();
            }
        });
    </script>
</body>
</html>
