@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'User Management'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
           
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Users</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">nom</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">prenom
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        email
                                    </th>
                                  
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        role
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $users as $user )
                                    
                                <tr>
                                    
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$user->nom}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$user->prenom}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$user->email}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$user->role}}</p>
                                    </td>
                                   
                                    <td class="align-middle text-end">
                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                           
                                                <a href=''>
                                                    <button  class="btn btn-secondary btn-sm ms-auto">Modifier </button>
                                                </a>
                                                {{-- <p class="text-sm font-weight-bold mb-0">Edit</p> --}}
                                            
                                                {{-- <p class="text-sm font-weight-bold mb-0 ps-2">Delete</p> --}}
                                                {{-- <a href = "{{ route('stages.delete', $stage->id) }}">
                                                    <button  class="btn btn-secondary btn-sm ms-auto">Supprimer stage</button>
                                                </a> --}}

                                                <form method="post"  action="" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm ms-auto ">supprimer</button>
                                                </form>
                                            

                                          
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
