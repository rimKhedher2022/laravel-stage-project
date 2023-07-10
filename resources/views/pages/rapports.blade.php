@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Rapports'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
          
            <div class="card mb-4">
                <div class="card-header pb-0">
                    
                        <h6>rapports</h6>
                       
                      
                        @if ($aujourdui < $session_actuel->date_debut || $aujourdui > $session_actuel->date_fin )
                         {{-- condition de fermeture de la session --}}
                            <h6>La session est fermée</h6>
                           
                        @else
                            <h6>La session est ouverte , vous pouvez déposer ou modifier le rapport </h6>
                            de {{$session_actuel->date_debut}} à {{$session_actuel->date_fin}}
                        @endif   
                            
                     
                    {{-- {{ }}
                    {{ $session_actuel->date_fin}} --}}
                   
                       
                       
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                   
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Titre</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sujet</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> filePath </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">date_depot </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Message </th>
                                </tr>
                            </thead>
                            <tbody>
                        
                            @foreach ( $stages as $stage )
                                    
                                    
                                  
                              
                                <tr>
                                    
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->rapport?->titre}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->sujet}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->rapport?->filePath}}</p>
                                    </td>
                                   
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->rapport?->date_depot}}</p>

                                    </td>
                                    <td >
                                      


  {{-- pas de session ouverte / déposez le rapport / modifier /supprimer - rapport déposé // ancien stages   --}}


                                        
                                           
                                               

                                      
                                         
                                               {{-- 09/07/2023 appartient ]09/07/2023 , 10/07/2023[   --> test ok    --}} 
                                               {{-- 09/07/2023 appartient [09/07/2023 , 10/07/2023]   --> test ??    --}}
                                                  {{-- session ouverte --}} 

                                          @if (($aujourdui > $session_actuel->date_debut &&  $aujourdui < $session_actuel->date_fin) || ($aujourdui === $session_actuel->date_debut) ||  ($aujourdui === $session_actuel->date_fin)  ) 
                                              
                                        
                                                  {{-- status de stage   --}}
                                                @if (empty($stage->rapport)) 
                                                    <a href='add-rapport/{{$stage->id}}'>
                                    
                                                        <button  class="btn btn-primary btn-sm ms-auto">Déposer rapport</button>
                                                    
                                                    </a>
                                                @endif
                                                   
                                                {{-- le rapport existe déja --}}
                                                @if (!empty($stage->rapport))  
                                                        <a href='rapports/{{$stage->rapport?->id}}'>
                                                            <button  class="btn btn-secondary btn-sm ms-auto">Modifier rapport</button>
                                                        </a>
                                                    
                                                        <form method="post"  action="{{ route('rapports.delete', $stage->rapport?->id) }}" >
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm ms-auto ">supprimer</button>
                                                        </form>
                                                @endif
                                             @endif
                                        </div>
                                    </td>


                                    <td>

                                                @if ($aujourdui < $session_actuel->date_debut) 
                                                    
                                                        
                                                            
                                                    
                                                @if (empty($stage->rapport) )
                                                
    
                                                
                                                <p style="color:blue">pas de session ouverte</p>
                                                    
                                                @else
                                                     <p style="color: green">rapport déposé</p>
                                                            
                                                @endif
                                                            
                                 

                                     
                                     
                                        
                                              
                                            {{-- si la session a fini  ou bien   --}}
                                                    @elseif ($aujourdui > $session_actuel->date_fin )   
                                                            @if (empty($stage->rapport) )
                                                                
                            
                                                                <p style="color:blue">pas de session ouverte</p>
                                                                

                                                            @else

                                                        <p style="color: green">rapport déposé</p>
                                                    
                                                    
                                                    @endif


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
