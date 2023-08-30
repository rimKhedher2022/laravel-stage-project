@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
  
    @include('layouts.navbars.auth.topnav', ['title' => 'affecter stage'])
  
    <div id="alert">
        @include('components.alert')
    </div>
 
   
  

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form role="form" method="POST" action={{ route('stages.affecter' , $stage->id) }} enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">


                                <div class="d-flex align-items-center">
                                    <p class="mb-0">Affecter un stage avec un rapport déposé</p>
                                    {{-- {{$stage}} --}}
                                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Affecter</button>
                                </div>
                                
                        </div>
                        <div class="card-body">
                        
                           
                              
                                       
                                   
                            
                            {{-- <p class="text-uppercase text-sm">Les informations du stage à saisir l'enseignant</p> --}}
                            <div class="row">
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">sujet</label>
                                        <input class="form-control" type="text" name="sujet" disabled value="{{old('sujet', $stage->sujet)}}">
                                    </div>
                                </div>
                                
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="enseignant_id">Enseignant:</label>
                                            <select name="enseignant_id"  id="enseignant_id" class="form-control">
                                                <option value="0">---choix enseignant ---</option>
                                                        @foreach ($enseignants as $enseignant) 
                                                             <option value="{{$enseignant->id}}" {{ old('enseignant_id',$enseignant->id ) == $enseignant_responsable?->id ? 'selected' : '' }}> {{$enseignant->user->nom }} {{ $enseignant->user->prenom }}  </option>
                                                        @endforeach
                                            </select>
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

{{-- Lorsqu'un étudiant réalise un stage PFE (Projet de Fin d'Études), différents enseignants peuvent être 
impliqués dans le processus de validation du stage. Les grades des enseignants varient généralement en fonction du 
niveau d'implication dans la supervision et l'évaluation du stage. Voici les grades courants des enseignants qui 
pourraient être impliqués dans la validation d'un stage PFE :

1. **Enseignant-Encadrant du Stage (Maître de Stage) :**
   Cet enseignant est responsable de superviser directement le déroulement du stage de l'étudiant.
    Il est généralement affilié à l'établissement d'enseignement où l'étudiant réalise son stage. 
    Le rôle de l'enseignant-encadrant est d'aider l'étudiant dans la réalisation du projet, 
    de lui fournir des conseils techniques et méthodologiques, et de suivre régulièrement l'avancement du travail.

2. **Enseignant-Responsable de la Formation :**
   Il s'agit d'un enseignant ou d'un responsable pédagogique qui est chargé de coordonner les activités
    liées aux stages au sein de l'établissement d'enseignement. Cet enseignant peut être impliqué dans 
    l'approbation préalable du sujet de stage, de la convention de stage, et il peut jouer un rôle de suivi global 
    pour s'assurer que le stage respecte les exigences académiques.

3. **Enseignant-Examinateur :**
   Cet enseignant peut être impliqué dans l'évaluation finale du rapport de stage et/ou 
   de la présentation orale. Son rôle est d'évaluer la qualité du travail réalisé par l'étudiant et 
   de déterminer si les objectifs du stage ont été atteints.

4. **Enseignant-Rapporteur du Jury :**
   Dans certaines universités ou établissements, un enseignant-rapporteur
    est désigné pour présider le jury de soutenance du stage. Il a pour mission de
     présider la séance de soutenance, de coordonner les délibérations du jury et de rédiger un rapport de soutenance.

5. **Enseignant-Invité :**
   Selon le sujet ou la spécificité du stage, des enseignants
    extérieurs à l'établissement peuvent être invités à participer au jury de soutenance. 
    Ils apportent un regard externe et une expertise particulière dans le domaine du projet.

Il est important de noter que les grades et les titres des enseignants peuvent varier en fonction des établissements et des pays. Les rôles exacts de chaque enseignant peuvent également différer en fonction des pratiques spécifiques de chaque université ou école. Dans tous les cas, l'objectif principal est d'assurer une évaluation équitable et impartiale du travail de l'étudiant tout au long du processus de stage PFE. --}}