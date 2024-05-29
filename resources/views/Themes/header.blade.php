<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Encryption Tool</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="" class="logo d-flex align-items-center">
        <img src="assets/img/bnb3.png" alt=""    style="width:30px;">
        <span class="d-none d-lg-block text-black text" >Encryption Tool</span>
      </a>
      <!-- <i class="bi bi-list toggle-sidebar-btn"></i> -->
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

     <!--    <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li> -->
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @auth
                    {{ Auth::user()->name }} <span class="caret"></span>
                @else
                    admin <span class="caret"></span>
                @endauth
            </a>

            <div class="dropdown-menu dropdown-menu-right custom-container" aria-labelledby="navbarDropdown"> 
                @auth
                    <!-- <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a> -->
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else
                <button  class= " dropdown-item"onclick="window.location='<?php echo admin_url('auth/login'); ?>'" class="btn btn-primary">logout</button>

                    <!-- <a class="dropdown-item" href="{{ route('login') }}">Login</a> -->
                    <!-- @if (Route::has('register'))
                        <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                    @endif -->
                @endauth
            </div>
        </li> 
      </ul>
    </nav>
</header>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>
