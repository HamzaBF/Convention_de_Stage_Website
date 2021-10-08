@extends('RH.dashboard')


@section('conventions')

<div class="row">
  <div class="col-lg-12 margin-tb">
      <div class="text-center mb-4">
          <h3 >La Liste des Conventions de stage</h3>
      </div>
  </div>
</div>
@if ($message = Session::get('success'))
  <div class="alert alert-success">
      <span>{{ $message }}</span>
  </div>
@endif
<table class="table table-bordered">
  <tr>
    <td>No</td>
    <td>Nom et Prénom</td>
    <td>Etablissement</td>
    <td>Formation</td>
    <td>Département</td>
    <td>Encadrant</td>
    <td colspan="3">Actions</td>
  </tr>
  @foreach ($conventions as $convention)
      <tr>
          <td>{{ $loop->index + 1 }}</td>
          <td scope="row" class="scope">{{$convention->Name}}</td>
          <td>{{$convention->Etablissement}}</td>
          <td>{{$convention->Formation}}</td>
          <td>{{$convention->departement}}</td>
          <td>{{$convention->Tuteur}}</td>
          <td>
              <a href="{{ route('convention.edit',$convention->id)}}" class="btn btn-primary border-bottom-0">Ajouter des informations</a>
          </td>
          <td>
               <a href="{{ route('sendemail',$convention->id)}}" class="btn btn-info border-bottom-0">Envoyer au stagaiare</a>
          </td>
          <td>
              <a class="btn btn-success border-bottom-0" href="{{ route('print',$convention->id)}}">Imprimer</a>                  
          </td>
      </tr>
  @endforeach
</table>
<br><br>
<div>
  {{ $conventions->links('vendor.pagination.custom') }}
</div>



    
@endsection


