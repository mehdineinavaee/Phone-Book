<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
    <span class="brand-text font-weight-light">پنل مدیریت</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar" style="direction: ltr">
    <div style="direction: rtl">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="fa fa-address-book"></i>
              <p>
                مخاطبین
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('contacts.create') }}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>مخاطب جدید</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('contacts.index') }}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>لیست مخاطبین</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
  </div>
  <!-- /.sidebar -->
</aside>