@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Rapports'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
          
            <div class="card mb-4">
                <div class="card-header pb-0">
                    
                        <h6>rapports</h6>
                        <a href='add-rapport'>
                    
                            <button  class="btn btn-primary btn-sm ms-auto">Déposer rapport</button>
                          
                        </a>
                  
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Titre</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> filePath </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">date_depot </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action </th>
                                </tr>
                            </thead>
                            <tbody>
                        
                                @foreach ( $stages as $stage )
                                @if ($stage->rapport)
                                    
                              
                                <tr>
                                    
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->rapport?->titre}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->rapport?->filePath}}</p>
                                    </td>
                                   
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$stage->rapport?->date_depot}}</p>
                                    </td>
                                    <td >
                                        <div class="d-flex px-3 py-1 align-items-center">
                                          
                                                <a href='rapports/{{$stage->rapport?->id}}'>
                                                    <button  class="btn btn-secondary btn-sm ms-auto">Modifier rapport</button>
                                                </a>
                                              
                                                <form method="post"  action="" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm ms-auto ">supprimer</button>
                                                </form>
                                            
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
