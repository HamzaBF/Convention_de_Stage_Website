@extends('layouts.RH.master')

@section('title')
    Dashboard | RH Panel
@endsection

@section('content')
<div class="row page-title-header">
    <div class="col-12">
      <div class="page-header">
        <h4 class="page-title">Dashboard</h4>
        <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
          <ul class="quick-links ml-auto">
            <li><a href="#">Settings</a></li>
            <li><a href="{{ route('users.index') }}">Users</a></li>
            <li><a href="#">Watchlist</a></li>
          </ul>
        </div>
      </div>
    </div>
   
    <div class="content-wrapper">
      @yield('users')
  </div>

  <div class="content-wrapper">
    @yield('conventions')
</div>
</div>
@endsection