@extends('users.index')

@section('categorie')

<div>
      <table class="table table-striped">
        <thead class="thead-primary">
            <tr>
              <td>ID</td>
              <td>Name</td>
              <td>Email</td>
              <td>Job Title</td>
              <td colspan = 2>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
              
                  @if ($user->role == "encadrant" )
                
            
                  <tr>
                      <td scope="row" class="scope">{{$user->id}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->role}}</td>
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
            
        </tbody>
      </table>
</div>
    
@endsection