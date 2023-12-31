@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Sessions'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
          
            <div class="card mb-4">
                <div class="card-header pb-0">
                    
                        <h6>Sessions</h6>
                        <a href='add-session'>
                    
                            <button  class="btn btn-primary btn-sm ms-auto">Ouvrir session</button>
                          
                        </a>
                  
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom administateur</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> date debut </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">date fin </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">État </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action </th>
                              
                                
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ( $sessions as $session )
                                   {{-- policy  --}}
                              
                                <tr>
                                    
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$session->user->nom}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$session->type_stage}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$session->date_debut}}</p>
                                    </td>
                                   
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$session->date_fin}}</p>
                                    </td>
                                    <td>
                                        @if (($aujourdui < $session->date_debut) || ($aujourdui >= $session->date_fin ))
                                            <p class="text-sm font-weight-bold mb-0" style="color:rgb(248, 48, 48)">Fermée</p>
                                        @else
                                           <p class="text-sm font-weight-bold mb-0" style="color:rgb(32, 105, 56)">Ouverte</p>
                                        @endif
                                    </td>
                                    <td >
                                        <div class="d-flex px-3 py-1 align-items-center">
                                          
                                                <a href='sessions/{{$session->id}}'>
                                                    <button  class="btn btn-secondary btn-sm ms-auto">Modifier</button>
                                                </a>
                                              
                                                <form method="post"  action="{{ route('sessions.delete', $session->id) }}" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm ms-auto ">Supprimer</button>
                                                </form>
                                            
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
