@extends('layouts.encadrant.master')

{{-- @section('title')
    Dashboard | Admin Panel
@endsection --}}

@section('content')
<div class="row page-title-header">
    <div class="col-12">
      <div class="page-header">
        <h4 class="page-title">Dashboard</h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
          <ul class="quick-links ml-auto">
            <li><a href="#">Home</a></li>
            {{-- <li><a href="{{ route('conventions.create') }}">Créer votre convention</a></li> --}}
          </ul>
        </div>
      </div>
    </div>

    @if (session()->has('status'))

        <h4 style="color:green;">
        {{ session()->get('status') }}
        </h4>
        
    @endif
   <div class="col-12 grid-margin stretch-card">
    @yield('convention')
   </div>
  

</div>
@endsection