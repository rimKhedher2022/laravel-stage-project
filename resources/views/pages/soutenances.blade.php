@extends('layouts.app')

<head>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script> --}}
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script type="text/javascript">
        var events = new Array();
        @foreach ($stages as $value)
            events.push({
                title: 'soutenance :{{ $value['sujet'] }}',
                start: '{{ $value['date_soutenance'] }}', // Date and time of the event start
                end: '{{ $value['date_soutenance'] }}', // Date and time of the event end
                color: 'rgb(151, 240, 203)',
                textColor: 'rgb(0, 0, 0)'

                // daysOfWeek:'2',
                // startTime: '10:45:00',
                // endTime: '12:45:00',

            });
        @endforeach
        document.addEventListener('DOMContentLoaded', function() {

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                initialDate: '<?= date('Y-m-d') ?>',
                navLinks: true,
                editable: false,
                events: events,
            });
            calendar.render();
        });
    </script>



</head>
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Soutenances'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">

                    <div id="calendar">

                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection




{{-- <script src="{{url('public/dist/fullcalendar/index.global.js')}}"> </script>
    <script type="text/javascript">
            var calendarID = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarID , {
                    headerToolbar:{
                                left:'prev,next today',
                                center:'title',
                                right: 'dayGridMonth,timeGridWeek,timeGridDay ,listMonth'
                    },
            }); 
        calendar.render();
    </script> 
   --}}






{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            initialView: 'dayGridMonth', // The initial view when the calendar loads
            events: [
                // Your events data will go here, if you have any
                // Refer to FullCalendar documentation for event format
            ]
        });

        calendar.render();
    });
</script> --}}



{{-- @endsection --}}
