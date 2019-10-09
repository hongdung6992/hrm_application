<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <button class="btn nav-link" data-toggle="dropdown">
        <i class="fas fa-cog"></i>
      </button>
      <div class="dropdown-menu dropdown-menu-right">
        <a href={{ route('profile.index') }} class="dropdown-item">
          <i class="fas fa-user mr-2"></i> {{ t('profile.info') }}
        </a>
        <div class="dropdown-divider"></div>
        <a href={{ route('logout') }} class="dropdown-item">
          <i class="fas fa-sign-out-alt mr-2"></i> {{ t('action.logout') }}
        </a>
      </div>
    </li>
  </ul>
</nav>
