@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Ajouter une societe'])
  
    <div id="alert">
        @include('components.alert')
    </div>
    {{-- les infos du stage --}}
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
                    <form role="form" method="POST" action="{{route('societe.store') }}" enctype="multipart/form-data" id="societe-form">
                        @csrf
                        <div class="card-header pb-0">

                                <div class="d-flex align-items-center">
                                    <p class="mb-0">Ajouter une societe</p>
                                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Ajouter</button>
                                </div>
                                
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Les informations du société</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">nom</label>
                                        <input class="form-control" type="text" name="nom" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">telephone</label>
                                        <input class="form-control" type="text" name="telephone" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">adresse</label>
                                        <input class="form-control" type="text" name="adresse" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Ville</label>
                                        <input class="form-control" type="text" name="ville" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Pays</label>
                                        <select class="form-control" name="pays" id="pays">
                                            <option value="0">--- choisir pays ---</option>
                                            <!-- Les options de pays seront ajoutées ici par JavaScript -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Fax</label>
                                        <input class="form-control" type="text" name="fax" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email</label>
                                        <input class="form-control" type="text" name="email" >
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

    <script>
        const selectElement = document.getElementById("pays");
                    fetch("https://restcountries.com/v3.1/all")
                        .then(response => response.json())
                        .then(data => {
                            const countryMapping = {};
                            data.forEach(country => {
                            countryMapping[country.cca3] = country.translations.fra.common;
                        });
                            // Create options for each country in the filtered data
                            for (const countryCode in countryMapping) {
                                const option = document.createElement("option");
                                option.value = countryCode;
                                option.textContent = countryMapping[countryCode];
                                selectElement.appendChild(option);
                            }
                        })
                        .catch(error => console.error("Error fetching countries:", error));

                        const formElement = document.getElementById("societe-form");
                        formElement.addEventListener("submit", function(event) {
                        const selectedCountryCode = selectElement.value;
                    if (selectedCountryCode !== "0") {
                        selectElement.value = countryMapping[selectedCountryCode];
                    }
                });
    </script>
@endsection
