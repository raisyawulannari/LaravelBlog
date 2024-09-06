<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta tags and other head elements -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <!-- Stylesheets -->
  <link href="https://inovindoacademy.com/assets/css/app.css" rel="stylesheet">
  <link rel="stylesheet" href="/https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css">
  <link rel="stylesheet" href="/https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
  <link rel="stylesheet" href="/https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
</head>

<body>
  <!-- Include Header -->
  @include('layouts.header')

  <div class="container-fluid">
    <!-- Include Sidebar -->
    @include('layouts.sidebar')

    <div class="main-content">
      @yield('content') <!-- Konten -->
    </div>

  </div>

  <!-- JavaScript Files -->
  <script src="/https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="/https://inovindoacademy.com/assets/js/mdb.min.js"></script>
  <script src="/https://inovindoacademy.com/assets/js/app.js"></script>
  <script src="/https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  <script src="/https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  <script src="/https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
  <script src="/https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="/https://inovindoacademy.com/assets/js/perfect-scrollbar.js"></script>
  <script src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
  <script src="/https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="/https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
  <script src="/https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
  <script src="/https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="/https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  <script src="/https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="/https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
  <script src="/https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="/https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
    $(document).ready(function() {
      @if (session()->has('success'))
        toastr.success('{{ session('success')}}','SUCCESS!');
      @elseif(session()->has('error'))
        toastr.error('{{ session('error')}}','FAILED!');
      @endif
    });
  </script>

  <script>
    feather.replace({
      "stroke-width": 2.5,
      width: 16,
      height: 16,
    });

    const ps = new PerfectScrollbar("#sidebar-scroll", {
      wheelSpeed: 2,
      wheelPropagation: true,
      minScrollbarLength: 20,
    });
  </script>
</body>

</html>