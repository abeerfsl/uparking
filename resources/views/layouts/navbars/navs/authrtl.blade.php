<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <div class="navbar-toggle d-inline">
        <button type="button" class="navbar-toggler">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <a class="navbar-brand" style=" color:#000000;" href="#">{{ $page ?? __('الصفحة الرئيسية') }}</a>
  </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-bar navbar-kebab"></span>
      <span class="navbar-toggler-bar navbar-kebab"></span>
      <span class="navbar-toggler-bar navbar-kebab"></span>
    </button>
    <div class="collapse navbar-collapse" id="navigation">
      <ul class="navbar-nav  mr-auto">
        <li class="dropdown nav-item">
          <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <div class="photo">
                  <img src="{{ asset('black') }}/img/default-avatar.png" alt="{{ __('Profile Photo') }}">
              </div>

              <b class="caret d-none d-lg-block d-xl-block"></b>
              <p class="d-lg-none">{{ __('تسجيل الخروج') }}</p>
          </a>
          <ul class="dropdown-menu dropdown-navbar">
            <li class="nav-link">
                <a class="nav-item dropdown-item"style=" background-color:#000000;color:#ffffff;">{{Auth::user()->name }}</a>
            </li>
              <li class="nav-link">
                  <a href="{{ route('profile.editrtl') }}" class="nav-item dropdown-item">{{ __('الصفحة الشخصية') }}</a>
              </li>
              <li class="dropdown-divider"></li>
              <li class="nav-link">
                  <a href="{{ route('logout') }}" class="nav-item dropdown-item" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">{{ __('تسجيل الخروج') }}</a>
              </li>
          </ul>
        </li>
        <li class="separator d-lg-none"></li>
      </ul>
    </div>
  </div>
</nav>
