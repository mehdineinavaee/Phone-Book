<style>
  @font-face {
    font-family: "vazir";
    src: url('{{ asset('/Fonts/Vazir.TTF') }}'),
    url('{{ asset('/Fonts/Vazir.eot') }}'),
    url('{{ asset('/Fonts/Vazir.woff') }}');
  }

  @font-face {
    font-family: "bmitrabold";
    src: url('{{ asset('/Fonts/BMitraBd.ttf') }}');
  }

  @font-face {
    font-family: "shabnam";
    src: url('{{ asset('/Fonts/Shabnam.eot') }}'),
    url('{{ asset('/Fonts/Shabnam.woff') }}'),
    url('{{ asset('/Fonts/Shabnam.ttf') }}');
    font-weight: bold;
  }

  @font-face {
    font-family: "shabnambold";
    src: url('{{ asset('/Fonts/Shabnam-Bold.eot') }}'),
    url('{{ asset('/Fonts/Shabnam-Bold.woff') }}'),
    url('{{ asset('/Fonts/Shabnam-Bold.ttf') }}');
    font-weight: bold;
  }
</style>

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700') }}" rel="stylesheet">
  <!-- bootstrap rtl -->
  <link rel="stylesheet" href="{{ asset('dist/css/bootstrap-rtl.min.css') }}">
  <!-- template rtl version -->
  <link rel="stylesheet" href="{{ asset('dist/css/custom-style.css') }}">
  <!-- my css -->
  <link rel="stylesheet" href="{{ asset('dist/css/mycss.css') }}">
  <!-- Data Table -->
  <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
  <!-- toastr -->
  <link rel="stylesheet" href="{{ asset('toastr/toastr.css') }}">
  <!-- sweetalert2 -->
  <link rel="stylesheet" href="{{ asset('sweetalert2/sweetalert2.min.css') }}">