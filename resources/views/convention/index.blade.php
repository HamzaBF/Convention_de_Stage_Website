@extends('Stagiaire.dashboard')


@section('convention')

<div class="row">
  <div class="col-lg-12 margin-tb">
      <div class="text-center mb-4">
          <h4 >La liste de mes conventions de stage</h4>
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
    <td>Nom et prénom</td>
    <td>Etablissement</td>
    <td>Formation</td>
    <td>Département/Centre</td>
    <td>Encadrant</td>
    <td colspan="2">Actions</td>
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
               <a href="{{ route('conventions.show',$convention->id)}}" class="btn btn-info border-bottom-0">Visualiser</a>
          </td>
      </tr>
  @endforeach
</table>
<br><br>
<div>
  {{ $conventions->links('vendor.pagination.custom') }}
</div>



    
@endsection


