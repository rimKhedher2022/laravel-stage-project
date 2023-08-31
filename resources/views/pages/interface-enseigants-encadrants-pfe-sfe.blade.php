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
                  
                  
                        <h6>Stages PFE / SFE</h6>
                              
                                   
                       
                   
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                      
                           
                     
                        {{-- enseignant --}}
                            <table class="table align-items-center">
                                <thead>
                                    <tr>

                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            sujet</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            etudiant</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            date soutenance</th>




                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-50">
                                            Action </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-50">
                                            Role </th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stages as $stage)
                                   


                                        <tr>

                                           
                                           
                                            <td class="text-sm font-weight-bold mb-0">
                                                <p class="text-sm font-weight-bold mb-0">{{ $stage->sujet }}</p>
                                            </td>
                                          
                                            <td class="text-sm font-weight-bold mb-0"> 

                                                @foreach ($stage->etudiants as $etudiant )
                                                <p class="text-sm font-weight-bold mb-0"> {{ $etudiant->user->nom }}  {{ $etudiant->user->prenom }} </p>
                                                @endforeach
                                               
                                                
                                            </td>
                                            <td class="text-sm font-weight-bold mb-0">
                                                <p class="text-sm font-weight-bold mb-0">{{ $stage->date_soutenance }}</p>
                                            </td>
                                          
                                            
                                            <td class="align-middle text-center text-sm">

                                              

                                               
                                                  
                                                      
                                                     

                                                    @if ($stage->etat=='affecté à un encadrant' || $stage->etat=='affecté aux encadrants' || $stage->etat=='rapport vérifié et corrigé' || $stage->etat=='affecté aux jurys'  || $stage->etat=='validé' )
                                                    
                                                            <a href="/plusinfo/stages/{{ $stage->id }}">
                                                                <button class="btn"  style="background-color: rgb(157, 252, 144)">Plus d'info</button>
                                                            </a>

                                                            <br>
                                                            <a href="/download/{{ $stage->rapport?->filePath }}">
                                                                <button class="btn"
                                                                    style="background-color: rgb(230, 228, 215)"><i
                                                                        class="fa fa-download"></i></button>
                                                               

                                                            </a>
                                                    @endif

                                                    @if ($stage->etat=='rapport déposé')
                                                 
                                                            <form method="post"
                                                                action="{{ route('rapport.valider', $stage->rapport->id) }}">
                                                                @csrf
                                                                @method('POST')
                                                                <button type="submit"
                                                                    class="btn btn-success btn-sm ms-auto ">Valider rapport</button>
                                                                
                                                            </form>

                                                            <a href="/add-message/{{ $stage->id }}">
                                                                <button class="btn"
                                                                    style="background-color: rgb(230, 228, 215)">Demander correction</button>
                                                                    

                                                            </a>

                                                            <a href="/download/{{ $stage->rapport?->filePath }}">
                                                                <button class="btn"
                                                                    style="background-color: rgb(230, 228, 215)"><i
                                                                        class="fa fa-download"></i></button>
                                                               

                                                            </a>
                                                    @endif            
                                                 


                                                        

                                                        
                                                  

                                                  
                                                
                                                           


                                                {{-- @endif --}}
                                            </td>
                                            <td class="align-middle text-center text-sm">

                                              

                                               
                                                  
                                                      
                                                     

                                                       
                                                    
                                                @foreach ($stage->enseignants as $enseignant) 
                                                        @if ($enseignant->user_id === auth()->user()->id) 
                                                                {{ $enseignant->pivot->role}}
                                                        @endif        
    
                                                @endforeach

                                                 


                                                        

                                                        
                                                  

                                                  
                                                
                                                           


                                                {{-- @endif --}}
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
