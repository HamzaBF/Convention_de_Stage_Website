@extends('RH.dashboard')


@section('edit')
<div>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Convention de stage</h4>
        {{-- <p class="card-description">
          Remplir tous les c
        </p> --}}
        <form class="forms-sample" method="POST" action="{{ route('convention.update', $convention->id) }}">
            @method('PATCH') 
          @csrf
          <div class="form-group">
            <label for="name">Nom et prénom</label>
            <input name="Name" type="text" class="form-control" id="name" readonly value="{{ $convention->Name }}">
          </div>
          <!-- Date -->
          <div class="form-group">
            <label for="dateinput">Date de naissance</label>
            <input name="Date_Naissance" type="date" class="form-control" id="dateinput" placeholder="Date de Naissance" readonly value="{{ $convention->Date }}">
          </div>

          <!-- Date -->
          <div class="form-group">
            <label for="cin">Numéro de la CIN</label>
            <input name="cin" type="text" class="form-control" id="cin"  readonly value="{{ $convention->CIN }}">
          </div>
          

          <div class="form-group">
            <label for="LieuDeNaissance">Lieu de naissance</label>
            <input name="Lieu_Naissance" type="text" class="form-control" id="LieuDeNaissance" placeholder="Lieu de Naissance" readonly value="{{ $convention->Lieu_De_Naissance }}">
          </div>

          <div class="form-group">
            <label for="Adresse">Adresse</label>
            <input type="text" name="Adress" class="form-control" id="Adresse" placeholder="Adresse" readonly value="{{ $convention->adress }}">
          </div>

          <div class="form-group">
            <label for="Etablissement">Etablissement de la formation initiale</label>
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
            <label for="tuteur">Tuteur à MAScIR</label>
            <input type="text" name="tuteur" class="form-control" id="tuteur" value="{{ $convention->Tuteur }}">
          </div>

          <div class="form-group">
            <label for="departement">Département/Centre</label>
            <input type="text" name="Departement" class="form-control" id="departement" value="{{ $convention->departement }}">
          </div>

          <div class="form-group">
            <label for="sujet">Sujet de stage</label>
            <input type="text" name="sujet" class="form-control" id="sujet" placeholder="Sujet de stage" value="{{ $convention->Sujet}}">
          </div>

          {{-- Numéro du demande de recrutement --}}
          <div class="form-group">
            <label for="dr">Numéro de la demande de recrutement</label>
            <input type="text" name="demanderecrut" class="form-control" id="dr" placeholder="Numéro du demande de recrutement" value="{{ $convention->DR}}">
          </div>

          <div class="form-group">
            <label for="datedebut">Date de début de stage</label>
            <input name="Date_Debut" type="date" class="form-control" id="datedebut" placeholder="Date début de stage" value="{{ $convention->date_debut }}">
          </div>

          <div class="form-group">
            <label for="datefin">Date de fin de stage</label>
            <input name="Date_Fin" type="date" class="form-control" id="datefin" placeholder="Date de fin de stage" value="{{ $convention->date_fin }}">
          </div>

           <!-- Rémuniration oui ou non -->
           <div class="form-group">
            <label for="remunire">Est-ce que le stage est rémunéré ?</label>
            <input name="Remunire" type="text" class="form-control" id="remunire" placeholder="Date de fin de stage" readonly value="{{ $convention->Remunire }}">
          </div>

          <!-- Rémuniration -->
          <div class="form-group" >
            <label for="prix">Indémnité de stage</label>
            <input name="Indemnite" type="number" class="form-control" id="prix" placeholder="Indémnité de stage" value="{{ $convention->Indemnite }}">
          </div>

          <!-- RIB -->
          <div class="form-group" id="ribdiv">
            <label for="Rib">RIB</label>
            <a class="form-control" id="rib" href="{{ route('rib.download', $convention->id) }}">{{ $convention->RIB }}</a>
          </div>

                 
          <button type="submit" class="btn btn-primary me-2">Envoyer</button>

        </form>
      </div>
    </div>
  </div>
</div>  
@endsection