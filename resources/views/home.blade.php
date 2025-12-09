@extends('layouts.appSite')
@section('title', '8thousanders')
@section('content')
<section class="hero" id="home">
        <div class="hero-text">
            <h1>¡¡Atrévete!!</h1>
            <p>¿Cuáles son los festivales de música más atractivos del mundo? Seguramente habrá tantas
                respuestas como personas que respondan. La localidad dónde se celebra el festival, las
                condiciones del terreno y, sobre todo, el cartel, hacen que sea difícil ponerse de acuerdo.</p>
            <p>Pero nosotros hemos elegido 14 , son nuestros 14 ochomiles y el reto es “escalarlos” todos.</p>
            <p>Con o sin oxígeno, a pie o en patinete, en los dos lados del Atlántico, en invierno o en verano, todo
                da igual, excepto la música. </p>
            <a href="#newsletter">
              <button class="button-56" role="button" >¿Te apuntas?</button>
            </a>
        </div>
        <div class="hero-images">
            <div class="hero-images__izquierda">
                <div class="hero-images__izquierda__arriba formato">
                    <img src="images/glasto1.jpg" alt="sushi"/>
                </div>
                <div class="hero-images__izquierda__abajo formato">
                    <img src="images/hero2.jpg" alt="sushi"/>
                </div>
            </div>
            <div class="hero-images__derecha">
                <div class="hero-images__derecha__arriba formato">
                    <img src="images/hero.jpg" alt="sushi"/>
                </div>
                <div class="hero-images__derecha__abajo formato">
                    <img src="images/glasto2.jpg" alt="sushi"/>
                </div>
            </div>

        </div>
</section>

