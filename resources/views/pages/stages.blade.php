@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Stages'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
          
            <div class="card mb-4">
                <div class="card-header pb-0">
                    
                        <h6>Stages</h6>
                        <a href='add-stage'>
                            <button  class="btn btn-primary btn-sm ms-auto">Ajouter stage</button>
                        </a>
                
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> date debut </th>
                                   
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">date_fin </th>
                                   
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">sujet </th>
                                   
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        etat</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        date_soutenance</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        societe_id 
                                    </th>
                                    
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $stages as $stage )
                                    
                                <tr>
                                    
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->type}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->date_debut}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->date_fin}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->sujet}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->etat}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->date_soutenance}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->societe_id}}</p>
                                    </td>
                                    <td class="align-middle text-end">
                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">

                                            <a href='stages/{{$stage->id}}'>
                                                <button  class="btn btn-primary btn-sm ms-auto">Modifier stage</button>
                                            </a>
                                             {{-- <p class="text-sm font-weight-bold mb-0">Edit</p> --}}
                                           
                                            {{-- <p class="text-sm font-weight-bold mb-0 ps-2">Delete</p> --}}
                                            <a href ="">
                                                <button  class="btn btn-secondary btn-sm ms-auto">Supprimer stage</button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
