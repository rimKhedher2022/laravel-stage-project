@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  
    @include('layouts.navbars.auth.topnav', ['title' => 'Ajouter dates soutenances'])
  
    <div id="alert">
        @include('components.alert')
    </div>
 
   
  

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    @if ($stage->type == 'ouvrier' || $stage->type == 'technicien' )
                        
                    
                    <form role="form" method="POST" action={{ route('stages.soutenance' , $stage->id) }} enctype="multipart/form-data">

                        @elseif ($stage->type == 'pfe' || $stage->type == 'sfe' )

                    <form role="form" method="POST" action={{ route('stages.soutenance.pfe' , $stage->id) }} enctype="multipart/form-data">

                        @endif
                        @csrf
                        <div class="card-header pb-0">


                                <div class="d-flex align-items-center">
                                    <p class="mb-0">Choix date soutenance</p>
                                    {{-- {{$stage}} --}}
                                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Enregistrer</button>
                                </div>
                                
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Les informations du stage à saisir date soutenance</p>
                            <div class="row">
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">sujet</label>
                                        <input class="form-control" type="text" name="sujet" disabled value="{{old('sujet', $stage->sujet)}}">
                                    </div>
                                </div>
                                
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">date soutenance</label>
                                        <input class="form-control" type="date" name="date_soutenance" value="{{$stage->date_soutenance}}">
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
                    </form>
                   
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
