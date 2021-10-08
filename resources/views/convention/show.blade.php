@extends('Stagiaire.dashboard')

@section('show')



<div>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title text-center">Convention de stage</h3>
            
            <form class="forms-sample">
              @csrf
              <div class="form-group">
                <label for="Name">Nom et Prénom</label>
                <input name="Name" type="text" class="form-control" id="Name" readonly placeholder="Name" value="{{$convention->Name}}"  >
              </div>
              <!-- Date -->
              <div class="form-group">
                <label for="dateinput">Date de naissance</label>
                <input name="Date_Naissance" type="date" class="form-control" id="dateinput" readonly placeholder="Date de Naissance" value="{{ $convention->Date }}">
              </div>

              <!-- Date -->
              <div class="form-group">
                <label for="cin">Numéro de la carte CIN</label>
                <input name="cin" type="text" class="form-control" id="cin" readonly value="{{ $convention->CIN }}">
              </div>
              
  
              <div class="form-group">
                <label for="LieuDeNaissance">Lieu de naissance</label>
                <input name="Lieu_Naissance" type="text" class="form-control" id="LieuDeNaissance" readonly placeholder="Lieu de Naissance" value="{{ $convention->Lieu_De_Naissance }}">
              </div>
    
              <div class="form-group">
                <label for="Adresse">Adresse</label>
                <input type="text" name="Adress" class="form-control" id="Adresse" readonly placeholder="Adresse domicile" value="{{ $convention->adress }}">
              </div>
    
              <div class="form-group">
                <label for="Etablissement">Etablissement de la formation initiale</label>
                <input type="text" name="Etablissement" class="form-control" id="Etablissement" readonly placeholder="L'Etablissement de formation initiale" value="{{ $convention->Etablissement }}">
              </div>
    
              <div class="form-group">
                <label for="formation">Formation suivie</label>
                <input type="text" name="Formation" class="form-control" id="formation" readonly placeholder="Par exemple Ingénieur d'état en systèmes embarquées ENSA - Fès" value="{{ $convention->Formation }}">
              </div>
    
              <div class="form-group">
                <label for="Lieu">Lieu de stage</label>
                <input type="text" name="Lieu_Stage" class="form-control" id="Lieu" readonly placeholder="Lieu de stage " value="{{ $convention->Lieu_De_Stage }}">
              </div> 

              <div class="form-group">
                <label for="tuteur">Tuteur</label>
                <input type="text" name="tuteur" class="form-control" id="tuteur" readonly  value="{{ $convention->Tuteur }}">
              </div> 

              <div class="form-group">
                <label for="departement">Département/Centre</label>
                <input type="text" name="Departement" class="form-control" id="departement" readonly  value="{{ $convention->departement }}">
              </div> 

                  <!-- Rémuniration -->
              <div class="form-group">
                <label for="remunire">Est-ce que le stage est rémunéré ?</label>
                <input type="text" name="Remunire" class="form-control" id="remunire" readonly value="{{ $convention->Remunire}}">
              </div>



  
            </form>
          </div>
        </div>
      </div>
        



    @empty($convention)
        <p>No Convention</p>
    @endempty

</div>



@endsection