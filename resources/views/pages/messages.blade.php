@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Messages'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
          
            <div class="card mb-4">
               
                <div class="card-header pb-0">
                
                            <h6>Messages envoyés aux stagiaires</h6>
                        
                </div>

        
               
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">titre</th>
                                   
                                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">description</th>
                                  
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">etudiant_contacté </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">sujet concerné du message </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action </th>
                              
                                
                                </tr>
                            </thead>
                            <tbody>
                              

                                @foreach ($messages as $message )
                                    
                               
                                   {{-- policy  --}}
                              
                                <tr>
                                    
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$message->titre}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm mb-0">{{$message->description}}</p>
                                    </td>
                                   
                                    <td>
                                         @foreach ( $message->stage->etudiants as $etudiant )
                                            <p class="text-sm font-weight-bold mb-0">{{$etudiant->user->nom}} {{$etudiant->user->prenom}}</p>
                                        @endforeach
                                    </td>
                                    <td>
                                        
                                            <p class="text-sm font-weight-bold mb-0">{{$message->stage->sujet}}</p>
                                      
                                    </td>
                                    <td >
                                       
                                            
{{--                                             
                                                <a href='messages/{{$message->id}}'>
                                                    <button  class="btn btn-secondary btn-sm ms-auto text-wrap" style="width: 9rem;">Modifier message</button>
                                                </a> --}}
                                             
                                                <form method="post"  action="{{ route('messages.delete', $message->id) }}" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm ms-auto">supprimer</button>
                                                </form>
                                          
                                      
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
