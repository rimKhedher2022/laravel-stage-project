@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Stages'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
          
            <div class="card mb-4">
                <div class="card-header pb-0">

                    

                    @if (session('message'))
                        <div class="alert alert-success" style="color: rgb(8, 2, 59)">{{ session('message') }}</div>
                    @endif
                
                        <h6>Les stages affectées aux jurys </h6> 
                  
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
                                        État</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Date soutenance</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Société
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

                                            @if ($stage->etat!=='validé')
                                                <a href='stages/jury/affecter/{{$stage->id}}'>

                                                        {{-- @if  (!empty($stage->enseignants->pluck('id')->toArray())  ) --}}
                                                            <button  class="btn btn-success btn-sm ms-auto" style="width: 10rem;">Modifier jurys</button>
                                                        {{-- @endif --}}


                                                </a>

                                                <br>
                                                <a href='stages/soutenance/pfesfe/{{ $stage->id }}'>

                                                    <button class="btn btn-secondary btn-sm ms-auto text-wrap"
                                                        style="width: 10rem;">Saisir date soutenance</button>
                                                </a>


                                                @if ($stage->date_soutenance)
                                                    <form method="post"
                                                        action="{{ route('stages.valider', $stage->id) }}">
                                                        @csrf
                                                        @method('POST')
                                                        <button type="submit" class="btn btn-sm ms-auto "
                                                            style="background-color: rgb(157, 174, 250);color:rgb(2, 2, 36); width: 10rem;">Valider
                                                            stage</button>
                                                    </form> 
                                                @endif

                                              
                                                    
                                            @elseif($stage->etat=='validé')    
                                                <a href="/plusinfo/admin/stages/{{ $stage->id }}">
                                                    <button class="btn"  style="background-color: rgb(157, 252, 144)">Plus d'info</button>
                                                </a>
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
