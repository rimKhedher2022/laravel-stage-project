<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0  fixed-start ms-4 "
    id="sidenav-main" style="width:300px">
    <div class="sidenav-header" style="margin: 25px">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a  href="{{ route('profile') }}"
            target="_blank">
            <img  src="{{ asset('./img/logo.png') }}" style="width:60px " >
            <span class="ms-1 font-weight-bold">InternPro</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    {{-- <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main"> --}}
        <ul class="navbar-nav">
            {{-- <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
           --}}
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profil</span>
                </a>
            </li>

            @if (auth()->user()->role->value === 'enseignant')
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'stages') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'stages']) }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Stages à valider</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'soutenances') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'soutenances']) }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Les soutenances</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'messages') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'messages']) }}">
                        <div class="fa fa-envolope icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            {{-- <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i> --}}
                            <i class="fa fa-envelope" style="font-size: 15px;"></i>
                        </div>
                        <span class="nav-link-text ms-1">Messages{{auth()->user()->messagesCount()}} </span>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'messages') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'messages']) }}">
                        <div class="fa fas fa-solid fa-envelope border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni  text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Messages{{auth()->user()->messagesCount()}} </span>
                        
                    </a>
                </li> --}}
            @endif

            @if (auth()->user()->role->value === 'administrateur')
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'user-management') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'user-management']) }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Management</span>
                </a>
            </li>




            <ul class="nav" >
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="toggleSubMenu()">
                        <div class="fa fa-school border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                           
                        </div>
                        <span class="nav-link-text ms-1">Stages d'été</span>
                    </a>
                      <ul style="list-style: none;
                      padding-left: 0;">        
           
                            <li>
                                <a class="nav-link {{ str_contains(request()->url(), 'stages') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'stages']) }}">
                                    <div class="item-style {{ str_contains(request()->url(), 'stages') == true ? 'active' : '' }}">
                                        <span class="small-circle-icon">
                                            <!-- Replace "fas fa-user" with your desired Font Awesome icon class -->
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="nav-link-text ms-1">à affecter aux enseignants</span>
                                    </div>    
                                </a>
                            </li>
           
           
           
               
                  
                                <li>
                                    <a class="nav-link {{ str_contains(request()->url(),'affectes-ete') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'affectes-ete']) }}">
                                        <div class="item-style">
                                            <span class="small-circle-icon">
                                                <!-- Replace "fas fa-user" with your desired Font Awesome icon class -->
                                                <i class="fas fa-circle"></i>
                                            </span>
                                            <span class="nav-link-text ms-1">affectés aux enseignants </span>
                                        </div>    
                                    </a>
                                </li>

                                {{-- ok for Stages sans dépot --}}
                                    <li>
                                        <a class="nav-link {{ str_contains(request()->url(), 'sans-depots-ete') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'sans-depots-ete']) }}">
                                            <div class="item-style">
                                                    <span class="small-circle-icon">
                                                        <!-- Replace "fas fa-user" with your desired Font Awesome icon class -->
                                                        <i class="fas fa-circle"></i>
                                                    </span>
                                                    <span class="nav-link-text ms-1">sans dépot</span>
                                            </div>        
                                        </a>
                                    </li>

                        </ul>
          {{-- stages PFE / SFE --}}
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="toggleSubMenu()">
                        <div class="fa fa-school border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                           
                        </div>
                        <span class="nav-link-text ms-1">Stages PFE / SFE</span>
                    </a>
                      <ul style="list-style: none;
                      padding-left: 0; ">        
             
                            <li >
                                <a class="nav-link {{ str_contains(request()->url(), 'encadrant-pfe-sfe') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'encadrant-pfe-sfe']) }}">
                                    <div class="item-style">
                                        <span class="small-circle-icon">
                                            <!-- Replace "fas fa-user" with your desired Font Awesome icon class -->
                                            <i class="fas fa-circle"></i>
                                        </span>
                                            <span class="nav-link-text ms-1">à affecter aux encadrants</span>
                                    </div>        
                                </a>
                            </li>

                            <li>
                                <a class="nav-link {{ str_contains(request()->url(), 'encadrants-affectation-pfesfe') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'encadrants-affectation-pfesfe']) }}">
                                    <div class="item-style">    
                                            <span class="small-circle-icon">
                                                <!-- Replace "fas fa-user" with your desired Font Awesome icon class -->
                                                <i class="fas fa-circle"></i>
                                            </span>
                                            <span class="nav-link-text ms-1">affectés aux encadrants </span>
                                    </div>        
                                </a>
                            </li>
                            <li >
                                <a class="nav-link {{ str_contains(request()->url(), 'jurys-pfe-sfe') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'jurys-pfe-sfe']) }}">
                                    <div class="item-style">    
                                        <span class="small-circle-icon">
                                                <!-- Replace "fas fa-user" with your desired Font Awesome icon class -->
                                                <i class="fas fa-circle"></i>
                                            </span>
                                                <span class="nav-link-text ms-1">à affecter aux jury</span>
                                    </div>            
                                </a>
                            </li>
           
           
           
               
                 
                           
                            <li>
                                <a class="nav-link {{ str_contains(request()->url(), 'jurys-affectation-pfesfe') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'jurys-affectation-pfesfe']) }}">
                                    <div class="item-style">
                                        <span class="small-circle-icon">
                                            <!-- Replace "fas fa-user" with your desired Font Awesome icon class -->
                                            <i class="fas fa-circle"></i>
                                        </span>
                                        <span class="nav-link-text ms-1">affectés aux jurys </span>
                                    </div>    
                                </a>
                            </li>

                               
                                <li >
                                    <a class="nav-link {{ str_contains(request()->url(), 'stages-sans-depots-pfe-sfe') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'stages-sans-depots-pfe-sfe']) }}">
                                        <div class="item-style">    
                                            <span class="small-circle-icon">
                                                    <!-- Replace "fas fa-user" with your desired Font Awesome icon class -->
                                                    <i class="fas fa-circle"></i>
                                                </span>
                                                <span class="nav-link-text ms-1">sans dépot</span>
                                        </div>        
                                    </a>
                                </li>

            </ul>  
          
                @endif
          
           
            

            @if (auth()->user()->role->value === 'etudiant')

            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'stages') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'stages']) }}">
                    <div class="fa fa-school border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="text-dark text-sm opacity-10"></i>
                    </div>
                         <span class="nav-link-text ms-1">Stages</span>
                </a>
            </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'rapports') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'rapports']) }}">
                        <div class="fa fa-building-o  border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni  text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Rapports déposés / à déposer</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'messages-etudiants') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'messages-etudiants']) }}">
                        <div class="fa fas fa-solid fa-envelope border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni  text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1 badge-dark">Messages {{auth()->user()->messagesCount()}} </span>
                        
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ str_contains(request()->url(), 'societes') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'societes']) }}">
                        <div class="fa fa-building-o  border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni  text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Societes</span>
                    </a>
                </li>

               
            @endif

            @if (auth()->user()->role->value === 'administrateur')
                    <li class="nav-item">
                        <a class="nav-link {{ str_contains(request()->url(), 'enseignants') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'enseignants']) }}">
                            <div class="fa fas fa-chalkboard-teacher  border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni  text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Enseignants</span>
                        </a>
                    </li>
                    {{-- ?? --}}
                  

                    <li class="nav-item">
                        <a class="nav-link {{ str_contains(request()->url(), 'sessions') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'sessions']) }}">
                            <div class="fa fas fa-solid fa-book border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni  text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Sessions</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ str_contains(request()->url(), 'messages') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'messages']) }}">
                            <div class="fa fas fa-solid fa-envelope border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni  text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Messages</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ str_contains(request()->url(), 'societes') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'societes']) }}">
                            <div class="fa fa-building-o  border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni  text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Societes</span>
                        </a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link {{ str_contains(request()->url(), 'import') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'import']) }}">
                            <div class="fa fa-building-o  border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni  text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">CSV files</span>
                        </a>
                    </li>
            @endif
                
         
           
{{--            
           
           
           
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'rtl' ? 'active' : '' }}" href="{{ route('rtl') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">RTL</span>
                </a>
            </li> 
             <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li> 
           <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'profile-static' ? 'active' : '' }}" href="{{ route('profile-static') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
          <li class="nav-item">
                <a class="nav-link " href="{{ route('sign-in-static') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sign In</span>
                </a>
            </li> 
            <li class="nav-item">
                <a class="nav-link " href="{{ route('sign-up-static') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-collection text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Up</span>
                </a>
            </li> --}}
        </ul>
    </div>
    
</aside>
{{-- <script>
    function toggleSubMenu() {
        const subMenu = document.getElementById('subMenu');
        subMenu.style.display = subMenu.style.display === 'none' ? 'block' : 'none';
    }
</script> --}}