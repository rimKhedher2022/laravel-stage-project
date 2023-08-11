@extends('layouts.app')

@section('content')
 
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Réinitialiser votre mot de passe</h4>
                                    <p class="mb-0">Entrez votre email et attendez quelques secondes</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{ route('reset.perform') }}">
                                        @csrf
                                        @method('post')
                                        <div class="flex flex-col mb-3">
                                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" value="{{ old('email') }}" aria-label="Email">
                                            @error('email') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                        </div>
                                        <div class="text-center">
                                            {{-- <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Send Reset Link</button> --}}
                                            <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Envoyer le lien de réinitialisation</button>
                                            
                                        </div>
                                    </form>
                                </div>
                                <div id="alert">
                                    @include('components.alert')
                                </div>
                            </div>
                        </div>
                        <div
                        {{-- <img  src="{{ asset('./img/logo.png') }}" style="width:60px " > --}}
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('{{ asset('./img/final4.png') }}');
                                width:500px">
                              
                               
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
