@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Modifier une société'])
  
    <div id="alert">
        @include('components.alert')
    </div>
    {{-- les infos du stage --}}
    <div class="container-fluid py-4">
        @if ($errors->any())
            <div class="alert alert-secondary">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color: rgba(247, 247, 247, 0.938)">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form role="form" method="POST" action={{ route('societes.update' , $societe->id) }} enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">


                                <div class="d-flex align-items-center">
                                    <p class="mb-0">Modifier une société</p>
                                    {{-- {{$stage}} --}}
                                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                                </div>
                                
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Les informations de stage</p>
                            <div class="row">
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label" >type</label>
                                        <input class="form-control" type="text" name="type" value="{{old('type', $stage->type)}}">
                                    </div>
                                </div> --}}
                    

                                

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">nom</label>
                                        <input class="form-control" type="text" name="nom"  value="{{old('nom', $societe->nom)}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">telephone</label>
                                        <input class="form-control" type="text" name="telephone"  value="{{old('telephone', $societe->telephone)}}">
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">adresse</label>
                                        <input class="form-control" type="text" name="adresse"  value="{{old('adresse', $societe->adresse)}}" >
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
