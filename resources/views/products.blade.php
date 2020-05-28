@extends('layouts.app')

@section('content')

{{-- Main wrapper --}}
<div class="container main-wrapper">

  <div class="row justify-content-center mt-2">
    <div class="col-md-10">

      {{-- Title --}}
      <h4>Products list</h4>

      {{-- Search form --}}
      <form action="{{ url('/products/search') }}" method="POST" role="search">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search products" aria-label="Search products"
            aria-describedby="button-addon2" name="searchTest">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Button</button>
          </div>
        </div>
      </form>

      @if(isset($products))

      {{-- Table --}}
      <table class="table table-products">
        {{-- head --}}
        <thead class="bg-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price 1</th>
            <th scope="col">Price 2</th>
          </tr>
        </thead>
        {{-- body --}}
        <tbody>
          @foreach($products as $key => $product)
          <tr>
            <th scope="row">{{ $key + 1 }}</th>
            <td>
              <a href="{{ url('/product') . '/' . $product->id}}">{{ $product->name }}</a>
            </td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price1 . ' PLN' }}</td>
            <td>{{ $product->price2 . ' PLN' }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

      @elseif(isset($msg))
      <div>
        <p>{{ $msg }}</p>
      </div>
      @endif

      {{-- Show all products link --}}
      <a href="{{ url('/products') }}" class="card-link">Show all products</a>

    </div>
  </div>
</div>

@endsection
