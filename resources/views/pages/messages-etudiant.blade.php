@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'messages'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
          
            <div class="card mb-4">
               
                <div class="card-header pb-0">
                   
                        
                        
                        {{-- @elseif (auth()->user()->role->value === 'etudiant') --}}

                                <h6>Messages de rappels reçus</h6>

                        {{-- @endif --}}
                  
                </div>


              

            
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                 
                                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Messages</th>
                                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Sujet Stage </th>
                                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date de resception </th>
                                    
                                </tr>
                                
                                 
                                    
                                    
                               
                               
                            </thead>
                            <tbody>
                              

                                @foreach ( $stages_etudiant as $stage )
                                     
                                    @foreach ($stage->messages as $message )
                                        
                                  
                                    {{-- @if ($message->stage->etudiants[0]->id == auth()->user()->etudiant->id) --}}
                                            <tr>
                                                <td class="text-sm font-weight-bold mb-0"> {{$message->description}}</td> 
                                                <td class="text-sm font-weight-bold mb-0"> {{$message->stage->sujet}}</td> 
                                                <td class="text-sm font-weight-bold mb-0">{{$message->created_at->format('Y-m-d')}}</td> 
                                            </tr>
                                    {{-- @endif --}}
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
@endsection
