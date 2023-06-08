<style>
header {
  background-color: #fff;
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
  padding: 10px;
}

nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  max-width: 960px;
  margin: 0 auto;
}

.logo {
  font-size: 28px;
  font-weight: bold;
  color: #333;
}

.logo a {
  text-decoration: none;
  color: #333;
}

nav ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  display: flex;
}

nav li {
  margin: 0 10px;
}

nav li a {
  display: block;
  color: #333;
  text-decoration: none;
  text-transform: uppercase;
  font-weight: bold;
  padding: 10px;
  transition: all 0.3s ease-in-out;
}

nav li a:hover {
  color: #fff;
  border-radius: 4px;
}

.bg-custom-1 {
  background-color: #85144b;
}

.bg-custom-2 {
background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
}
.navbar-toggler{
  background: #eee;
  border-radius: 10px;
}
.navbar-toggler-icon{
  background: #aaa;
  border-radius: 10px;
}
*{
  font-family: 'Poppins', sans-serif !important;
}
</style>
<header class="sticky-top ">
  <nav class="navbar navbar-expand-lg ">
    <a class="navbar-brand" href="/">
        <img src="{{ URL::to('/') }}/img/logo/logo.png" alt="logo" width="130">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#destinasi">Destinasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#explore">Explore</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#event">Event</a>
        </li>
        @if (Auth::guard('admin')->user() != null)
          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/') }}">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.logout.submit') }}" onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">Log Out</a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{ url('register-pengunjung') }}">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/login') }}">Login</a>
          </li>
        @endif
      </ul>
    </div>
  </nav>
</header>

<form id="admin-logout-form" action="{{ route('admin.logout.submit') }}" method="POST" style="display: none;">
  @csrf
</form>
