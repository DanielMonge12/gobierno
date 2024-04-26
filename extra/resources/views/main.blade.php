@extends('layouts.main')
@section('tittle', 'Dependencias')
@section('content') 
<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu de opciones
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#services">¿Que es Dependencias?</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Sobre Dependencias</a></li>
                    <li class="nav-item"><a class="nav-link" href="#Dependencias">Dependencias</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tramites">Tramites</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Equipo</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contacto</a></li><ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                 <!-- Authentication Links -->
                 @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.home') }}">
                                    {{ __('Dashboard') }}
                                </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <form id="perfil-form" action="{{ route('admin.home') }}" method="GET" class="d-none">
    @csrf
</form>
                                </div>
                            </li>
                        @endguest

            </ul>

        </nav>
                </ul>
            </div>
        </div>
    </nav>
 <!-- Masthead-->
 <header class="masthead" style="background-color: #000;">
        <div class="container">
            <div class="masthead-subheading" style="color: #00f;">Bienvenido a Dependencias!!</div>
            <div class="masthead-heading text-uppercase" style="color: #00f;">Aqui podras hacer todos tus tramites</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="#services">Saber mas!</a>
        </div>
    </header>



    <style>
    .container-main {
        background-color: #000000; /* Color de fondo negro */
        padding: 20px; /* Añadir espaciado interior para separar el contenido del borde */
    }

    .card {
        background-color: #ffffff; /* Color de fondo blanco para las tarjetas */
        border: 1px solid #000000; /* Borde negro alrededor de las tarjetas */
    }

    .card-body {
        color: #000000; /* Texto negro dentro de las tarjetas */
    }

    .card-footer {
        background-color: #ffffff; /* Color de fondo blanco para el pie de las tarjetas */
    }

    .btn {
        color: #ffffff; /* Color del texto del botón en blanco */
        background-color: #000000; /* Fondo negro para el botón */
        border-color: #000000; /* Borde negro para el botón */
    }
</style>

<div class="container-main">
    <div class="container">
        <div class="row">
            @php $counter = 0 @endphp
            @foreach ($dependencias as $dependencia)
                @if ($counter < 6)
                    <div class="col-md-2 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $dependencia->nombre }}</h5>
                                <p class="card-text">Teléfono: {{ $dependencia->telefono }}</p>
                            </div>

                        </div>
                    </div>
                    @php $counter++ @endphp
                @else
                    @break
                @endif
            @endforeach
        </div>
    </div>
