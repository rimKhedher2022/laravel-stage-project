@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  
    @include('layouts.navbars.auth.topnav', ['title' => 'Remplir la base de données'])
  
   <div id="alert">
        @include('components.alert')
    </div> 
    
  

    <div class="container-fluid py-4">
       

     

        <div class="row">
            <div class="col-md-8">

                @if ($errors->any())
                <div class="alert alert-secondary">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color: rgba(247, 247, 247, 0.938)">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                @endif
                <div class="card">
                    
                    <form role="form" method="POST"  action="{{ route('data.import') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">



                        </div>
                        <div class="card-body">

                            {{-- <p class="text-uppercase text-sm">Les informations du stage à saisir date soutenance</p> --}}
                            <div class="row">

                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Etudiants / Enseignants</label>
                                        <select name="user" id="user" class="form-control">
                                            <option value="etudiant">etudiant</option>
                                            <option value="enseignant">enseignant</option>
                                        </select>
                                    </div>
                                </div>
                                 --}}
                                 <label for="example-text-input" class="form-control-label">Remplir la base de données par les utilisateurs de l'année scolaire: </label>

                                <div class="col-md-6">
                                    <div class="form-group">
                                       
                                        <input class="form-control" type="text" name="annee" placeholder="exemple:2022-2023">
                                    </div>


                                   
                                </div>


                                
                                <div class="d-flex align-items-center">
                                    {{-- <p class="mb-0">choix année scolaire</p> --}}
                                    <input type="file" name="csv_file" accept=".csv">
                                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Remplir avec CSV</button>

                                    {{-- {{$stage}} --}}
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
