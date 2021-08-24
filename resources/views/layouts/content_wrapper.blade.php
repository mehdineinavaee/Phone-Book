  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield('content-title')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            @include('layouts.breadcrumb')
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    @include('layouts.messages')
    <!-- /.content-header -->
    <div class="container">
      <div class="wor">
        <div class="col">
          @yield('content')
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->