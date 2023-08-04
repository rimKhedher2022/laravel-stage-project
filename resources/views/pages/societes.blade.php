@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Sociétés'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            @if   (auth()->user()->role->value === 'etudiant')
                <div class="card mb-4">
                
                        <div class="card-header pb-0">
                            
                                <h6>Les sociétés contactées </h6>
                                
                                        <a href='add-societe'>
                                            <button  class="btn btn-primary btn-sm ms-auto">Ajouter société</button>
                                        </a>
                            
                        
                        </div>
                
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Telephone </th>
                                    
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Adresse </th>
                                    
                                    
                                    
                                    

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $societes as $societe )
                                        
                                
                                        
                                    <tr>
                                        
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{$societe->nom}}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{$societe->telephone}}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{$societe->adresse}}</p>
                                        </td>
                                    
                                    
                                        
                                    
                                        <td class="align-middle text-end">
                                            <div class="d-flex px-3 py-1 justify-content-center align-items-center">


                                                @if ($societe->validation_state == 'not yet validated by the admin')


                                                        <form method="post" action="{{ route('societes.validation', $societe->id) }}">
                                                                        
                                                            @csrf
                                                            @method('POST')
                                                            <button type="submit"  class="btn btn-success btn-sm ms-auto ">valider société</button>
                                                                        
                                                                        
                                                        </form>
                                                    
                                                @else

                                                <a href='societes/{{$societe->id}}'>
                                                    <button  class="btn btn-secondary btn-sm ms-auto">Modifier </button>
                                                </a>
                                                {{-- <p class="text-sm font-weight-bold mb-0">Edit</p> --}}
                                            
                                                {{-- <p class="text-sm font-weight-bold mb-0 ps-2">Delete</p> --}}
                                                {{-- <a href = "{{ route('stages.delete', $id) }}">
                                                    <button  class="btn btn-secondary btn-sm ms-auto">Supprimer stage</button>
                                                </a> --}}

                                                <form method="post"  action="{{ route('societes.delete', $societe->id) }}" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm ms-auto ">supprimer</button>
                                                </form> 
                                            @endif
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    {{-- @empty
                                    <p>No replies</p> --}}
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @else

            <div class="card mb-4">
                
                <div class="card-header pb-0">
                    
                        <h6>Les sociétés proposées </h6>
                    
                
                </div>
        
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Telephone </th>
                            
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Adresse </th>
                            
                            
                            
                            

                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $societes as $societe )
                                
                        
                                
                            <tr>
                                
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{$societe->nom}}</p>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{$societe->telephone}}</p>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{$societe->adresse}}</p>
                                </td>
                            
                            
                                
                            
                                <td class="align-middle text-end">
                                    <div class="d-flex px-3 py-1 justify-content-center align-items-center">


                                        @if ($societe->validation_state == 'not yet validated by the admin')


                                                <form method="post" action="{{ route('societes.validation', $societe->id) }}">
                                                                
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit"  class="btn btn-success btn-sm ms-auto ">valider société</button>
                                                                
                                                                
                                                </form>
                                            
                                        @else

                                        <a href='societes/{{$societe->id}}'>
                                            <button  class="btn btn-secondary btn-sm ms-auto">Modifier </button>
                                        </a>
                                        {{-- <p class="text-sm font-weight-bold mb-0">Edit</p> --}}
                                    
                                        {{-- <p class="text-sm font-weight-bold mb-0 ps-2">Delete</p> --}}
                                        {{-- <a href = "{{ route('stages.delete', $id) }}">
                                            <button  class="btn btn-secondary btn-sm ms-auto">Supprimer stage</button>
                                        </a> --}}

                                        <form method="post"  action="{{ route('societes.delete', $societe->id) }}" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm ms-auto ">supprimer</button>
                                        </form> 
                                    @endif
                                    </div>
                                </td>
                                
                            </tr>
                            {{-- @empty
                            <p>No replies</p> --}}
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

            @endif
        </div>
    </div>
@endsection
