@extends('layouts.app')

@section('content')
    <!-- Estilo de fondo general -->
    <style>
        body {
            background: linear-gradient(135deg, #262626, #0D0D0D);
            color: white;
        }

        .dark-section {
            background: linear-gradient(135deg, #595959, #262626);
            border-radius: 15px;
            padding: 50px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
        }

        .text-light-gray {
            color: #A6A6A6;
        }
    </style>
    <!-- Barra de navegación fija -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Webinar de Emprendimiento</a>
            <a href="{{ route('landing.index') }}" class="btn btn-warning">Comenzar</a>
        </div>
    </nav>

    <!-- Espaciado para que el contenido no quede oculto detrás del navbar -->
    <div style="margin-top: 80px;"></div>

    <!-- Sección de Próximo Webinar -->
<div class="container text-center dark-section shadow-lg rounded">
    <h2 class="fw-bold">Nuestro Próximo Webinar</h2>
    <p class="lead">Descubre cómo transformar una idea en un negocio rentable. Desde la conceptualización hasta la comercialización y facturación, este evento te brindará las claves para escalar tu emprendimiento con éxito.</p>

    <div class="card bg-dark text-light mt-3 mx-auto p-4" style="max-width: 700px; border-radius: 15px;">
        <div class="row text-center">
            <div class="col-md-5">
                <h5 class="fw-bold mb-1">📅 Fecha:</h5>
                <p>28 de marzo de 2025</p>
            </div>
            <div class="col-md-2 d-flex align-items-center justify-content-center">
                <div style="width: 2px; height: 50px; background-color: rgba(255, 255, 255, 0.2);"></div>
            </div>
            <div class="col-md-5">
                <h5 class="fw-bold mb-1">⌚ Hora:</h5>
                <p>7:00 PM - 10:00 PM</p>
            </div>
        </div>

        <div class="row text-center mt-3">
            <div class="col-md-5">
                <h5 class="fw-bold mb-1">📍 Modalidad:</h5>
                <p>Online (Zoom)</p>
            </div>
            <div class="col-md-2 d-flex align-items-center justify-content-center">
                <div style="width: 2px; height: 50px; background-color: rgba(255, 255, 255, 0.2);"></div>
            </div>
            <div class="col-md-5">
                <h5 class="fw-bold mb-1">💰 Precio:</h5>
                <p>$100.00 MXN</p>
            </div>
        </div>
    </div>

    <a href="{{ route('landing.index') }}" class="btn btn-lg btn-warning mt-3 shadow">Regístrate Ahora</a>
</div>



    <!-- Historial de Webinars -->
    <div class="container mt-5 py-5 text-center shadow-lg rounded dark-section">
        <h2 class="fw-bold">Historial de Webinars</h2>
        <div id="webinarCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <img src="{{ asset('images/Ponente.png') }}" class="img-fluid rounded shadow-sm" width="40%">
                        </div>
                        <div class="col-md-7 text-start">
                            <h3>Cómo iniciar un negocio con éxito</h3><br>
                            <p>Fecha: 15 de enero de 2024</p>
                            <p>Ponente: Dr. César Lozano</p>
                            <p>Aprende los fundamentos esenciales para lanzar tu propio negocio desde cero.
                                Descubre estrategias para validar tu idea, estructurar tu modelo de negocio y
                                evitar errores comunes que pueden afectar tu crecimiento.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <img src="{{ asset('images/Ponente.png') }}" class="img-fluid rounded shadow-sm" width="40%">
                        </div>
                        <div class="col-md-7 text-start">
                            <h3>Estrategias de Marketing Digital</h3><br>
                            <p>Fecha: 5 de febrero de 2024</p>
                            <p>Ponente: Dr. César Lozano</p>
                            <p>Domina las herramientas clave del marketing digital para aumentar la visibilidad
                                de tu negocio. Aprende a utilizar redes sociales, publicidad pagada y SEO para
                                atraer clientes potenciales y hacer crecer tu marca en línea</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <img src="{{ asset('images/Ponente.png') }}" class="img-fluid rounded shadow-sm" width="40%">
                        </div>
                        <div class="col-md-7 text-start">
                            <h3>Finanzas para emprendedores</h3><br>
                            <p>Fecha: 10 de marzo de 2024</p>
                            <p>Ponente: Dr. César Lozano</p>
                            <p>Gestionar las finanzas es crucial para cualquier negocio. En este webinar,
                                aprenderás a administrar tu flujo de caja, calcular costos, establecer precios
                                estratégicos y tomar decisiones financieras inteligentes para la sostenibilidad
                                de tu empresa.</p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#webinarCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#webinarCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>

    <!-- Sección de videos de testimonios con carrusel -->
    <div class="container mt-5 py-5 text-center shadow-lg rounded dark-section">
        <h2 class="text-center fw-bold" style="color: #f0f2f3;">Testimonios en Video</h2>
        <div id="videoCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <video width="50%" class="shadow-lg rounded" controls>
                        <source src="{{ asset('videos/testimonio1.mp4') }}" type="video/mp4">
                        Tu navegador no soporta videos.
                    </video>
                </div>
                <div class="carousel-item">
                    <video width="50%" class="shadow-lg rounded" controls>
                        <source src="{{ asset('videos/testimonio2.mp4') }}" type="video/mp4">
                        Tu navegador no soporta videos.
                    </video>
                </div>
                <div class="carousel-item">
                    <video width="50%" class="shadow-lg rounded" controls>
                        <source src="{{ asset('videos/testimonio3.mp4') }}" type="video/mp4">
                        Tu navegador no soporta videos.
                    </video>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#videoCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#videoCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>

    <!-- Sección de beneficios -->
    <div class="container mt-5 py-5 text-center shadow-lg rounded dark-section">
        <h2 class="text-center fw-bold">¿Qué aprenderás en el webinar?</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <img src="{{ asset('images/Foco.png') }}" width="80">
                <p class="mt-3 fw-medium">Cómo desarrollar una idea de negocio</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/Estrategia.png') }}" width="80">
                <p class="mt-3 fw-medium">Estrategias de comercialización</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/Facturar.png') }}" width="80">
                <p class="mt-3 fw-medium">Cómo empezar a facturar</p>
            </div>
        </div>
    </div>

    <!-- Sección de testimonios -->
    <div class="container mt-5 py-5 text-center shadow-lg rounded dark-section">
        <h2 class="text-center fw-bold">Lo que dicen nuestros asistentes</h2>
        <div class="row mt-4 text-center">
            <div class="col-md-4">
                <blockquote class="blockquote">
                    <p class="fst-italic">“Este webinar cambió mi forma de emprender. Lo recomiendo al 100%.”</p>
                    <footer class="blockquote-footer">María López</footer>
                </blockquote>
            </div>
            <div class="col-md-4">
                <blockquote class="blockquote">
                    <p class="fst-italic">“Aprendí estrategias clave que me ayudaron a vender más.”</p>
                    <footer class="blockquote-footer">Carlos Jiménez</footer>
                </blockquote>
            </div>
            <div class="col-md-4">
                <blockquote class="blockquote">
                    <p class="fst-italic">“Ahora tengo un negocio rentable gracias a este webinar.”</p>
                    <footer class="blockquote-footer">Ana Rodríguez</footer>
                </blockquote>
            </div>
        </div>
    </div>
@endsection
