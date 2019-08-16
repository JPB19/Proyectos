<link rel="stylesheet" href="/css/navbar.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
@if (!Request::is('index'))
<a href="index">
<img src="/images/logo-principal.png" alt="logo" class="logo">
</a>
@endif

<a href="#" class="toggle-nav">
  <span class="ion-navicon-round"></span>
</a>

<nav class="nav">
	<ul>
		<li><a href="/index">Home</a></li>
		<li><a href="/products">Productos</a></li>
		<li><a href="/preguntas">Preguntas</a></li>
		<li><a href="/login"><strong>Clientes</strong></a></li>
	</ul>

  @if (Auth::check() && Auth::user()->isadmin === 1 )
    <div class="nav-perfil">
        <a href="/admin">ADMINISTRADOR</a></li>
    </div>
  @endif

  {{-- @if (!Request::is('index', 'products', 'preguntas', 'register', 'login')) --}}
  @if (Auth::check())
  <div class="nav-perfil">
    <ul>
      <li><strong>User: {{ Auth::user()->name }}</strong></li>
      <li><strong><a href="home">Perfil</a></strong></li>
      <li><strong><a href="{{ route('logout') }}">{{ __('Cerrar sesión') }}</a></strong></li>

    </ul>
  </div>
@endif
  {{-- @endif --}}
</nav>

{{-- <div class="boton"><a href="login.php"><img src="images/icons/icon-logout.png" alt="" style="max-width: 10px;"></a></div> --}}

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
  $('.toggle-nav').click(function (e) {
  e.preventDefault();
  $('.nav').slideToggle('fast');
  });
</script>
