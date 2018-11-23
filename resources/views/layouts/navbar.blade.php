<!-- NavBar -->
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid pt-1">
    <a class="navbar-brand" href="#"><small style="color: #ffffff;"><em><strong><img src="{{ url('/img/icon.ico') }}">{{ __('AzarineBag.id') }}</strong></em></small></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <a class="nav-item nav-link text-white" href="{!! route('/') !!}">{{ __('Home') }}</a>
        <div class="nav-item dropdown">
          <a href="" class="nav-link dropdown-toggle text-white" id="proDrop" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('Produk') }}</a>
          <div class="dropdown-menu" sty>
            <a href="" class="dropdown-item navHov">{{ __('Tas Import') }}</a>
            <a href="" class="dropdown-item navHov">{{ __('Tas Eksport') }}</a>
          </div>
        </div>
        <a class="nav-item nav-link text-white" href="#">{{ __('Contact') }}</a>
        <div class="nav-item dropdown">
          <a href="" class="nav-link dropdown-toggle text-white" id="nDrop" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span title="User">{{ Auth::user()?Auth::user()->name:'Guest' }}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="nDrop">
            @guest
              <a class="dropdown-item navHov" href="{!! route('login') !!}">{{ __('Login') }}</a>
              @if (Route::has('register'))
                <a href="{!! route('register') !!}" class="dropdown-item navHov">{{ __('Daftar') }}</a>
              @endif
              @else
                @if (Auth::user()->status === 'admin')
                  <a class="dropdown-item" href="{!! route('admin') !!}">{{ __('Admin Panel') }}</a>
                @else
                  <a class="dropdown-item" href="#">{{ __('Transaksi') }}</a>
                @endif
                <a class="dropdown-item" href="#">{{ __('Profile') }}</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
          </div>
        </div>
      </div>
  </div>
</nav>
<!-- End NavBar -->
