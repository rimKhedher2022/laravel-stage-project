@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Stages'])
    <div class="row mt-4 mx-4">
        <div class="col-12">

            <div class="card mb-4">
                <div class="card-header pb-0">

                    @if (session('message'))
                        <div class="alert alert-success" style="color: rgb(8, 2, 59)">{{ session('message') }}</div>
                    @endif
                  
                       
                       
                 
                        <h6>Stages PFE/SFE à affecter aux jurys </h6>
                  
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                     
                            <table class="table align-items-center">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            date debut </th>

                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            date_fin </th>

                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            sujet </th>

                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            etat</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            date_soutenance</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            societe_id
                                        </th>


                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-50">
                                            Action </th>


                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach ($stages as $stage)
                                           
                                   
                                    
                                        <tr>
                                           
                                                  
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{ $stage->type }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{ $stage->date_debut }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{ $stage->date_fin }}</p>
                                                </td>
                                                <td class="text-sm font-weight-bold mb-0">
                                                    <p class="text-sm font-weight-bold mb-0">{{ $stage->sujet }}</p>
                                                </td>
                                                <td class="text-sm font-weight-bold mb-0">
                                                    @if ($stage->etat == 'validé')
                                                        <p class="text-sm font-weight-bold mb-0"
                                                            style="color: rgb(107, 184, 100)">{{ $stage->etat }}</p>
                                                    @else
                                                        <p class="text-sm font-weight-bold mb-0">{{ $stage->etat }}</p>
                                                    @endif
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    @if ($stage->etat == 'validé')
                                                        <p class="text-sm font-weight-bold mb-0" style="color: rgb(51, 54, 50)">
                                                            {{ $stage->date_soutenance }}</p>
                                                    @else
                                                        <p class="text-sm font-weight-bold mb-0">{{ $stage->date_soutenance }}
                                                        </p>
                                                    @endif
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-sm font-weight-bold mb-0">{{ $stage->societe_id }}</p>
                                                </td>
                                          
                                           

                                            <td class="align-middle text-center text-sm">
                                            
                                                    <a href='stages/jury/affecter/{{ $stage->id }}'>

                                                        {{-- @if (!empty($stage->enseignants->pluck('id')->toArray())) --}}
                                                            <button class="btn btn-secondary btn-sm ms-auto">affecter jurys</button>
                                                                
                                                        {{-- @endif --}}

                                                    </a>
                                              
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
