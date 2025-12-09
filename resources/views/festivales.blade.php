@extends('layouts.appSite')
@section('title', 'Prepara tu festival')
@section('content')

<body>
  <div class="page">

    <!-- HERO -->
    <section class="serv-hero">
      <div>
        <h1 class="serv-hero__title">Prepara tu Festival como un Pro</h1>
        <p class="serv-hero__subtitle">
          Descubre a las mejores bandas sin invertir horas escuchando miles de artistas.
          <span class="em">“Prepara tu Festival” by 8thousanders.</span>
        </p>
        <p><strong>¿Eres de los que…?</strong></p>
        <p class="serv-hero__q">
          ¿Ves más de 100 conciertos al año?
        </p>
        <p class="serv-hero__q">
          ¿Conoces más del 40% de las bandas del Primavera Sound?
        </p>
        <p class="serv-hero__q">
          ¿Tienes tiempo para escuchar las más de 500 bandas que actúan en festivales como The Great Escape y preparar tu agenda?
        </p>

        <div class="cta-group">
          <a href="#" class="btn btn-primary js-btn-si">
            Sí
          </a>
          <a href="#" class="btn btn-ghost js-btn-no">
            No
          </a>
        </div>
      </div>

      <div class="serv-hero__image">
        <div class="serv-hero__tag">
          <span></span>
          Más de 200 actuaciones al año, 90% bandas emergentes.
        </div>
      </div>
    </section>

    <!-- CONTENIDO SI (se muestra si el usuario hace clic en "Sí") -->
    <div id="content-yes" class="js-toggle-section serv-hidden">

      <div class="divider"></div>

      <!-- QUÉ ES -->
      <section>
        <h2 class="section-title">Seguro que te interesa: “Prepara tu Festival” by 8thousanders.</h2>

        <div class="split-cards">
          <!-- why us -->
          <article class="card flow-text">
            <p>
              En el<span class="highlight"> Primavera Sound 2026</span> actuan<span class="highlight"> más de 150 bandas y artistas.</span>
            </p>
            <p>
              Has contestado que <span class="highlight">NO</span> conoces ni el 40% y que no tienes tiempo de preparar tu agenda escuchando a todos.
            </p>
            <p>
              Nosotros sí los conocemos y es posible que hayamos visto en directo a gran parte de ellos, ya que asistimos a alrededor de <span class="highlight">200 actuaciones al año</span>, de las que el <span class="highlight">90% son bandas emergentes.</span>
            </p>
          </article>

          <!-- que es prepara tu festival -->
          <article class="card flow-text">
            <p>
              <span class="highlight">Prepara tu Festival</span> es el servicio que te ayuda a crear una agenda ideal para tu festival:
              sin estrés, sin perder tiempo y con la tranquilidad de que no te vas a dejar pasar a esas bandas que, dentro de unos años, estarán encabezando carteles.
            </p>
            <p>
              Analizamos el cartel, escuchamos las bandas, cruzamos horarios y escenarios y te proponemos
              un recorrido optimizado para que disfrutes <span class="highlight">más música en menos tiempo</span>.
            </p>
          </article>
        </div>
      </section>

      <!-- OPCIONES DE PREPARACION -->
      <section>
        <h2 class="section-title">Elige cómo quieres preparar tu festival</h2>

        <div class="split-cards">
          <!-- Itinerario general -->
          <article class="card">
            <div class="pill">
              <span></span> Itinerario general
            </div>
            <h3>Plan base para no perderte lo importante</h3>
            <p class="flow-text">
              Ideal si quieres una guía curada pero rápida, sin necesidad de personalización.
            </p>
            <ul class="list">
              <li>Selección de bandas recomendadas por día.</li>
              <li>Rutas por escenarios para minimizar desplazamientos.</li>
              <li>Destacamos artistas emergentes que merecen tu atención.</li>
              <li>Versión descargable para llevar en el móvil.</li>
            </ul>
            <div style="margin-top:1rem;">
              <a href="{{ route('home') }}#newsletter" class="btn btn-primary">Recibir itinerario general</a>
            </div>
          </article>

          <!-- Itinerario personalizado -->
          <article class="card">
            <div class="pill">
              <span></span> Itinerario personalizado
            </div>
            <h3>Agenda hecha a tu medida</h3>
            <p class="flow-text">
              Para quienes quieren exprimir el festival al máximo con una planificación totalmente ajustada a sus gustos.
            </p>
            <ul class="list">
              <li>Cuestionario previo sobre tus gustos musicales.</li>
              <li>Agenda día a día, con franjas horarias y escenarios.</li>
              <li>Alternativas cuando hay solapamientos entre conciertos.</li>
              <li>Notas sobre bandas nuevas que creemos que te encantarán.</li>
            </ul>
            <div style="margin-top:1rem;">
              <a href="{{ route('contacto') }}" class="btn btn-ghost">Solicitar itinerario personalizado</a>
            </div>
          </article>
        </div>
      </section>

      <!-- FAQ + CTA FINAL -->
      <section>
        <div class="section-label">Dudas frecuentes</div>
        <h2 class="section-title">FAQ</h2>

        <div class="faq">
          <div class="faq-item">
            <h3>¿Qué festivales cubrís?</h3>
            <p>
              Empezamos con festivales como Primavera Sound y The Great Escape, pero podemos estudiar
              cualquier festival con suficiente antelación.
            </p>
          </div>
          <div class="faq-item">
            <h3>¿Cuándo recibiré mi itinerario?</h3>
            <p>
              El itinerario general se envía unos días después de registrarte.
              El personalizado lo recibirás en el plazo acordado una vez rellenes el formulario.
            </p>
          </div>
          <div class="faq-item">
            <h3>¿Cómo hacéis las recomendaciones?</h3>
            <p>
              Vemos alrededor de 200 actuaciones al año, con especial foco en bandas emergentes, y cruzamos
              nuestra experiencia con tus gustos y la programación del festival.
            </p>
          </div>
        </div>

        <div class="cta-final">
          <p>¿Listo para vivir tu próximo festival sin perderte nada?</p>
          <div class="cta-group" style="justify-content:center;">
            <a href="{{ route('home') }}#newsletter" class="btn btn-primary">Recibir itinerario general</a>
            <a href="{{ route('contacto') }}" class="btn btn-ghost">Quiero un itinerario personalizado</a>
          </div>
        </div>
      </section>
    </div>

    <!-- CONTENIDO NO (se muestra si el usuario hace clic en "No") -->
    <div id="content-no" class="js-toggle-section serv-hidden">
      <section class="serv-no">
        <h2>Esto no es para ti, nos vemos allí.</h2>
        <p>
          Si ya tienes tus festivales bajo control y prefieres descubrir bandas sobre la marcha,
          ¡disfruta del festival a tu manera! 🤘
        </p>
      </section>
    </div>

  </div>
</body>


@endsection

@section('scripts')
    @vite('resources/js/botonesSiNo.js')
@endsection