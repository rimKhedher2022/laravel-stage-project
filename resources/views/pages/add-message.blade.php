
@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  
    @include('layouts.navbars.auth.topnav', ['title' => 'Demande de correction :'])
  
    <div id="alert">
        @include('components.alert')
    </div>
 

   
  

    <div class="container-fluid py-4">

                @if (session('message'))
                    <div class="alert alert-success" style="color: rgb(8, 2, 59)">{{ session('message') }}</div>
                @endif

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
                    <form role="form" method="POST" action={{ route('message.send' , $stage_a_envoyer_message->id) }} enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">


                                <div class="d-flex align-items-center">
                                    <p class="mb-0">Demande de correction :</p>
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
