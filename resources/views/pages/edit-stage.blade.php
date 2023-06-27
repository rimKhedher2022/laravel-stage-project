@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Ajouter un stage'])
  
    <div id="alert">
        @include('components.alert')
    </div>
    {{-- les infos du stage --}}
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form role="form" method="POST" action={{ route('stages.update',$stage->id )}} enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
{{-- liste types des stages  --}}
{{-- // liste 3 choix --}}
{{-- ajouter un champs de liste des etudiants / kima societes --}} 

                                <div class="d-flex align-items-center">
                                    <p class="mb-0">Ajouter un stage</p>
                                    {{-- {{$stage}} --}}
                                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                                </div>
                                
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Les informations de stage</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label" >type</label>
                                        <input class="form-control" type="text" name="type" value="{{old('type', $stage->type)}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">sujet</label>
                                        <input class="form-control" type="text" name="sujet"  value="{{old('sujet', $stage->sujet)}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">date debut</label>
                                        <input class="form-control" type="date" name="date_debut"  value="{{old('date_debut', $stage->date_debut)}}">
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">date fin</label>
                                        <input class="form-control" type="date" name="date_fin"  value="{{old('date_fin', $stage->date_fin)}}" >
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{-- <label for="example-text-input" class="form-control-label">societe_id</label>
                                        <input class="form-control" type="societe_id" name="societe_id" value="{{ old('societe_id', auth()->user()->societe_id) }}"> --}}
                                        <label for="societe_id">societe:</label>
                                            <select name="societe_id" id="societe_id" class="form-control">
                                                <option value="">---choix societe ---</option>
                                                @foreach ($societes as $societe)
                                                     <option  value="{{$societe->id}}" {{ old('societe_id',$stage->societe_id) == $societe->id ? 'selected' : '' }} >{{ $societe->nom }}</option>
                                                    
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">etat</label>
                                        <input class="form-control" type="etat" name="etat"  value="{{old('etat', $stage->etat)}}">
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">nom binome</label>
                                        <input class="form-control" type="etat" name="etat" >
                                    </div>
                                </div> --}}
                               

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">date soutenance</label>
                                        <input class="form-control" type="date" name="date_soutenance" value="{{old('date_soutenance', $stage->date_soutenance)}}">
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
                </div>
            </div>
          
        </div>
        {{-- @include('layouts.footers.auth.footer') --}}
    </div>
@endsection
