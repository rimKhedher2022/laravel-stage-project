@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  
    @include('layouts.navbars.auth.topnav', ['title' => 'Modifier un user'])
  
    <div id="alert">
        @include('components.alert')
    </div>
 
    {{-- les infos du user --}}
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form role="form" method="POST" action={{ route('users.update' , $user->id) }} enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">


                                <div class="d-flex align-items-center">
                                    <p class="mb-0">Modifier une user</p>
                                    {{-- {{$user}} --}}
                                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                                </div>
                                
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Les informations du user à modifier</p>
                            <div class="row">
                            

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">nom</label>
                                        <input class="form-control" type="text" name="nom"  value="{{old('nom', $user->nom)}}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">prenom</label>
                                        <input class="form-control" type="text" name="prenom"  value="{{old('prenom', $user->prenom)}}">
                                    </div>
                                </div>
                             
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">email</label>
                                        <input class="form-control" type="text" name="email"  value="{{old('email', $user->email)}}">
                                    </div>
                                </div>

                              
                                @if ($user->role->value === 'etudiant')

                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">cin</label>
                                        <input class="form-control" type="text" name="cin"  value="{{old('cin', $user->etudiant->cin)}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">niveau</label>
                                        <input class="form-control" type="text" name="niveau"  value="{{old('niveau', $user->etudiant->niveau)}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">specialite</label>
                                        <input class="form-control" type="text" name="specialite"  value="{{old('specialite', $user->etudiant->specialite)}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">numero_inscription</label>
                                        <input class="form-control" type="text" name="numero_inscription"  value="{{old('numero_inscription', $user->etudiant->numero_inscription)}}">
                                    </div>
                                </div>
                               

                            @elseif ($user->role->value === 'enseignant')
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">matricule</label>
                                            <input class="form-control" type="text" name="matricule"  value="{{old('matricule', $user->enseignant?->matricule)}}">
                                        </div>
                                    </div>
                           

                            @endif
                             

                               
                              
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
                
                </div>
            </div>
          
        </div>
        {{-- @include('layouts.footers.auth.footer') --}}
    </div>
    
@endsection
