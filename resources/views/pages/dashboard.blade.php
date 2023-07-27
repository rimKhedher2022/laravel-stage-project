@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid py-4">
        <div class="row">


            {{-- <div class="col-xl-3 col-sm-6"> --}}
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row gx-4">
                            <div class="col-auto">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Notifications</p>
                                    @if (auth()->user()->role->value === 'administrateur')
                                        @forelse($notifications as $notification)
                                        
                                            @if ($notification->type = 'App\Notifications\NewUserNotification' && isset($notification->data['nom']) && isset($notification->data['email']))
                                                <div class="alert alert-success" role="alert">
                                                   Un nouveau utilisateur  {{ $notification->data['nom'] }}
                                                    ({{ $notification->data['email'] }}) inscrit.
                                                    <a href="#" class="float-right mark-as-read"
                                                        data-id="{{ $notification->id }}">
                                                        Mark as read
                                                    </a>
                                                </div>
                                            @endif  
                                            @if ($notification->type = 'App\Notifications\NouveauStageNotification' && isset($notification->data['type']) && isset($notification->data['sujet'])) 
                                            {{-- chatGPT   isset --}}
                                                <div class="alert alert-success" role="alert">
                                                Un nouveau stage {{ $notification->data['type'] }} est crée mais sans un rapport déposé
                                                    sujet <strong>({{ $notification->data['sujet'] }}) </strong>
                                                    <a href="#" class="float-right mark-as-read"
                                                        data-id="{{ $notification->id }}">
                                                        Mark as read
                                                    </a>
                                                </div>
                                            @endif
                                            {{-- @if ($notification->type = 'App\Notifications\NouveauRapportStageNotification' && isset($notification->data['type']) && isset($notification->data['sujet'])) 
                                         
                                                <div class="alert alert-success" role="alert">
                                                rapport déposé pour le stage {{ $notification->data['type'] }} 
                                                    sujet <strong>({{ $notification->data['sujet'] }}) </strong>
                                                    <a href="#" class="float-right mark-as-read"
                                                        data-id="{{ $notification->id }}">
                                                        Mark as read
                                                    </a>
                                                </div>
                                            @endif
                                            --}}
                                            {{-- @if ($notification->type == 'App\Notifications\StageValideNotification' && isset($notification->data['type']) && isset($notification->data['sujet'])) 
                                    
                                                <div class="alert alert-success" role="alert">
                                                stage validé pour le sujet <strong>({{ $notification->data['sujet'] }}) </strong> 
                                                    
                                                    <a href="#" class="float-right mark-as-read"
                                                        data-id="{{ $notification->id }}">
                                                        Mark as read
                                                    </a>
                                                </div>
                                            @endif --}}

                                                @if ($loop->last)
                                                    <a href="#" id="mark-all">
                                                        Mark all as read
                                                    </a>
                                                @endif
                                           
                                        @empty
                                            There are no new notifications
                                        @endforelse
                                    @else
                                       
                                    @endif
                                    @if (auth()->user()->role->value === 'enseignant')
                                        @forelse($notifications as $notification)
                                        
                                            @if ($notification->type = 'App\Notifications\StageAffecteeNotification' && isset($notification->data['type']) && isset($notification->data['sujet']))
                                                <div class="alert alert-success" role="alert">
                                                   Un nouveau stage  ({{ $notification->data['type'] }}) que vous aller valider : sujet {{ $notification->data['sujet'] }}
                                                  
                                                    <a href="#" class="float-right mark-as-read"
                                                        data-id="{{ $notification->id }}">
                                                        Mark as read
                                                    </a>
                                                </div>
                                            @endif  
                                         
                                           
                                           

                                                @if ($loop->last)
                                                    <a href="#" id="mark-all">
                                                        Mark all as read
                                                    </a>
                                                @endif
                                           
                                        @empty
                                            There are no new notifications
                                        @endforelse
                                    @else
                                      
                                    @endif
                                    @if (auth()->user()->role->value === 'etudiant')
                                        @forelse($notifications as $notification)
                                      
                                            {{-- @if ($notification->type = 'App\Notifications\StageAffecteeNotification' && isset($notification->data['type']) && isset($notification->data['sujet']) && isset($notification->data['enseignantnom']))
                                                <div class="alert alert-success" role="alert">
                                                  votre stage : sujet <strong>({{ $notification->data['sujet'] }})</strong> est affecté à l'enseignant {{ $notification->data['enseignantnom'] }}
                                                  
                                                    <a href="#" class="float-right mark-as-read"
                                                        data-id="{{ $notification->id }}">
                                                        Mark as read
                                                    </a>
                                                </div>
                                            @endif   --}}
                                         
                                           
                                           

                                                @if ($loop->last)
                                                    <a href="#" id="mark-all">
                                                        Mark all as read
                                                    </a>
                                                @endif
                                           
                                        @empty
                                            There are no new notifications
                                        @endforelse
                                    @else
                                      
                                    @endif

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        {{-- </div> --}}


        {{-- @include('layouts.footers.auth.footer') --}}
    </div>
@endsection
@section('scripts')
@parent
@if(auth()->user()->role->value === 'administrateur')
    <script>
    function sendMarkRequest(id = null) {
        return $.ajax("{{ route('markNotification') }}", {
            method: 'POST',
            data: {
                _token,
                id
            }
        });
    }

    $(function() {
        $('.mark-as-read').click(function() {
            let request = sendMarkRequest($(this).data('id'));

            request.done(() => {
                $(this).parents('div.alert').remove();
            });
        });

        $('#mark-all').click(function() {
            let request = sendMarkRequest();

            request.done(() => {
                $('div.alert').remove();
            })
        });
    });
    </script>
@endif
@endsection





@push('js')
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(251, 99, 64, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(251, 99, 64, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(251, 99, 64, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#fb6340",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
@endpush
