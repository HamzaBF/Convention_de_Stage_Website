@extends('encadrant.dashboard')

@section('convention')

<div class="row ">
    <div class="col-sm-12">
        <h3 class="text-center mb-4">Gestion des conventions de stage</h3>    
      <table class="table table-striped table-hover ">
        <thead class="thead-primary">
            <tr>
              <td>ID</td>
              <td>Nom et Prénom</td>
              <td>Lieu de naissance</td>
              <td>Etablissement</td>

              <td colspan = 2>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach($conventions as $convention)
            <tr>
                <td scope="row" class="scope">{{$convention->id}}</td>
                <td>{{$convention->Name}}</td>
                <td>{{$convention->Lieu_De_Naissance}}</td>
                <td>{{$convention->Etablissement}}</td>
                <td>
                    <a href="{{ route('encadrant.edit',$convention->id)}}" class="btn btn-primary border-bottom-0">Ajouter des Informations</a>
                </td>
                {{-- <td>
                    <form action="" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td> --}}
            </tr>
            @endforeach
        </tbody>
      </table>
    <div>
    </div>
    
@endsection