<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Boxicons -->
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <!-- My CSS -->
  <link rel="stylesheet" href="{{ asset('backend/css/dashboard/dashboard.css') }}">
  <title>Admin</title>
</head>

<body>
  @include('backend.dashboard.layouts.sideBar')
  <!-- CONTENT -->
  <section id="content">
    <!-- NAVBAR -->
    @include('backend.dashboard.layouts.nav')
    <!-- NAVBAR -->
    <!-- MAIN -->
    <main>
      {{-- header --}}
      @include('backend.dashboard.layouts.header')
      @yield('content')
    </main>
    <!-- MAIN -->
  </section>
  <!-- CONTENT -->
  <script src="{{ asset('backend/js/dashboard.js') }}"></script>
</body>

</html>
