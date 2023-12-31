@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Stages'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
          
            <div class="card mb-4">
                <div class="card-header pb-0">
                
                        <h6>Les stages d'été affectés aux enseignants </h6> 
                  
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> date debut </th>
                                   
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">date fin </th>
                                   
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">sujet </th>
                                   
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
                                        Action 
                                    </th>
                                    
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $stages as $stage )
                                    {{-- @if (count($stage->enseignants)) --}}
                                    
                               
                                    
                                <tr>
                                    @if ($stage->type ==='ouvrier' || $stage->type ==='technicien') 
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
                                            <p class="text-sm font-weight-bold mb-0" style="color: rgb(107, 184, 100)">{{$stage->date_soutenance}}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm font-weight-bold mb-0">{{$stage->societe->nom}}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm"> 
                                            @if ($stage->etat =='affecté à un enseignant')
                                                
                                        
                                                <a href='stages/enseignant/affecter/{{$stage->id}}'>

                                                        {{-- @if  (!empty($stage->enseignants->pluck('id')->toArray())  ) --}}
                                                            <button  class="btn btn-success btn-sm ms-auto">modifier enseignant</button>
                                                        {{-- @endif --}}


                                                </a>

                                            @elseif ($stage->etat =='rapport vérifié et corrigé' ||  $stage->etat =='validé' || $stage->etat =='non validé' )

                                                    <a href="/plusinfo/admin/stages/{{ $stage->id }}">
                                                        <button class="btn"  style="background-color: rgb(157, 252, 144)">Plus d'info</button>
                                                    </a>

                                            {{-- ce code est ancien --}}
                                                    {{-- <p class="text-sm font-weight-bold mb-0">{{$stage?->enseignants[0]->user->nom}} {{$stage?->enseignants[0]->user->prenom}}</p> --}}
                                           {{-- ce code est ancien --}}

                                            
                                            @endif    
                                        </td>
                                    @endif
                                </tr>
                                {{-- @endif --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
