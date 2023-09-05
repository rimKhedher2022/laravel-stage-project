@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Stages'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
          
            <div class="card mb-4">
                   
                <div class="card-header pb-0">
                    @if (session('message'))
                        <div class="alert alert-success" style="color: rgb(2, 0, 15)">{{ session('message') }}</div>
                    @endif
                        <h6>Stages PFE/SFE sans dépots du rapport </h6> 
                  
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                           
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> date debut </th>
                                   
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">date_fin </th>
                                   
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">sujet </th>
                                   
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        etat</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        date soutenance</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        societe 
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Actions
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Messages
                                    </th>
                                    
                                   
                                </tr>
                               
                            </thead>
                            <tbody>
                                @foreach ( $stages as $stage )
                               
                                    
                                <tr>
                                    @if ($stage->type ==='pfe' || $stage->type ==='sfe')
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->type}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->date_debut}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->date_fin}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->sujet}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->etat}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->date_soutenance}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->societe->nom}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if ($stage->type=='pfe')
                                            
                                       
                                            @if ($session_actuel_pfe)
                                            
                                                
                                                {{-- si la session est ouverte , l'admin envoi les messages --}}
                                                @if ($aujourdui >= $session_actuel_pfe->date_debut &&  $aujourdui < $session_actuel_pfe->date_fin)  

                                                        <form method="post"  action="{{ route('message.store', $stage->id)}}" >
                                                            @csrf
                                                            @method('POST')
                                                            <button type="submit" class="btn btn-success btn-sm ms-auto ">Envoyer message</button>
                                                        </form>
                                                @else
                                                        <p style="color:blue">pas de session ouverte</p>
                                                @endif
                                            @else

                                                        <p style="color:blue">pas de session ouverte</p>

                                            @endif
                                        @elseif($stage->type=='sfe')
                                        
                                            @if ($session_actuel_sfe)
                                            
                                                
                                                {{-- si la session est ouverte , l'admin envoi les messages --}}
                                                @if ($aujourdui >= $session_actuel_sfe->date_debut &&  $aujourdui < $session_actuel_sfe->date_fin)  

                                                        <form method="post"  action="{{ route('message.store', $stage->id)}}" >
                                                            @csrf
                                                            @method('POST')
                                                            <button type="submit" class="btn btn-success btn-sm ms-auto ">Envoyer message</button>
                                                        </form>
                                                @else
                                                        <p style="color:blue">pas de session ouverte</p> {{-- session fermé --}}
                                                @endif
                                            @else

                                                        <p style="color:blue">pas de session ouverte</p> {{-- session pas crée --}}

                                            @endif
                                        
                                        @endif
                                        {{-- <a href='add-message/{{$stage->id}}'>
                                                    <button  class="btn btn-success btn-sm ms-auto">envoyer message</button>
                                        </a> --}}
                                       
                                                {{-- <p class="text-sm font-weight-bold mb-0">{{$stage?->enseignants[0]->user->nom}} {{$stage?->enseignants[0]->user->prenom}}</p> --}}
                                             
                                    </td>

                                    <td class="align-middle text-center text-sm"> 
                                        @if ($stage->messages)
                                        {{-- ??????????????? --}}
                                            <p> {{$stage->messages}}  message envoyé </p>  
                                        @endif
                                             
                                    </td>

                                </tr>
                                @endif
                               
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
