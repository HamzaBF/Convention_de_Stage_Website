@extends('admin.dashboard')

@section('users')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a contact</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('users.update', $user->id) }}">
            @method('PATCH') 
            @csrf
            
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value={{ $user->name }} />
            </div>


            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value={{ $user->email }} />
            </div>
            
            <div class="form-group">
                <select class="form-control" id="role" name="role" tabindex="2" required>
                    <option selected>Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="encadrant">Encadrant</option>
                    <option value="RH">RH</option>
                    <option value="stagiaire">Stagiaire</option>
                  </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        
        </form>
    </div>
</div>
    
@endsection