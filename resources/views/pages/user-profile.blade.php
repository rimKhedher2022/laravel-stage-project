@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Votre Profil'])

    {{-- @foreach(auth()->user()->unreadNotifications as $notification)
        @include('notifications.' . snake_case(class_basename($notification->type)))
    @endforeach --}}

    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        {{-- {{auth()->user()->image}} --}}
                        <img src="{{ asset('/img' . '/' . Auth::user()->image) }}" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ auth()->user()->nom ?? 'Firstname' }} {{ auth()->user()->prenom ?? 'Lastname' }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ auth()->user()->role }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4">
        <div class="row ">
            <div class="col-md-8 card" style="margin-left:20px">
                <div class="card">
                    <form role="form" method="POST" action={{ route('profile.update', auth()->user()->id) }} enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Modifier le profil</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Modifier</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Vos Informations</p>
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nom</label>
                                        <input class="form-control" type="text" name="nom"
                                            value="{{ old('nom', auth()->user()->nom) }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Prénom</label>
                                        <input class="form-control" type="text" name="prenom"
                                            value="{{ old('prenom', auth()->user()->prenom) }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email </label>
                                        <input class="form-control" type="email" name="email"
                                            value="{{ old('email', auth()->user()->email) }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Photo de profile </label>
                                        <input class="form-control" type="file" name="image">
                                    </div>
                                </div>


                                @if ($user->role->value === 'etudiant')
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Cin</label>
                                                <input class="form-control" type="text" name="cin"
                                                    value="{{ old('cin', $user->etudiant->cin) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label" >Niveau</label>
                                                <input disabled class="form-control" type="text" name="niveau"
                                                    value="{{ old('niveau', $user->etudiant->niveau) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Spécialité</label>
                                                <input disabled class="form-control" type="text" name="specialite"
                                                    value="{{ old('specialite', $user->etudiant->specialite) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input"
                                                    class="form-control-label">Numero d'inscription</label>
                                                <input class="form-control" type="text" name="numero_inscription" disabled
                                                    value="{{ old('numero_inscription', $user->etudiant->numero_inscription) }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input"
                                                    class="form-control-label">Diplôme</label>
                                                <input disabled class="form-control" type="text" name="diplôme"
                                                    value="{{ old('diplôme', $user->etudiant->diplôme) }}">
                                            </div>
                                        </div>
                                @elseif ($user->role->value === 'enseignant')
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Matricule</label>
                                            <input class="form-control" type="text" name="matricule"
                                                value="{{ old('matricule', $user->enseignant?->matricule) }}">
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
