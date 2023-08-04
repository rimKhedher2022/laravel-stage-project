
@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  
    @include('layouts.navbars.auth.topnav', ['title' => 'ajouter message'])
  
    <div id="alert">
        @include('components.alert')
    </div>
 
   
  

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form role="form" method="POST" action={{ route('message.send' , $stage_a_envoyer_message->id) }} enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">


                                <div class="d-flex align-items-center">
                                    <p class="mb-0">Envoyer un message de correction au stagiaire :</p>
                                    {{-- {{$stage}} --}}
                                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Envoyer</button>
                                </div>
                                
                        </div>
                        <div class="card-body">
                            {{-- <p class="text-uppercase text-sm">Message:</p> --}}
                            <div class="row">
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">sujet</label>
                                        <input class="form-control" type="text" name="sujet" disabled value="{{old('sujet', $stage_a_envoyer_message->sujet)}}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Message</label>
                                        {{-- <input class="form-control" type="text" name="description" > --}}
                                        <textarea class="form-control" name="description" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                
                               
                                
                            </div>
                            
                        </div>
                    </form>
                   
                 
          
                
                </div>
            </div>
          
        </div>
        {{-- @include('layouts.footers.auth.footer') --}}
    </div>
    
   
@endsection
