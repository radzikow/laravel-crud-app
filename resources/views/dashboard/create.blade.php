@extends('layouts.app')

@section('content')

{{-- Main wrapper --}}
<div class="container main-wrapper">

  {{-- Products nav --}}
  @include('layouts.partials.products-nav')

  <div class="row justify-content-center my-3">
    <div class="col-md-12">

      {{-- Form --}}
      <form method="POST" action="{{ url('/dashboard/create') }}">
        @csrf

        {{-- Title --}}
        <h4>Add a new product</h4>

        {{-- Messages --}}
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        {{-- name --}}
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" placeholder="Product name.." value="{{ old('name') }}">
        </div>

        {{-- description --}}
        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" class="form-control" name="description" placeholder="Product description.."
            value="{{ old('description') }}">
        </div>

        {{-- price1 --}}
        <div class="form-group">
          <label for="price1">Price 1</label>
          <input type="text" class="form-control" name="price1" placeholder="Product price.."
            value="{{ old('price1') }}">
        </div>

        {{-- price2 --}}
        <div class="form-group">
          <label for="price2">Price 2</label>
          <input type="text" class="form-control" name="price2" placeholder="Product price.."
            value="{{ old('price2') }}">
        </div>

        {{-- submit --}}
        <div class="col-auto my-1 px-0">
          <button type="submit" class="btn btn-secondary">Add product</button>
        </div>

      </form>
    </div>
  </div>

  @endsection
