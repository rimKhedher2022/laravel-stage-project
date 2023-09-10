@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Modifier une société'])
  
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
                    <form role="form" method="POST" action={{ route('societes.update' , $societe->id) }} id="societe-form" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">


                                <div class="d-flex align-items-center">
                                    <p class="mb-0">Modifier une société</p>
                                    {{-- {{$stage}} --}}
                                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Enregistrer</button>
                                </div>
                                
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Les informations de stage</p>
                            <div class="row">
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label" >type</label>
                                        <input class="form-control" type="text" name="type" value="{{old('type', $stage->type)}}">
                                    </div>
                                </div> --}}
                    

                                

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nom</label>
                                        <input class="form-control" type="text" name="nom"  value="{{old('nom', $societe->nom)}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Telephone</label>
                                        <input class="form-control" type="text" name="telephone"  value="{{old('telephone', $societe->telephone)}}">
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Adresse</label>
                                        <input class="form-control" type="text" name="adresse"  value="{{old('adresse', $societe->adresse)}}" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Ville</label>
                                        <input class="form-control" type="text" name="ville"  value="{{old('ville', $societe->ville)}}" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Pays</label>
                                     
                                        <select class="form-control" name="pays" id="pays">
                                           <option value="{{old('pays', $societe->pays)}}" selected>
                                                {{$societe->pays}}
                                           </option>
                                            <!-- Les options de pays seront ajoutées ici par JavaScript -->
                                        </select>
                                       
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Fax</label>
                                        <input class="form-control" type="text" name="fax"  value="{{old('fax', $societe->fax)}}" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email</label>
                                        <input class="form-control" type="text" name="email"  value="{{old('email', $societe->email)}}" >
                                    </div>
                                </div>
                               
                            </div>
                            
                        </div>
                    </form>
                   
                  


          
          
                
                </div>
            </div>
          
        </div>
       
    </div>


    <script>

                            const selectElement = document.getElementById("pays");
                            const countryMapping = {};
                                fetch("https://restcountries.com/v3.1/all")
                                    .then(response => response.json())
                                    .then(data => {
                                       
                                        data.forEach(country => {
                                        countryMapping[country.cca3] = country.translations.fra.common;
                                    });
                                        // Create options for each country in the filtered data
                                        for (const countryCode in countryMapping) {
                                            const option = document.createElement("option");
                                            option.value = countryMapping[countryCode];
                                            option.textContent = countryMapping[countryCode];
                                            selectElement.appendChild(option);
                                        }
                                    })
                                    .catch(error => console.error("Error fetching countries:", error));

                const formElement = document.querySelector("form");
                formElement.addEventListener("submit", function(event) {
                event.preventDefault(); // Prevent the form from submitting

                const selectedCountryCode = selectElement.value;
                if (selectedCountryCode !== "0") {
                    selectElement.value = countryMapping[selectedCountryCode];
                }

            formElement.submit();
});
</script>
    
@endsection
