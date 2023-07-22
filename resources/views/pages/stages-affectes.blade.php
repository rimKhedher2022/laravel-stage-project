@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Stages'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
          
            <div class="card mb-4">
                <div class="card-header pb-0">
                
                        <h6>Stages affectées aux enseignants (etat = affecté a un enseignant / rapport vérifié et corrigé / validé / non validé)</h6> 
                  
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> date debut </th>
                                   
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">date_fin </th>
                                   
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">sujet </th>
                                   
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
                                        Enseignant 
                                    </th>
                                    
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $stages as $stage )
                                    {{-- @if (count($stage->enseignants)) --}}
                                    
                               
                                    
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
                                        <p class="text-sm font-weight-bold mb-0" style="color: rgb(107, 184, 100)">{{$stage->date_soutenance}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->societe_id}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm"> 
                                        @if ($stage->etat =='affecté à un enseignant')
                                            
                                       
                                            <a href='stages/affecter/{{$stage->id}}'>

                                                    {{-- @if  (!empty($stage->enseignants->pluck('id')->toArray())  ) --}}
                                                        <button  class="btn btn-success btn-sm ms-auto">modifier enseignant</button>
                                                    {{-- @endif --}}


                                            </a>

                                        @elseif ($stage->etat =='rapport vérifié et corrigé' ||  $stage->etat =='validé' || $stage->etat =='non validé' )
                                       
                                                <p class="text-sm font-weight-bold mb-0">{{$stage->enseignants[0]->user->nom}} {{$stage?->enseignants[0]->user->prenom}}</p>
                                         
                                        @endif    
                                    </td>

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
