@extends('encadrant.dashboard')


@section('convention')
<div>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Convention de stage</h4>
        {{-- <p class="card-description">
          Remplir tous les c
        </p> --}}
        <form class="forms-sample" method="POST" action="{{ route('encadrant.update', $convention->id) }}">
            @method('PATCH') 
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input name="Name" type="text" class="form-control" id="name" readonly value="{{ $convention->Name }}">
          </div>
          <!-- Date -->
          <div class="form-group">
            <label for="dateinput">Date de Naissance</label>
            <input name="Date_Naissance" type="date" class="form-control" id="dateinput" placeholder="Date de Naissance" readonly value="{{ $convention->Date }}">
          </div>

          <!-- Date -->
          <div class="form-group">
            <label for="cin">Date de Naissance</label>
            <input name="cin" type="text" class="form-control" id="cin"  readonly value="{{ $convention->CIN }}">
          </div>
          

          <div class="form-group">
            <label for="LieuDeNaissance">Lieu de Naissance</label>
            <input name="Lieu_Naissance" type="text" class="form-control" id="LieuDeNaissance" placeholder="Lieu de Naissance" readonly value="{{ $convention->Lieu_De_Naissance }}">
          </div>

          <div class="form-group">
            <label for="Adresse">Adresse</label>
            <input type="text" name="Adress" class="form-control" id="Adresse" placeholder="Adresse" readonly value="{{ $convention->adress }}">
          </div>

          <div class="form-group">
            <label for="Etablissement">L'Etablissement de formation initiale</label>
            <input type="text" name="Etablissement" class="form-control" id="Etablissement" placeholder="L'Etablissement de formation initiale" readonly value="{{ $convention->Etablissement }}" >
          </div>

          <div class="form-group">
            <label for="formation">Formation suivie</label>
            <input type="text" name="Formation" class="form-control" id="formation" placeholder="Par exemple Ingénieur d'état en systèmes embarquées ENSA - Fès" readonly value="{{ $convention->Formation }}">
          </div>

          <div class="form-group">
            <label for="Lieu">Lieu de stage</label>
            <input type="text" name="Lieu_Stage" class="form-control" id="Lieu" placeholder="Lieu de stage" readonly value="{{ $convention->Lieu_De_Stage }}">
          </div>

          <div class="form-group">
            <label for="tuteur">Tuteur à MAScir</label>
            <input type="text" name="tuteur" class="form-control" id="tuteur" readonly value="{{ $convention->Tuteur }}">
          </div>

          <div class="form-group">
            <label for="departement">Département</label>
            <input type="text" name="Departement" class="form-control" id="departement" readonly value="{{ $convention->departement }}">
          </div>

          <div class="form-group">
            <label for="sujet">Sujet de Stage</label>
            <input type="text" name="sujet" class="form-control" id="sujet" placeholder="Sujet de stage" value="{{ $convention->Sujet}}">
          </div>

          <div class="form-group">
            <label for="datedebut">Date début de stage</label>
            <input name="Date_Debut" type="date" class="form-control" id="datedebut" placeholder="Date début de stage" value="{{ $convention->date_debut }}">
          </div>

          <div class="form-group">
            <label for="datefin">Date fin de stage</label>
            <input name="Date_Fin" type="date" class="form-control" id="datefin" placeholder="Date de fin de stage" value="{{ $convention->date_fin }}">
          </div>

          
          <button type="submit" class="btn btn-primary me-2">Submit</button>

        </form>
      </div>
    </div>
  </div>
</div>  
@endsection