@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  
    @include('layouts.navbars.auth.topnav', ['title' => 'Modifier un rapport'])
  
    <div id="alert">
        @include('components.alert')
    </div>
 
    {{-- les infos du rapport --}}
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
                   
                    <form role="form" method="POST" action={{ route('rapports.update' , $rapport->id) }} enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">


                                <div class="d-flex align-items-center">
                                    <p class="mb-0">Modifier le dépot du rapport</p>
                                    {{-- {{$rapport}} --}}
                                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Modifier</button>
                                </div>
                                
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Les informations du rapport à modifier</p>
                            <div class="row">
                              
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Titre</label>
                                        <input class="form-control" type="text" name="titre"  value="{{old('titre', $rapport->titre)}}">
                                    </div>
                                </div>
                             
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Fichier (Pdf/ Word)</label>
                                       
                                           
                                        <input class="form-control" type="file" name="filePath">

                                                @if ($rapport->filePath)
                                                    <div class="form-group">
                                                        <p> Télécharger Le fichier actuel:</p> 
                                                            <a href="/download/{{$rapport?->filePath}}"  >
                                                                <button type="button" class="btn" style="background-color: rgb(230, 228, 215)"><i class="fa fa-download"></i></button>
                                                            </a>

                                                            

                                                    </div>     
                                                @endif
                                        
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Sujet</label>
                                        <input class="form-control" type="text" disabled name="stage_id" value="{{$stage_a_deposer_rapport->sujet}}">
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
