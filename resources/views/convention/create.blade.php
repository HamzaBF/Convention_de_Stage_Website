@extends('Stagiaire.dashboard')


@section('convention')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Convention de stage</h4>
        {{-- <p class="card-description">
          Remplir tous les c
        </p> --}}
        <form class="forms-sample" method="POST" action="{{ route('conventions.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name">Nom et Prénom</label>
            <input name="Name" type="text" class="form-control" id="name" readonly value="{{ $user->name }}">
          </div>
          <!-- Date De Naissance -->
          <div class="form-group">
            <label for="dateinput">Date de Naissance</label>
            <input name="Date_Naissance" type="date" class="form-control" id="dateinput" placeholder="Date de Naissance">
          </div>

          <!-- CIN -->
          <div class="form-group">
            <label for="cin">CIN</label>
            <input name="cin" type="text" class="form-control" id="cin" placeholder="Saisir votre CIN">
          </div>
          
          <!-- Lieu de Naissance -->
          <div class="form-group">
            <label for="LieuDeNaissance">Lieu de Naissance</label>
            <input name="Lieu_Naissance" type="text" class="form-control" id="LieuDeNaissance" placeholder="Lieu de Naissance">
          </div>

          <!-- Adresse -->
          <div class="form-group">
            <label for="Adresse">Adresse</label>
            <input type="text" name="Adress" class="form-control" id="Adresse" placeholder="Adresse">
          </div>

          <!-- Etablissemant -->
          <div class="form-group">
            <label for="Etablissement">L'Etablissement de formation initiale</label>
            <input type="text" name="Etablissement" class="form-control" id="Etablissement" placeholder="L'Etablissement de formation initiale">
          </div>

          <!--  Formation -->
          <div class="form-group">
            <label for="formation">Formation suivie</label>
            <input type="text" name="Formation" class="form-control" id="formation" placeholder="Par exemple Ingénieur d'état en systèmes embarquées ENSA - Fès">
          </div>

          <!-- Lieu de STAGE -->
          <div class="form-group">
            <label for="Lieu">Lieu de stage</label>
            <input type="text" name="Lieu_Stage" class="form-control" id="Lieu" placeholder="Lieu de stage ">
          </div>

          <!-- Département -->
          <div class="form-group">
            <label for="departement">Département</label>
            <select class="chosen-select form-control" placeholder="Selectioner votre Département" id="departement" name="Departement" tabindex="2" required>
                  <option> </option>
                  <option value="Digitalization & Microelectronic Smart Devices"> Digitalization & Microelectronic Smart Devices</option>
                  <option value="Business Development"> Business Development </option>
                  <option value="IT"> IT </option>
                  <option value="Support"> Support </option>
                  <option value="Micro Systèmes Embarqués et Intelligence Artificielle"> Micro Systèmes Embarqués et Intelligence Artificielle</option>
                  <option value="Nano Composites"> Nano Composites</option>
                  <option value="Plateforme"> Plateforme </option>
                  <option value="Ingénierie et durabilité des matériaux"> Ingénierie et durabilité des matériaux </option>
                  <option value="Bio Médicale"> Bio Médicale</option>
                  <option value="Ressources Humaines & Communication"> Ressources Humaines & Communication </option>
                  <option value="Nano Matériaux"> Nano Matériaux </option>
                  <option value="Bio Verte"> Bio Verte </option>
                  <option value="Nano Optique"> Nano Optique </option>
                  <option value="Nano Varena"> Nano Varena </option>
                  <option value="IP & Valorization"> IP & Valorization </option>
                  <option value="Kits et Dispositifs de Diagnostic Médical "> Kits et Dispositifs de Diagnostic Médical </option>
                  <option value="Direction Générale "> Direction Générale </option>
                  <option value="Stockage de l'Energie et Revêtements Multifonctionnels "> Stockage de l'Energie et Revêtements Multifonctionnels</option>
          </select>
          </div>

          <!-- Tuteur -->
          <div class="form-group">
            <label for="tuteur">Tuteur à MAScir</label>
            {{-- <input type="text" class="form-control" id="tuteur" placeholder="Tuteur à MAScir "> --}}
            <select class="chosen-select form-control" data-placeholder="Select Tuteur" id="tuteur" name="tuteur" tabindex="2" required>
              <option></option>
              @foreach($tuteurs as $tuteur)
                  <option value="{{ $tuteur->Name }}">{{ $tuteur->Name }}</option>
              @endforeach
          </select>
          </div>

          <!-- Rémuniration -->
          <div class="form-group">
            <label for="remunire">Est-ce que le stage est rémunéré ?</label>
            <select class="chosen-select form-control" placeholder="Est-ce que le stage est rémunéré ?" id="remunire" name="Remunire" tabindex="2" required>
                  <option></option>
                  <option value="no"> non rémunéré </option>
                  <option value="yes"> rémunéré </option>
          </select>
          </div>

          <!-- RIB -->
          <div class="form-group" id="ribdiv">
            <label for="Rib">RIB</label>
            <input type="file" name="rib" class="form-control" id="Rib" placeholder="Uploader votre RIB">
          </div>
          
          
          
          <button type="submit" class="btn btn-primary me-2">Submit</button>

        </form>
      </div>
    </div>
  </div>
@endsection