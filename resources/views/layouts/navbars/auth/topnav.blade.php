<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl
        {{ str_contains(Request::url(), 'virtual-reality') == true ? ' mt-3 mx-3 bg-primary' : '' }}" id="navbarBlur"
        data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ $title }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ $title }}</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="Type here...">
                </div>
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <form role="form" method="post" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="nav-link text-white font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none">Déconnexion</span>
                        </a>
                    </form>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item px-3 d-flex align-items-center">
                    {{-- <div class="sidenav-header" style="margin:2px"> --}}
                        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                            aria-hidden="true" id="iconSidenav"></i>
                        <a  href="{{ route('profile') }}"
                            target="_blank">
                            <img  src="{{asset("/img"."/".Auth::user()->image)}}" style="width:40px ; height:40px;  border-radius: 50%;" >
                          
                        </a>
                    {{-- </div> --}}
                </li>
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell cursor-pointer"></i>
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                        aria-labelledby="dropdownMenuButton">
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">


                                    @if (auth()->user()->role->value === 'administrateur')
                                        @forelse(auth()->user()->notifications as $notification)
                                   
                                           @if ($notification->type = 'App\Notifications\NewStageCreeSansDepotNotification')
                                           {{-- {{ dd($notification->data["sujet"])}} --}}
                                                    <li>
                                                        <div class="d-flex flex-column justify-content-center" role="alert">
                                                            <h6 class="text-sm font-weight-normal mb-1">
                                                                <span class="font-weight-bold">New Notification</span> 
                                                            </h6>
                                                            {{-- Un nouveau stage  ({{ $notification->data["type"] }})  est crée : {{ $notification->data['sujet'] }}  --}}
                                                           
                                                            <a href="#" class="float-right mark-as-read"
                                                                data-id="{{ $notification->id }}">
                                                                Mark as read
                                                            </a>
                                                        </div>

                                                        @if ($loop->last)
                                                            <a href="#" id="mark-all">
                                                                Mark all as read
                                                            </a>
                                                        @endif
                                                </li>  
                                           @endif
                                           {{-- @if ($notification->type = 'App\Notifications\NewUserNotification')
                                                <li>
                                                        <div class="d-flex flex-column justify-content-center" role="alert">
                                                            <h6 class="text-sm font-weight-normal mb-1">
                                                                <span class="font-weight-bold">New Notification</span> 
                                                            </h6>
                                                            User {{ $notification->data['nom'] }} 
                                                            ({{ $notification->data['email'] }}) has just registered.
                                                            <a href="#" class="float-right mark-as-read"
                                                                data-id="{{ $notification->id }}">
                                                                Mark as read
                                                            </a>
                                                        </div>

                                                        @if ($loop->last)
                                                            <a href="#" id="mark-all">
                                                                Mark all as read
                                                            </a>
                                                        @endif
                                                </li>  
                                             @endif    --}}
                                        @empty
                                            There are no new notifications
                                        @endforelse
                                   
                                    @endif
                                   
                                    {{-- <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">New message</span> from Laur
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">
                                            <i class="fa fa-clock me-1"></i>
                                            13 minutes ago
                                        </p>
                                    </div> --}}
                                </div>
                            </a>
                        </li>
                        
                       
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
