@foreach ($stage->enseignants as  $enseignant)
                               
           
<div class="col-md-6">
    <div class="form-group">
        <label for="{{$enseignant->pivot->role}}_id">Enseignant-{{$enseignant->pivot->role}}</label>
            <select name="{{$enseignant->pivot->role}}_id"  id="{{$enseignant->pivot->role}}_id" class="form-control">
                <option value="0">---choix enseignant ---</option>
                        @foreach ($enseignants as $enseignantX) 
                        <option value="{{$enseignantX->id}}" {{ old($enseignant->pivot->role,$enseignantX->id ) == $enseignant?->id ? 'selected' : '' }}> {{$enseignantX->user->nom }} {{ $enseignantX->user->prenom }}  </option>
                            {{-- <option value="{{$enseignant->id}}"> {{$enseignant->user->nom }} {{ $enseignant->user->prenom }}  </option> --}}
                        @endforeach
            </select>
    </div>
</div>

@endforeach