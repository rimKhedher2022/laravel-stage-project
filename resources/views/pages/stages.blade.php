@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Stages'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
          
            <div class="card mb-4">
                <div class="card-header pb-0">
                    @if($role->value ==='etudiant')
                        <h6>Stages</h6>
                        <a href='add-stage'>
                    
                            <button  class="btn btn-primary btn-sm ms-auto">Ajouter stage</button>
                          
                        </a>
                    @elseif ($role->value ==='administrateur')
                        <h6>Stages à affecter aux enseignants</h6> 
                    {{-- @else     --}}
                    @else
                        <h6>Stages à valider</h6> 
                    @endif
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
                                        Action
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
                                    <td class="align-middle text-end">
                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                            @if($role->value ==='etudiant')
                                                <a href='stages/{{$stage->id}}'>
                                                    <button  class="btn btn-secondary btn-sm ms-auto">Modifier stage</button>
                                                </a>
                                                {{-- <p class="text-sm font-weight-bold mb-0">Edit</p> --}}
                                            
                                                {{-- <p class="text-sm font-weight-bold mb-0 ps-2">Delete</p> --}}
                                                {{-- <a href = "{{ route('stages.delete', $stage->id) }}">
                                                    <button  class="btn btn-secondary btn-sm ms-auto">Supprimer stage</button>
                                                </a> --}}

                                                <form method="post"  action="{{ route('stages.delete', $stage->id) }}" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm ms-auto ">supprimer</button>
                                                </form>
                                            @elseif ($role->value ==='administrateur')
                                              
                                                    <a href='stages/{{$stage->id}}'>
                                                  
                                                        @if  (empty($stage->enseignants->pluck('id')->toArray())  )
                                                            <button  class="btn btn-secondary btn-sm ms-auto">affecter enseignant</button>
                                                        @endif
                                                       
                                                    </a>
                                           
                                            @else
                                            {{-- // filepath --}}
                                                <a href='rapports/{{$stage->rapport->id}}'>  
                                                        <button  class="btn btn-secondary btn-sm ms-auto">Télécharger</button>
                                                </a>
                                                {{-- on passe a une étatpe de selection du date de soutenance --}}
                                                 <a href=''>
                                                        <button  class="btn btn-primary btn-sm ms-auto">valider rapport</button>
                                                </a>
                                                
                                                <a href=''>
                                                        <button  class="btn btn-primary btn-sm ms-auto">demander de correction</button>
                                                </a> 
                                               
                                             
                                            @endif
                                        </div>
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
