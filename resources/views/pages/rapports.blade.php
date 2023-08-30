@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Rapports'])
    <div class="row mt-4 mx-4">
        <div class="col-12">


            <div class="card mb-4">
                <div class="card-header pb-0">
                    @if (session('message'))
                        <div class="alert alert-success" style="color: rgb(8, 2, 59)">{{ session('message') }}</div>
                    @endif
                    <h6>Rapports</h6>
                   

                    
                 


                  

                   
                    {{-- @if ($session_actuel)

                   
                                @if (($aujourdui < $session_actuel->date_debut) || ($aujourdui >= $session_actuel->date_fin ))
                                <h6>La session est fermée</h6> 
                            @else
                                <h6>La session est ouverte , vous pouvez déposer ou modifier le rapport </h6>
                                de {{ $session_actuel->date_debut }} à {{ $session_actuel->date_fin }}
                            @endif

                  
                   @else --}}
                    {{-- <p>La session est fermée</p>
                   @endif --}}
                   
                    {{-- condition de fermeture de la session --}}

                    


                    {{-- {{ }}
                    {{ $session_actuel->date_fin}} --}}



                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>

                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Titre
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sujet
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        filePath </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        date_depot </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Action </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Message </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($stages as $stage)
                                    <tr>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $stage->rapport?->titre }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $stage->sujet }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $stage->rapport?->filePath }}</p>
                                        </td>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ $stage->rapport?->date_depot }}</p>

                                        </td>
                                        <td>



                                            {{-- pas de session ouverte / déposez le rapport / modifier /supprimer - rapport déposé // ancien stages   --}}

                                            {{-- session ouverte --}}
                                            @if($stage->type == 'ouvrier' || $stage->type == 'technicien')
                                                @if ($session_actuel_ete)
                                                    @if ($aujourdui >= $session_actuel_ete->date_debut && $aujourdui < $session_actuel_ete->date_fin)
                                                      
                                                            @if (empty($stage->rapport))
                                                                <a href='add-rapport/{{ $stage->id }}'>

                                                                    <button class="btn btn-primary btn-sm ms-auto">Déposer
                                                                        rapport</button>

                                                                </a>
                                                            @endif

                                                     

                                                        @if (!empty($stage->rapport))
                                                            @if ($stage->etat == 'rapport vérifié et corrigé' || $stage->etat == 'validé')
                                                                <a href="/download/{{ $stage->rapport?->filePath }}">
                                                                    <button class="btn"
                                                                        style="background-color: rgb(230, 228, 215)"><i
                                                                            class="fa fa-download"></i></button>
                                                                   

                                                                </a>
                                                            @else
                                                                <a href='rapports/{{ $stage->rapport?->id }}'>
                                                                    <button class="btn btn-secondary btn-sm ms-auto">Modifier
                                                                        rapport</button>
                                                                </a>

                                                                <form method="post"
                                                                    action="{{ route('rapports.delete', $stage->rapport?->id) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger btn-sm ms-auto ">supprimer</button>
                                                                </form>



                                                                <a href="/download/{{ $stage->rapport?->filePath }}">
                                                                    <button class="btn"
                                                                        style="background-color: rgb(230, 228, 215)"><i
                                                                            class="fa fa-download"></i></button>
                                                                  

                                                                </a>
                                                            @endif
                                                        @endif
                                                    @else 

                                                            @if (!empty($stage->rapport))
                                                                    @if ($stage->etat == 'rapport vérifié et corrigé' || $stage->etat == 'validé')
                                                                        <a href="/download/{{ $stage->rapport?->filePath }}">
                                                                            <button class="btn"
                                                                                style="background-color: rgb(230, 228, 215)"><i
                                                                                    class="fa fa-download"></i></button>
                                                                        

                                                                        </a>
                                                                    @endif
                                                                
                                                            @endif
                                                   @endif
                                                  @endif                      
                                            @elseif($stage->type == 'pfe')
                                                            @if ($session_actuel_pfe)
                                                            @if ($aujourdui >= $session_actuel_pfe->date_debut && $aujourdui < $session_actuel_pfe->date_fin)
                                                            
                                                                    @if (empty($stage->rapport))
                                                                        <a href='add-rapport/{{ $stage->id }}'>

                                                                            <button class="btn btn-primary btn-sm ms-auto">Déposer
                                                                                rapport</button>

                                                                        </a>
                                                                    @endif

                                                            

                                                                @if (!empty($stage->rapport))
                                                                    @if ($stage->etat == 'rapport vérifié et corrigé' || $stage->etat == 'validé' || $stage->etat == 'affecté aux jurys'  )
                                                                        <a href="/download/{{ $stage->rapport?->filePath }}">
                                                                            <button class="btn"
                                                                                style="background-color: rgb(230, 228, 215)"><i
                                                                                    class="fa fa-download"></i></button>
                                                                            

                                                                        </a>
                                                                    @else
                                                                        <a href='rapports/{{ $stage->rapport?->id }}'>
                                                                            <button class="btn btn-secondary btn-sm ms-auto">Modifier
                                                                                rapport</button>
                                                                        </a>

                                                                        <form method="post"
                                                                            action="{{ route('rapports.delete', $stage->rapport?->id) }}">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="btn btn-danger btn-sm ms-auto ">supprimer</button>
                                                                        </form>



                                                                        <a href="/download/{{ $stage->rapport?->filePath }}">
                                                                            <button class="btn"
                                                                                style="background-color: rgb(230, 228, 215)"><i
                                                                                    class="fa fa-download"></i></button>
                                                                        

                                                                        </a>
                                                                    @endif
                                                                @endif
                                                           
                                                            @endif
                                                        @endif 



                                              @elseif($stage->type == 'sfe') 

                                                                @if ($session_actuel_sfe)
                                                                @if ($aujourdui >= $session_actuel_sfe->date_debut && $aujourdui < $session_actuel_sfe->date_fin)
                                                                    
                                                                        @if (empty($stage->rapport))
                                                                            <a href='add-rapport/{{ $stage->id }}'>

                                                                                <button class="btn btn-primary btn-sm ms-auto">Déposer
                                                                                    rapport</button>

                                                                            </a>
                                                                        @endif

                                                                

                                                                    @if (!empty($stage->rapport))
                                                                        @if ($stage->etat == 'rapport vérifié et corrigé' || $stage->etat == 'validé')
                                                                            <a href="/download/{{ $stage->rapport?->filePath }}">
                                                                                <button class="btn"
                                                                                    style="background-color: rgb(230, 228, 215)"><i
                                                                                        class="fa fa-download"></i></button>
                                                                                

                                                                            </a>
                                                                        @else
                                                                            <a href='rapports/{{ $stage->rapport?->id }}'>
                                                                                <button class="btn btn-secondary btn-sm ms-auto">Modifier
                                                                                    rapport</button>
                                                                            </a>

                                                                            <form method="post"
                                                                                action="{{ route('rapports.delete', $stage->rapport?->id) }}">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit"
                                                                                    class="btn btn-danger btn-sm ms-auto ">supprimer</button>
                                                                            </form>



                                                                            <a href="/download/{{ $stage->rapport?->filePath }}">
                                                                                <button class="btn"
                                                                                    style="background-color: rgb(230, 228, 215)"><i
                                                                                        class="fa fa-download"></i></button>
                                                                                

                                                                            </a>
                                                                        @endif
                                                                    @endif
                                                                @endif
                                                            @endif 



                                            @endif
                    </div>
                    </td>


                    <td>
                        {{-- ete --}}
                        @if($stage->type == 'ouvrier' || $stage->type == 'technicien')
                                @if ($session_actuel_ete)
                                    @if ($aujourdui < $session_actuel_ete->date_debut || $aujourdui > $session_actuel_ete->date_fin)
                                            @if (empty($stage->rapport))
                                                <p style="color:blue">pas de session ouverte</p>
                                            

                                            @elseif ($stage->etat == 'rapport vérifié et corrigé')
                                                <p> rapport vérifié et corrigé </p>
                                        
                                            @elseif ($stage->etat == 'rapport déposé')
                                                <p> rapport déposé </p>
                                        
                                            @elseif ($stage->etat == 'validé')
                                                <p style="color:rgb(65, 134, 82)"> Validé </p>

                                            @elseif ($stage->etat == 'affecté à un enseignant')
                                                <p> affecté à un enseignant </p>
                                            @endif
                                    @else

                                              

                                            @if ($stage->etat == 'rapport vérifié et corrigé')
                                                <p> rapport vérifié et corrigé </p>
                                                
                                                    @elseif ($stage->etat == 'rapport déposé')
                                                        <p> rapport déposé </p>
                                                
                                                    @elseif ($stage->etat == 'validé')
                                                        <p style="color:rgb(65, 134, 82)"> Validé </p>

                                                    @elseif ($stage->etat == 'affecté à un enseignant')
                                                        <p> affecté à un enseignant </p>
                                            @endif
                                    @endif

                                @else
                                            @if (empty($stage->rapport))
                                            <p style="color:blue">pas de session ouverte</p>
                                        

                                        @elseif ($stage->etat == 'rapport vérifié et corrigé')
                                            <p> rapport vérifié et corrigé </p>
                                    
                                        @elseif ($stage->etat == 'rapport déposé')
                                            <p> rapport déposé </p>
                                    
                                        @elseif ($stage->etat == 'validé')
                                            <p style="color:rgb(65, 134, 82)"> Validé </p>

                                        @elseif ($stage->etat == 'affecté à un enseignant')
                                            <p> affecté à un enseignant </p>
                                        @endif
                                @endif    
                        @endif


                        {{-- pfe --}}


                        @if($stage->type == 'pfe')
                        @if ($session_actuel_pfe)
                            @if ($aujourdui < $session_actuel_pfe->date_debut || $aujourdui > $session_actuel_pfe->date_fin)
                                    @if (empty($stage->rapport))
                                        <p style="color:blue">pas de session ouverte</p>
                                    

                                    @elseif ($stage->etat == 'rapport vérifié et corrigé')
                                        <p> rapport vérifié et corrigé </p>
                                
                                    @elseif ($stage->etat == 'rapport déposé')
                                        <p> rapport déposé </p>
                                
                                    @elseif ($stage->etat == 'validé')
                                        <p style="color:rgb(65, 134, 82)"> Validé </p>

                                    @elseif ($stage->etat == 'affecté à un encdarant')
                                        <p> affecté à un encdarant </p>
                                    @endif
                           

                            @elseif ($stage->etat == 'rapport vérifié et corrigé')
                                        <p> rapport vérifié et corrigé </p>
                                
                                    @elseif ($stage->etat == 'rapport déposé')
                                        <p> rapport déposé </p>
                                
                                    @elseif ($stage->etat == 'validé')
                                        <p style="color:rgb(65, 134, 82)"> Validé </p>

                                    @elseif ($stage->etat == 'affecté à un encdarant')
                                        <p> affecté à un encdarant </p>
                                  

                            @endif
                        @else
                                    @if (empty($stage->rapport))
                                    <p style="color:blue">pas de session ouverte</p>
                                

                                @elseif ($stage->etat == 'rapport vérifié et corrigé')
                                    <p> rapport vérifié et corrigé </p>
                            
                                @elseif ($stage->etat == 'rapport déposé')
                                    <p> rapport déposé </p>
                            
                                @elseif ($stage->etat == 'validé')
                                    <p style="color:rgb(65, 134, 82)"> Validé </p>

                                @elseif ($stage->etat == 'affecté à un encadrant')
                                    <p> affecté à un encadrant </p>
                                @endif
                        @endif    
                @endif


                        {{-- sfe --}}


                        @if($stage->type == 'sfe')
                        @if ($session_actuel_sfe)
                            @if ($aujourdui < $session_actuel_sfe->date_debut || $aujourdui > $session_actuel_sfe->date_fin)
                                    @if (empty($stage->rapport))
                                        <p style="color:blue">pas de session ouverte</p>
                                    

                                    @elseif ($stage->etat == 'rapport vérifié et corrigé')
                                        <p> rapport vérifié et corrigé </p>
                                
                                    @elseif ($stage->etat == 'rapport déposé')
                                        <p> rapport déposé </p>
                                
                                    @elseif ($stage->etat == 'validé')
                                        <p style="color:rgb(65, 134, 82)"> Validé </p>

                                    @elseif ($stage->etat == 'affecté à un encdarant')
                                        <p> affecté à un encdarant</p>
                                    @endif
                            @endif
                        @else
                                    @if (empty($stage->rapport))
                                    <p style="color:blue">pas de session ouverte</p>
                                

                                @elseif ($stage->etat == 'rapport vérifié et corrigé')
                                    <p> rapport vérifié et corrigé </p>
                            
                                @elseif ($stage->etat == 'rapport déposé')
                                    <p> rapport déposé </p>
                            
                                @elseif ($stage->etat == 'validé')
                                    <p style="color:rgb(65, 134, 82)"> Validé </p>

                                @elseif ($stage->etat == 'affecté à un encdarant')
                                    <p> affecté à un encdarant </p>
                                @endif
                        @endif    
                @endif

                          
                        {{-- @if ($session_actuel)
                            
                       
                                @if ($aujourdui < $session_actuel->date_debut)
                                    


                                    
                                   





                                   
                                @elseif ($aujourdui >= $session_actuel->date_fin)
                                    @if (empty($stage->rapport))
                                        <p style="color:blue">pas de session ouverte</p>
                                    @endif


                                    @if ($stage->etat == 'rapport vérifié et corrigé')
                                        <p> rapport vérifié et corrigé </p>
                                    @endif
                                    @if ($stage->etat == 'rapport déposé')
                                        <p> rapport déposé </p>
                                    @endif
                                    @if ($stage->etat == 'validé')
                                        <p style="color:rgb(65, 134, 82)"> stage validé </p>
                                    @elseif ($stage->etat == 'affecté à un enseignant')
                                        <p> affecté à un enseignant </p>
                                    @endif
                                @else 
                              
                                    @if ($stage->etat == 'rapport vérifié et corrigé')
                                        <p> rapport vérifié et corrigé </p>
                                    @endif
                                    @if ($stage->etat == 'rapport déposé')
                                        <p> rapport déposé </p>
                                    @endif
                                    @if ($stage->etat == 'validé')
                                        <p style="color:rgb(65, 134, 82)"> stage validé </p>
                                    @elseif ($stage->etat == 'affecté à un enseignant')
                                        <p> affecté à un enseignant </p>
                                    @endif
                                @endif
                        @endif --}}




                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>

                {{-- fin code --}}
            </div>
        </div>
    </div>
    </div>
@endsection
