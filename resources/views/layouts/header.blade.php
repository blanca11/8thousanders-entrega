<header>
    <nav class="header__nav">
      <div class="header__logo">
        <a href="{{ route('home') }}">
          <img src="images/logo.png" alt="logo">
        </a>
        <div class="header__logo-overlay">
        </div>
      </div> 


      <ul class="header__menu" data-aos="fade-down">
        <li>
          <a href="{{ route('home') }}#reto">Reto</a>
        </li>
        <li>
          <a href="{{ route('home') }}#about-us">Quienes somos</a> 
        </li>
        <li>
           <a href="{{ route('prepFestival') }}">Prepara tu festival</a>
        </li>
        <li>
          <a href="{{ route('LondonWnd') }}">London Weekend</a> 
        </li>
        <li>
          <a href="{{ route('login') }}"><img src="images/user.png"></a> 
        </li>
      </ul>

      <ul class="header__menu-mobile" data-aos="fade-down">
        <li>
          <img src="images/menu.svg" alt="menu" />
        </li>
        <!-- MENÚ DESPLEGABLE MÓVIL -->
        <div class="mobile-dropdown" id="mobileDropdown">
          <a href="{{ route('home') }}#reto">Reto</a>
          <a href="{{ route('home') }}#about-us">Quiénes somos</a>
          <a href="{{ route('prepFestival') }}">Prepara tu festival</a>
          <a href="{{ route('LondonWnd') }}">London Weekend</a>
          <a href="{{ route('login') }}">Login</a>
        </div>

      </ul>
    </nav>


</header>