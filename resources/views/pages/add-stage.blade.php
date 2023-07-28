@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Ajouter un stage'])
  
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



                      
                    <form role="form" method="POST" action="{{ route('stage.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">

                                <div class="d-flex align-items-center">
                                    <p class="mb-0">Ajouter un stage</p>
                                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Enregistrer</button>
                                </div>
                                
                        </div>
                      
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Les informations du stage</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        
                                        <label for="type">type:</label>
                                            <select name="type" id="type" class="form-control">

                                                <option value="ouvrier">ouvrier</option>
                                                <option value="technicien">technicien</option>
                                                <option value="pfe">PFE</option>
                                                <option value="pfe">SFE</option>

                                            </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">sujet</label>
                                        <input class="form-control" type="text" name="sujet" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">date debut</label>
                                        <input class="form-control" type="date" name="date_debut" >
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">date fin</label>
                                        <input class="form-control" type="date" name="date_fin" >
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                     
                                        <label for="societe_id">societe:</label>
                                        {{-- {{ dd($societes) }} --}}
                                        <a href='add-societe'>
                                            <button  type="button" class="btn btn-primary btn-sm ms-auto">proposer société</button>
                                        </a>
                                

                                            <select name="societe_id" id="societe_id" class="form-control">
                                                <option value="">---choix societe ---</option>
                                                @foreach ($societes as $societe)
                                              
                                                     <option  value="{{$societe->id}}">{{ $societe->nom }} </option>
                                                   
                                                @endforeach
                                                
                                            </select>
                                            
                                    </div>
                                </div>
                               
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">etat</label>
                                        <input class="form-control" type="etat" name="etat">
                                    </div>
                                </div> --}}
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">nom binome</label>
                                        <input class="form-control" type="etat" name="etat" >
                                    </div>
                                </div> --}}
                               

                                
                                
                               
                               
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
