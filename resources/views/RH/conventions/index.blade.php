@extends('RH.dashboard')

@section('conventions')

<div>
      <table class="table table-striped">
        <thead class="thead-primary">
            <tr>
              <td>Name</td>
              <td>Etablissement</td>
              <td>Formation</td>
              <td>Département</td>
              <td>Encadrant</td>
              <td colspan = 2>Actions</td>
            </tr>
        </thead>
        <tbody>
                @foreach ($conventions as $convention )
              
                
            
                  <tr>
                      <td scope="row" class="scope">{{$convention->Name}}</td>
                      <td>{{$convention->Etablissement}}</td>
                      <td>{{$convention->Formation}}</td>
                      <td>{{$convention->departement}}</td>
                      <td>{{$convention->Tuteur}}</td>
                      <td>
                        <a href="#" class="btn btn-primary border-bottom-0">Edit</a>
                    </td>
                      <td>
                          <a href="{{ route('convention.show',$convention->id)}}" class="btn btn-info border-bottom-0">Show</a>
                      </td>
                      <td>
                            <a class="btn btn-success border-bottom-0" href="{{ route('print',$convention->id)}}">Print</a>                  
                      </td>
                  </tr>
              @endforeach
            
        </tbody>
      </table>
</div>
    
@endsection