<section class="festivales" id="reto">
  <div class="festivales__texto festivales__titulo">
    <h2> EL RETO</h2>
  </div>

  <div class="festivales__col1">
    <div class="festivales__texto texto__col1">
      <p>Esta es nuestra selección. ¿Echas de menos algún estilo musical?. ¿Hemos olvidado grandes festivales?  ​</p>
      <p>Evidentemente hay otros, pero estos14 son nuetro objetivo y no hay nada como dirigir el foco a una meta concreta.​​</p>
    </div>
    <div class="map-container usmap">
      <img src="images/usMap.png" alt="Mapa" class="mapa">
      
      <!-- Coachella -->
      <div class="icono toggle-tooltip" style="top: 59%; left: 10%;">
        <img src="images/coachellaLogo.webp" alt="Icono">
        <div class="tooltip">
          <img src="images/coachellaLogo.webp" alt="Icono">
          <p>Coachella</p>
          <p>Escalado en 2014</p>
        </div>
      </div>
      <!-- Outside Lands-->
      <div class="icono toggle-tooltip" style="top: 39%; left: 5%;">
        <img src="images/outsidelandsLogo.jpg" alt="Icono">
        <div class="tooltip">
          <img src="images/outsidelandsLogo.jpg" alt="Icono">
          <p>Outside Lands</p>
          <p>Escalada Prevista: 2027</p>
        </div>
      </div>
      <!-- Summerfest -->
      <div class="icono toggle-tooltip" style="top: 28%; left: 57%;">
        <img src="images/SummerfestLogo.webp" alt="Icono">
        <div class="tooltip">
          <img src="images/SummerfestLogo.webp" alt="Icono">
          <p>Summerfest</p>
          <p>Escalada Prevista: 2028</p>
        </div>
      </div>
      <!-- Lolapalooza -->
      <div class="icono toggle-tooltip" style="top: 41%; left: 59%;">
        <img src="images/LollapaloozaLogo.webp" alt="Icono">
        <div class="tooltip">
          <img src="images/LollapaloozaLogo.webp" alt="Icono">
          <p>Lolapalooza</p>
          <p>Escalada Prevista: 2029</p>
        </div>
      </div>
      <!-- Governors ball -->
      <div class="icono toggle-tooltip" style="top: 31%; left: 80%;">
        <img src="images/GovernorsBallLogo.jpg" alt="Icono">
        <div class="tooltip">
          <img src="images/GovernorsBallLogo.jpg" alt="Icono">
          <p>Governors ball</p>
          <p>Escalada Prevista: 2030</p>
        </div>
      </div>
      <!-- Osheaga -->
      <div class="icono toggle-tooltip" style="top: 19%; left: 78%;">
        <img src="images/osheagaLogo.jpg" alt="Icono">
        <div class="tooltip">
          <img src="images/osheagaLogo.jpg" alt="Icono">
          <p>Osheaga</p>
          <p>Escalada Prevista: 2031</p>
        </div>
      </div>
      <!-- Austin -->
      <div class="icono toggle-tooltip" style="top: 67%; left: 47%;">
        <img src="images/austinLogo.jpg" alt="Icono">
        <div class="tooltip">
          <img src="images/austinLogo.jpg" alt="Icono">
          <p>Austin City Limits</p>
          <p>Escalada Prevista: 2026</p>
        </div>
      </div>
    </div>

  </div>

  <div class="festivales__col2">
    <div class="map-container eumap">
      <img src="images/europe2.png" alt="Mapa" class="mapa">
      
      <!-- Primavera -->
      <div class="icono toggle-tooltip" style="top: 81%; left: 27%;">
        <img src="images/primaveraLogo.png" alt="Icono">
        <div class="tooltip">
          <img src="images/primaveraLogo.png" alt="Icono">
          <p>Primavera Sound</p>
          <p>Escalado 14 veces</p>
        </div>
      </div>

      <!-- Roskilde -->
      <div class="icono toggle-tooltip" style="top: 43%; left: 46%;">
        <img src="images/roskildeLogo.jpg" alt="Icono">
        <div class="tooltip">
          <img src="images/roskildeLogo.jpg" alt="Icono">
          <p>Roskilde</p>
          <p>Escalada prevista: 2026</p>
        </div>
      </div>

      <!-- Leeds -->
      <div class="icono toggle-tooltip" style="top: 48%; left: 25%;">
        <img src="images/leedsLogo.jpeg" alt="Icono">
        <div class="tooltip">
          <img src="images/leedsLogo.jpeg" alt="Icono">
          <p>Leeds</p>
          <p>Escalada prevista: 2027</p>
        </div>
      </div>

      <!-- Glastonbury -->
      <div class="icono toggle-tooltip" style="top: 54%; left: 21%;">
        <img src="images/glastoLogo.png" alt="Icono">
        <div class="tooltip">
          <img src="images/glastoLogo.png" alt="Icono">
          <p>Glastonbury</p>
          <p>Escalado en 2023</p> 
        </div>
      </div>

      <!-- Iceland -->
      <div class="icono toggle-tooltip" style="top: 15%; left: 11%;">
        <img src="images/icelandLogo.jpg" alt="Icono">
        <div class="tooltip">
          <img src="images/icelandLogo.jpg" alt="Icono">
          <p>Iceland Airwaves</p>
          <p>Escalada prevista: 2025</p>
        </div>
      </div>

      <!-- Werchter -->
      <div class="icono toggle-tooltip" style="top: 59%; left: 35%;">
        <img src="images/werchterLogo.png" alt="Icono">
        <div class="tooltip">
          <img src="images/werchterLogo.png" alt="Icono">
          <p>Werchter</p>
          <p>Escalado en 2015</p>
        </div>
      </div>

      <!-- sziget -->
      <div class="icono toggle-tooltip" style="top: 65%; left: 59%;">
        <img src="images/sziget.png" alt="Icono">
        <div class="tooltip">
          <img src="images/sziget.png" alt="Icono">
          <p>Sziget</p>
          <p>Escalada prevista: 2029</p>
        </div>
      </div>
    </div>
    <div class="festivales__texto texto__col2">
      <p>Las montañas crecen, decrecen y la forma de
medir su altura cambia. Seguimos muy de cerca
otros candidatos a incorporar o a sustituir alguna
cima en declive.</p><p class="radar"> ​ <span class="link-container"><a href="{{ route('radar') }}" class="dotted-link">Tenemos el radar
          activado.<span class="dots-container">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
</span></a></span>​</p>
    </div>
  </div>
  

</section>

