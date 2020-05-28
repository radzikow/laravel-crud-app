@extends('layouts.app')

@section('content')

{{-- Main wrapper --}}
<div class="container main-wrapper">

  {{-- Title --}}
  <div class="row align-items-center text-center title-wrapper">
    <div class="col welcome-title">
      <h1 class="text-dark">Welcome to Laravel App</h1>
    </div>
  </div>

  {{-- Button --}}
  <div class="row align-items-center text-center button-wrapper">
    <div class="col-12">
      <p class="text-muted">Click below to login</p>
      <a href="{{ url('/login') }}" class="btn btn-dark">Login</a>
    </div>
  </div>

</div>

@endsection
