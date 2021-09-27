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

  <div class="content-wrapper">
    @yield('edit')
  </div>

  <div class="content-wrapper">
    @yield('profile')
  </div>

</div>
@endsection