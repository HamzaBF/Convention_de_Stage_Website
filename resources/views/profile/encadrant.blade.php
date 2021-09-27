@extends('encadrant.dashboard')

@section('profile')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Mettre à jour votre profil</h1>

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
        <form method="post" action="{{ route('profile.update', $user->id) }}">
            @method('PATCH') 
            @csrf
            
            <div class="form-group">
                <label for="name">Nom et Prénom:</label>
                <input type="text" class="form-control" name="name" id="name" value={{ $user->name }} />
            </div>


            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" id="email" value={{ $user->email }} />
            </div>

            <div class="form-group">
                <label for="password">Nouveau mot de passe:</label>
                <input type="text" class="form-control" name="password" id="password" />
            </div>
            
            
            <button type="submit" class="btn btn-primary">Mettre à jour </button>
        
        </form>
    </div>
</div>
    
@endsection