</div>



    <!-- Services-->
    <section class="page-section bg-black"  id="services" >
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase" style="color: #00f;">¿Que es Dependencias?</h2>
                <h3 class="section-subheading text-muted" style="color: #00f;">lalalallala</h3>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                    <img src="https://egob.grupoicarus.com.mx/assets/img/head-tramite.jpg" width="200" height="200"/>
                    <h4 class="my-3">Tramites</h4>
                    <p class="text-muted" style="color: #00f;">Aqui podras hacer cualquier tramite en cualquier dependencia del gobierno.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                    <img src="https://www.marketerdigital.com.mx/wp-content/uploads/2022/02/que-son-las-plataformas-digitales.jpg.webp" width="200" height="200"/>
                    <h4 class="my-3">Plataformas</h4>
                    <p class="text-muted">Es una pagina web que puedes acceder desde cualquier dispositipo.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                    <img src="https://compranetinfo.hacienda.gob.mx/descargas/img_ucg/GF.jpg" width="200" height="200"/>
                    <h4 class="my-3">Dependencias</h4>
                    <p class="text-muted">En esta pagina puedes encontrar cualquier dependencia del gobiernro.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio Grid-->
    <section class="page-section bg-black" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Sobre Dependencias</h2>
                <h3 class="section-subheading text-muted">Un poco de dependencias.</h3>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 1-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="https://egob.grupoicarus.com.mx/assets/img/head-tramite.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Tramites</div>
                            <div class="portfolio-caption-subheading text-muted">Mira mas.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 2-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="https://i0.wp.com/derechoenmexico.mx/wp-content/uploads/2019/02/LOS-15-TR%C3%81MITES-DIGITALES-M%C3%81S-UTILIZADOS-EN-M%C3%89XICO.jpg?fit=1016%2C765&ssl=1" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Tipos</div>
                            <div class="portfolio-caption-subheading text-muted">Mira mas.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 3-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="https://compranetinfo.hacienda.gob.mx/descargas/img_ucg/GF.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Dependencias</div>
                            <div class="portfolio-caption-subheading text-muted">Mira mas.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">


                <div class="container">
                <div class="container">
                <div class="row">












     <!-- Team-->
    <section class="page-section bg-black" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Equipo</h2>
                <h3 class="section-subheading text-muted">Desarolladores de Dependencias.</h3>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="images/team/1.jpeg" alt="..." />
                        <h4> Daniel Monge</h4>
                        <p class="text-muted">Creador</p>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/eduardo.monge.92123" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="images/team/2.jpg" alt="..." />
                        <h4> ChatGPT</h4>
                        <p class="text-muted">Creador</p>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/profile.php?id=61557733553450" aria-label="Diana Petersen Twitter Profile"><i class="fab fa-twitter"></i></a>
                       </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="images/team/3.png" alt="..." />
                        <h4>Julio Vasquez</h4>
                        <p class="text-muted">Disenador</p>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/julio.vasquez.15" aria-label="Larry Parker Twitter Profile"><i class="fab fa-twitter"></i></a>
                       </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Un poco de los creadores del juego.</p></div>
            </div>
        </div>
    </section>
    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contactanos</h2>
                <h3 class="section-subheading text-muted">Cualquier duda mandanos un mensaje.</h3>
            </div>
            <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- Name input-->
                            <input class="form-control" id="name" type="text" placeholder="Nombre *" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="name:required">Requiere un nombre.</div>
                        </div>
                        <div class="form-group">
                            <!-- Email address input-->
                            <input class="form-control" id="email" type="email" placeholder="Correo *" data-sb-validations="required,email" />
                            <div class="invalid-feedback" data-sb-feedback="email:required">Requiere un correo.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <div class="form-group mb-md-0">
                            <!-- Phone number input-->
                            <input class="form-control" id="phone" type="tel" placeholder="Telefono *" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="phone:required">Requiere un numero.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <!-- Message input-->
                            <textarea class="form-control" id="message" placeholder="Mensaje *" data-sb-validations="required"></textarea>
                            <div class="invalid-feedback" data-sb-feedback="message:required">Requiere un mensaje .</div>
                        </div>
                    </div>
                </div>
                <div class="d-none" id="submitSuccessMessage">
                    <div class="text-center text-white mb-3">
                        <div class="fw-bolder">Se ha enviado correctamente!</div>
                        To activate this form, sign up at
                        <br />
                        <a href="Iniciar sesion"></a>
                    </div>
                </div>

                <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                <!-- Submit Button-->
                <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">Send Message</button></div>
            </form>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy;  UTH 2024</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="https://twitter.com/elmarianaa" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/eduardo.monge.92123" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://www.linkedin.com/in/daniel-monge-1875122bb/" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Dependencias</a>
                    <a class="link-dark text-decoration-none" href="#!"></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Portfolio Modals-->
    <!-- Portfolio item 1 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="images/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Tramites</h2>
                                <p class="item-intro text-muted">Un poco sobre los bloques de Minecraft.</p>
                                <img class="img-fluid d-block mx-auto" src="https://egob.grupoicarus.com.mx/assets/img/head-tramite.jpg" alt="..." />
                                <p> los trámites son procesos administrativos que las personas, empresas u organizaciones deben realizar para obtener un beneficio, cumplir con una obligación legal o realizar alguna gestión ante una entidad pública o privada.</p>
                                
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 2 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="images/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Tipos</h2>
                                <p class="item-intro text-muted">Un poco sobre los Tipos</p>
                                <img class="img-fluid d-block mx-auto" src="https://i0.wp.com/derechoenmexico.mx/wp-content/uploads/2019/02/LOS-15-TR%C3%81MITES-DIGITALES-M%C3%81S-UTILIZADOS-EN-M%C3%89XICO.jpg?fit=1016%2C765&ssl=1" alt="..." />
                                <p>Tipos de Trámites:
Descubre los diferentes tipos de trámites disponibles según su categoría. Encuentra rápidamente lo que necesitas entre trámites administrativos, legales, fiscales, de salud, educativos, migratorios y más. Simplifica tu búsqueda y accede fácilmente a la información y formularios necesarios para realizar tus gestiones con eficacia.</p>
                             
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio item 3 modal popup-->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal"><img src="x" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project details-->
                                <h2 class="text-uppercase">Dependencias</h2>
                                <p class="item-intro text-muted">Un poco sobre las dependencias que existen.</p>
                                <img class="img-fluid d-block mx-auto" src="https://compranetinfo.hacienda.gob.mx/descargas/img_ucg/GF.jpg" alt="..." />
                                <p>Algunos ejemplos comunes de dependencias de gobierno son: Oficinas y Comisiones, Institutos y Agencias, Secretarías y Ministerios.</p>
                              
                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                    <i class="fas fa-xmark me-1"></i>
                                    Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
@endsection