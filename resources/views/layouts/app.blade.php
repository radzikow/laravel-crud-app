<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  {{-- Head --}}
  @include('layouts.partials.head')
</head>

<body>

  {{-- Header --}}
  @include('layouts.partials.nav')

  <div id="app">

    {{-- Main Content --}}
    <main class="py-4">
      @yield('content')
    </main>

  </div>

  {{-- Footer Scripts --}}
  @include('layouts.partials.footer-scripts')

</body>

</html>
