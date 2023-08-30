@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  
    @include('layouts.navbars.auth.topnav', ['title' => 'Informations concernant le stage'])
  
    <div id="alert">
        @include('components.alert')
    </div>
    {{-- @if(auth()->user()->role->value === 'etudiant') --}}
    {{-- les infos du stage --}}
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    {{-- <form role="form" method="POST" enctype="multipart/form-data"> --}}
                        @csrf
                        <div class="card-header pb-0">


                               
                                
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Les informations du stage </p>
                            <div class="row">
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label" >type</label>
                                        <input class="form-control" type="text" name="type" value="{{old('type', $stage->type)}}">
                                    </div>
                                </div> --}}
                    

                                <div class="col-md-6">
                                    <div class="form-group">
                                        
                                        <label for="type">Type:</label>
                                        <p>{{$stage->type}}</p>
                                          
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Sujet : </label>
                                        <p>{{$stage->sujet}}</p>
                                        {{-- <input class="form-control" type="text" name="sujet"  value="{{old('sujet', $stage->sujet)}}"> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Date debut :</label>
                                        <p>{{$stage->date_debut}}</p>
                                        {{-- <input class="form-control" type="date" name="date_debut"  value="{{old('date_debut', $stage->date_debut)}}"> --}}
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Date fin :</label>
                                        <p>{{$stage->date_fin}}</p>
                                        {{-- <input class="form-control" type="date" name="date_fin"  value="{{old('date_fin', $stage->date_fin)}}" > --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">État : </label>
                                        <p>{{$stage->etat}}</p>
                                        {{-- <input class="form-control" type="date" name="date_fin"  value="{{old('date_fin', $stage->date_fin)}}" > --}}
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        
                                        <label for="societe_id">Société :</label>
                                          
                                            
                                             
                                                     <p >{{ $stage->societe->nom }} {{ $stage->societe->ville }}</p>
                                                    
                                             
                                           
                                    </div>
                                </div>
                               
                             
                               
                               

                              

                                <div class="col-md-6">
                                    <div class="form-group">
                                        
                                        <label for="etudiant_id">Etudiant(s):</label>
                                        <p>
                                            @foreach ($stage->etudiants as $etudiant )
                                            {{$etudiant->user->nom}}  {{$etudiant->user->prenom}}  
                                            @endforeach

                                        </p>
                                       
                                           
                                    </div>
                                </div>
                               

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Date de soutenance : </label>
                                        <p style="color: rgb(3, 104, 65); ">{{$stage->date_soutenance}}</p>
                                        {{-- <input class="form-control" type="date" name="date_fin"  value="{{old('date_fin', $stage->date_fin)}}" > --}}
                                    </div>
                                </div>
                               
                            </div>
                            {{-- <hr class="horizontal dark"> --}}
                            {{-- <p class="text-uppercase text-sm">Contact Information</p> --}}
                            {{-- <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Address</label>
                                        <input class="form-control" type="text" name="address"
                                            value="{{ old('address', auth()->user()->address) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">City</label>
                                        <input class="form-control" type="text" name="city" value="{{ old('city', auth()->user()->city) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Country</label>
                                        <input class="form-control" type="text" name="country" value="{{ old('country', auth()->user()->country) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Postal code</label>
                                        <input class="form-control" type="text" name="postal" value="{{ old('postal', auth()->user()->postal) }}">
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">About me</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">About me</label>
                                        <input class="form-control" type="text" name="about"
                                            value="{{ old('about', auth()->user()->about) }}">
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    {{-- </form> --}}
                   
                    {{-- le binome  --}}
                  {{-- @foreach ( $etudiants_stage as  $etudiant_stage)
                  
                
                        @if ($id_auth !== $etudiant_stage->id )
                        l' id de ton binome est  :  {{$etudiant_stage ->id}}
                        <br/>
                        le nom de ton binome est  : {{$etudiant_stage ->user->nom}} 

                        @endif
                  
                  @endforeach --}}



          
          
                
                </div>
            </div>
          
        </div>
        {{-- @include('layouts.footers.auth.footer') --}}
    </div>
  

   
    
   
@endsection
