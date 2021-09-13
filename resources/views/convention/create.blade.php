@extends('Stagiaire.dashboard')


@section('convention')
<div>

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
            <label for="name">Name</label>
            <input name="Name" type="text" class="form-control" id="name" readonly value="{{ $user->name }}">
          </div>
          <!-- Date -->
          <div class="form-group">
            <label for="dateinput">Date de Naissance</label>
            <input name="Date_Naissance" type="date" class="form-control" id="dateinput" placeholder="Date de Naissance">
          </div>

          <!-- Date -->
          <div class="form-group">
            <label for="cin">CIN</label>
            <input name="cin" type="text" class="form-control" id="cin" placeholder="Saisir votre CIN">
          </div>
          

          <div class="form-group">
            <label for="LieuDeNaissance">Lieu de Naissance</label>
            <input name="Lieu_Naissance" type="text" class="form-control" id="LieuDeNaissance" placeholder="Lieu de Naissance">
          </div>

          <div class="form-group">
            <label for="Adresse">Adresse</label>
            <input type="text" name="Adress" class="form-control" id="Adresse" placeholder="Adresse">
          </div>

          <div class="form-group">
            <label for="Etablissement">L'Etablissement de formation initiale</label>
            <input type="text" name="Etablissement" class="form-control" id="Etablissement" placeholder="L'Etablissement de formation initiale">
          </div>

          <div class="form-group">
            <label for="formation">Formation suivie</label>
            <input type="text" name="Formation" class="form-control" id="formation" placeholder="Par exemple Ingénieur d'état en systèmes embarquées ENSA - Fès">
          </div>

          <div class="form-group">
            <label for="Lieu">Lieu de stage</label>
            <input type="text" name="Lieu_Stage" class="form-control" id="Lieu" placeholder="Lieu de stage ">
          </div>

          <div class="form-group">
            <label for="departement">Département</label>
            <select class="chosen-select form-control" placeholder="Selectioner votre Département" id="departement" name="Departement" tabindex="2" required>
                  <option> </option>
                  <option value="NANOCOMPOSITE"> NANOCOMPOSITE </option>
                  <option value="MATERIAUX"> MATERIAUX </option>
                  <option value="IT"> IT </option>
                  <option value="RH & COM"> RH & COM </option>
                  <option value="VARENA"> VARENA </option>
                  <option value="BIO ROUGE"> BIO ROUGE </option>
                  <option value="BIO VERT"> BIO VERT </option>
                  <option value="SUPPORT"> SUPPORT </option>
                  <option value="OPTIQUE"> OPTIQUE </option>
                  <option value="SE & IA"> SE & IA </option>
                  <option value="DIGITAL & MICRO"> DIGITAL & MICRO </option>
                  <option value="BD & VAL"> BD & VAL </option>
                  <option value="NANOMATERIAUX"> NANOMATERIAUX </option>
                  <option value="MG"> MG </option>
                  <option value="DG"> DG </option>
                  <option value="PLATEFORME"> PLATEFORME </option>
          </select>
          </div>

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

          <div class="form-group">
            <label for="rib">RIB</label>
            <input type="file" name="rib" class="form-control" id="rib" placeholder="Uploader votre RIB">
            @error('rib')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
          </div>

          

          {{-- <label>Hotel</label> 
          <select class="chosen-select form-control" data-placeholder="Select Hotel" id="hotel_id" name="hotel_id" tabindex="2" required>
              <option></option>
              @foreach($hotels as $hotel)
                  <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
              @endforeach
          </select>
          <!-- If first name has error -->
          @if ($errors->has('hotel_id'))
              <span class="help-block">
                  <strong>{{ $errors->first('hotel_id') }}</strong>
              </span>
          @endif
     </div> --}}

          {{-- <div class="form-group">
            <label for="exampleSelectGender">Gender</label>
              <select class="form-control" id="exampleSelectGender">
                <option>Male</option>
                <option>Female</option>
              </select>
            </div> --}}
          
          
          
          <button type="submit" class="btn btn-primary me-2">Submit</button>

        </form>
      </div>
    </div>
  </div>
</div>  
@endsection