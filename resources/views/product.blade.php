@extends('layouts.app')

@section('content')

{{-- Main wrapper --}}
<div class="container main-wrapper">

  <div class="row justify-content-center mt-2">
    <div class="col-md-10">

      {{-- Title --}}
      <h4>Product details</h4>

      <div class="card">
        <div class="card-body">
          {{-- title --}}
          <h4 class="card-title mb-4">{{ $product->name }}</h4>
          {{-- description --}}
          <p style="font-weight: 600; margin-bottom: 0px;">Description:</p>
          <p class="card-text">{{ $product->description }}</p>
          {{-- price1 --}}
          <p style="font-weight: 600; margin-bottom: 0px;">Price 1:</p>
          <p class="card-text">{{ $product->price1 . ' PLN' }}</p>
          {{-- price2 --}}
          <p style="font-weight: 600; margin-bottom: 0px;">Price 2:</p>
          <p class="card-text">{{ $product->price2 . ' PLN' }}</p>

          <a href="{{ url('/products') }}" class="card-link">Back to products</a>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection
