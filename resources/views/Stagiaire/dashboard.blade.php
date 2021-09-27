@extends('layouts.stagiaire.master')

@section('title')
    Dashboard | stagiaire Panel
@endsection

@section('content')
<div class="row page-title-header">
    <div class="col-12">
      <div class="page-header">
        <h4 class="page-title">Dashboard</h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
          <ul class="quick-links ml-auto">
            <li><a href="{{ route('conventions.create') }}">Créer votre convention</a></li>
          </ul>
        </div>
      </div>
    </div>

    @if (session()->has('status'))

        <h4 style="color:green;">
        {{ session()->get('status') }}
        </h4>
        
    @endif
   <div class="content-wrapper">
    @yield('convention')
   </div>

   <div class="content-wrapper">
    @yield('profile')
  </div>

  <div class="content-wrapper">
    @yield('show')
  </div>
  

</div>
@endsection