<section class="about-us" id="about-us">
  <h2 class="sushi__title">Quienes somos:</h2>
  <div class="about-us__row">
    <div class="about-us__image">
      <img src="images/glastoUs.jpeg" alt="Los 4 en Glastonbury" />
    </div>

    <div class="about-us__content ">
      <p class="about-us__description all__paragraphs">Blanca, Xixo, Miguel y Juanjo. Hemos escalado juntos el Everest (a.k.a. Glastonbury) y, al menos, tres de nosotros hemos estado en unos cuantos más.
      </p>
      <p class="about-us__description all__paragraphs">Pero nos faltan muchos y hemos decidido completar la lista, ya que nos une y nos divierte. 

        Para realizar un desafío de este calibre, verdaderamente se requiere una gran dosis de motivación..... y que mejor que viajar por el mundo, escuchar música y tomarnos unas cervezas en diferentes idiomas.</p>
      <p class="about-us__description all__paragraphs">Ojalá no seamos los únicos y haya muchos dispuestos a llegar al final antes que nosotros....y si lo hacemos juntos, mejor. </p>
      <a href="#newsletter">
        <button class="button-56" role="button" >¿Os animaís?</button>
      </a>
    </div>
  </div>
</section>

<section class="new-music">
  <div class="new-music__container">
  <!-- Columna 1: solo texto -->
  <div class="col col-text">
    <h2>Descubriendo</br> nueva música</h2>
    <p>
    Los ochomiles, además de la fiesta, ofrecen unos carteles plagados de artistas consagrados o al menos con una visible  trayectoria y cierto  reconocimiento, aunque sea en radios y revistas especializadas.​
    </p>
    <p>
    Existen varios festivales en los que las bandas y artistas emergentes son protagonistas. Los más importantes son el SXSW en Austin, Texas, y The Great Escape Festival en Brighton, UK.  Los últimos tres años hemos asistido en Nueva York al New Colossus, más pequeño, pero también muy interesante.​
    </p>
    <p>
    Ver a Fontaines DC en una pequeña sala con otras 80 personas en 2018 o tener a  Phoebe Bridgers a dos metros ese mismo año, cuando ellos no tenían un álbum y ella acababa de lanzar el primero, son cosas que pueden pasar en estos eventos. Y no se olvidan. ​
    </p>
  </div>

  <!-- Columna 2: tres fotos de tamaños distintos -->
  <div class="col col-photos-3">
    <img src="images/phoebe.jpg" alt="Foto 1" class="photo photo-medium"/>
    <img src="images/SXSW-Logo.jpg" alt="Foto 2" class="photo photo-medium"/>
    <img src="images/fontains.jpg" alt="Foto 3" class="photo photo-medium"/>
  </div>

  <!-- Columna 3: dos fotos de tamaños distintos -->
  <div class="col col-photos-2">
    <img src="images/new-colossus.jpg" alt="Foto 4" class="photo photo-large"/>
    <img src="images/TGElogo.jpeg" alt="Foto 5" class="photo photo-large"/>
  </div>
  </div>
</section>

<section class="servicios">
  <div class="servicios__festivales">
    <div>
        <img src="images/primavera.jpg" alt="">
    </div>
    <h2>Prepara tu festival by 8thousanders</h2>
    <p>Si ves más de 150 conciertos al año... no aprietes el botón</p>
    <p>Si conoces más del 40% de las bandas de un festival como el Primavera Sound... no aprietes el botón</p>
    <p>Si tienes tiempo para esccuchar previamente a las más de 600 bandas presentadas en The Great Escape... no aprietes el botón</p>
    <p>En caso contrario puede que te interese</p>
    <a href="{{ route('prepFestival') }}"></a>
      <button class="button-56" role="button" >Learn more</button>
    </a>
  </div>
  <div class="servicios__london">
    <div>
        <img src="images/ldnwnd.jpg" alt="">
    </div>
    <h2>London Weekend by 8thousanders</h2>
    <p>Si vas a Londres con frecuencia y el motivo es la música, no aprietes el botón</p>
    <p>Si escuchas 40 o 50 bandas para elegir las fechas de tu viaje musical a Londres, no aprietes el botón</p>
    <p>En caso contrario puede que te interese</p>
    <a href="{{ route('LondonWnd') }}"></a>
      <button class="button-56" role="button" >Learn more</button>
    </a>
  </div>
</section>
  
<section class="subscription flex-center" id="newsletter">
    <h2>
        Recibe playlists, planes de<br />"escalada"
        y sorpresas...
    </h2>
    <p>¡Regístrate en nuestra newsletter!</p>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <form class="subscription__form" method="POST" action="{{ route('newsletter.store') }}">
        @csrf
        <input
            type="email"
            name="email"
            placeholder="Introduce tu email"
            required
        />

        <button type="submit">Subscribirse</button>
    </form>
</section>
@endsection

@section('scripts')
    @vite(['resources/js/tooltip-map.js', 'resources/js/homeAnimations.js'])
@endsection
