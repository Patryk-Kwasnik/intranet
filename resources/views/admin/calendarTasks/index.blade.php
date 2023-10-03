@extends('layouts.admin')
@section('admin')
    <head>
        <meta charset='utf-8' />

        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
        <script>

            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    height: 800,
                    initialView: 'timeGridWeek',
                    themeSystem: "bootstrap5",
                    slotMinTime: "06:00:00",
                    slotMaxTime: "18:00:00",
                    weekends:false,
                    locale: 'pl'
                });

                calendar.render();
            });

        </script>
    </head>
    <body>
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div id='calendar' ></div>
        </section>
    </div>
    </body>
@endsection
