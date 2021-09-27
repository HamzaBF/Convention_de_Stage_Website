@extends('users.index')

@section('categorie')


 <div class="row">
      <div class="col-lg-12 margin-tb">
                <div class="text-center mb-4">
                    <h3 >Gestion des Stagiaires</h3>
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
              <<td>No</td>
              <td>Nom et Prénom</td>
              <td>Email</td>
              <td>Titre de Poste</td>
              <td>Encadrant</td>
              <td colspan = 2>Actions</td>
            </tr>
            @foreach($users as $user)
                          @foreach ($conventions as $convention )
                        
                            @if ($user->name == $convention->Name )
                          
                      
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td scope="row" class="scope">{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role}}</td>
                                <td>{{$convention->Tuteur}}</td>
                                <td>
                                    <a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary border-bottom-0">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('users.destroy', $user->id)}}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                      @endforeach

          </table>
          <br><br>
          <div>
          {{ $users->links('vendor.pagination.custom') }}
          </div>
              
          @endsection