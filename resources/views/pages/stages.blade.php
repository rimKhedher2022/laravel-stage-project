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
                    @if($role->value ==='etudiant')
                        <h6>Stages</h6>
                        <a href='add-stage'>
                    
                            <button  class="btn btn-primary btn-sm ms-auto">Ajouter stage</button>
                          
                        </a>
                    @elseif ($role->value ==='administrateur')
                        <h6>Stages à affecter aux enseignants ( etat = rapport déposé)</h6> 
                    {{-- @else     --}}
                    @else
                        <h6>Stages à lire / corriger / valider rapport</h6> 
                    @endif
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center">
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
                                    
                                   
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-50">  Action </th>
                                       
                                    
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
                                    <td class="text-sm font-weight-bold mb-0">
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->sujet}}</p>
                                    </td>
                                    <td class="text-sm font-weight-bold mb-0">
                                        @if ($stage->etat == 'validé')
                                            <p class="text-sm font-weight-bold mb-0" style="color: rgb(107, 184, 100)">{{$stage->etat}}</p>
                                        @else
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->etat}}</p>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if ($stage->etat == 'validé')
                                        <p class="text-sm font-weight-bold mb-0" style="color: rgb(51, 54, 50)">{{$stage->date_soutenance}}</p>
                                        @else
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->date_soutenance}}</p>

                                        @endif
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->societe_id}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                            {{-- <div class="d-flex px-3 py-1 justify-content-center align-items-center"> --}}
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
                                              
                                                    <a href='stages/affecter/{{$stage->id}}'>
                                                  
                                                        @if  (empty($stage->enseignants->pluck('id')->toArray())  )
                                                            <button  class="btn btn-secondary btn-sm ms-auto">affecter enseignant</button>
                                                        @endif
                                                       
                                                    </a>
                                           
                                            @else
                                            {{-- // filepath --}}
                                              @if ($stage->etat == "affecté à un enseignant")
                                                
                                           
                                                    <a href="/download/{{$stage->rapport?->filePath}}"  >
                                                        <button  class="btn" style="background-color: rgb(230, 228, 215)"><i class="fa fa-download"></i></button>
                                                          
                                                    </a>
                                                    
                                                        <form method="post"  action="{{ route('rapport.valider', $stage->rapport->id )}}" >
                                                            @csrf
                                                            @method('POST')
                                                            <button type="submit" class="btn btn-success btn-sm ms-auto ">valider rapport</button>
                                                        </form>

                                                        <a href="/download/{{$stage->rapport?->filePath}}"  >
                                                            <button  class="btn" style="background-color: rgb(230, 228, 215)">demander correction</button>
                                                               
                                                        </a>
                                              @endif

                                              @if ($stage->etat == "rapport vérifié et corrigé")
                                                
                              
                                                    <a href="/download/{{$stage->rapport?->filePath}}"  >
                                                        <button  class="btn" style="background-color: rgb(230, 228, 215)"><i class="fa fa-download"></i></button>
                                                       
                                                    </a>
                                                    <br>
                                            
                                                   

                                                    <a href='stages/soutenance/{{$stage->id}}'>
                                                
                                                            <button  class="btn btn-secondary btn-sm ms-auto">saisir date soutenance</button>
                                                    </a>


                                                    <form method="post"  action="{{ route('rapport.annulervalidation', $stage->rapport->id )}}" >
                                                        @csrf
                                                        @method('POST')
                                                        <button type="submit" class="btn btn-success btn-sm  text-wrap" style="background-color: rgb(253, 255, 135) ; color:rgb(4, 1, 56) ; width: 11rem;">annuler validation rapport</button>
                                                    </form> 

                                                    @if ($stage->date_soutenance)
                                                        
                                                   
                                                        <form method="post"  action="{{ route('stages.valider', $stage->id )}}"  >
                                                            @csrf
                                                            @method('POST')
                                                            <button type="submit" class="btn btn-sm ms-auto "  style="background-color: rgb(211, 219, 253)">valider stage</button>
                                                        </form>
                                                    @endif

                                              @endif

                                                @if ($stage->etat == "validé")
                                                        <form method="post"  action="{{ route('stages.annulerValidation', $stage->id )}}"  >
                                                            @csrf
                                                            @method('POST')
                                                            <button type="submit" class="btn btn-sm ms-auto "  style="background-color: rgb(252, 87, 101) ; color:antiquewhite">annuler validation</button>
                                                        </form>
                                                @endif
                                               
                                               
                                             
                                            @endif
                                        {{-- </div> --}}
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
