@extends('layouts.app')

@section('content')

{{-- Main wrapper --}}
<div class="container main-wrapper">

  {{-- Products nav --}}
  @include('layouts.partials.products-nav')

  <div class="row justify-content-center my-3">
    <div class="col-md-12">

      {{-- Title --}}
      <h4>Products list</h4>

      {{-- Search form --}}
      <form action="{{ url('/dashboard/search') }}" method="POST" role="search">
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
            <th scope="col">@sortablelink('name')</th>
            <th scope="col">@sortablelink('description')</th>
            <th scope="col">@sortablelink('price1', 'Price 1')</th>
            <th scope="col">@sortablelink('price2', 'Price 2')</th>
            <th scope="col">@sortablelink('status')</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        {{-- body --}}
        <tbody>
          @foreach($products as $key => $product)
          <tr>
            <th scope="row">{{ $key + 1 }}</th>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price1 . ' PLN' }}</td>
            <td>{{ $product->price2 . ' PLN' }}</td>
            <td>
              <span
                class="badge {{ $product->status == '1' ? 'badge-success' : 'badge-warning' }}">{{ $product->status == '1' ? 'Active' : 'Inactive'}}</span>
            </td>
            <td style="width: 160px;">
              <a class="mr-1 btn btn-outline-warning" href="{{ url('/dashboard/edit') . '/' . $product->id }}">edit</a>
              <form class="d-inline" method="POST" id="deleteProductForm"
                action="{{ url('/dashboard/destroy') .'/' . $product->id }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger" type="submit">delete</button>
              </form>
            </td>
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
      <a href="{{ url('/dashboard') }}" class="card-link">Show all products</a>

    </div>
  </div>
</div>

@endsection
