@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Stages'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
          
            <div class="card mb-4">
                <div class="card-header pb-0">
                
                        <h6>Stages sans dépots du rapport</h6> 
                  
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
                                        date_soutenance</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        societe_id 
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
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->societe_id}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        {{-- si la session est ouverte , l'admin envoi les messages --}}
                                        @if ($aujourdui >= $session_actuel->date_debut &&  $aujourdui < $session_actuel->date_fin)  

                                                <form method="post"  action="{{ route('message.store', $stage->id)}}" >
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit" class="btn btn-success btn-sm ms-auto ">envoyer message</button>
                                                </form>
                                        @else
                                                <p style="color:blue">pas de session ouverte</p>
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
                               
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
