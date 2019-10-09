<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href={{ route('dashboard.index') }} class="brand-link">
    <img src={{ asset('assets/img/AdminLTELogo.png') }} alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">{{ t('system.hrm') }}</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src={{ asset('assets/img/' . $avatar) }} class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href={{ route('profile.index') }} class="d-block">{{ $name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    @include('admin.layouts.menu')
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
