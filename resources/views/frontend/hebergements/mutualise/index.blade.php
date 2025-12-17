@extends('frontend.layouts.base')

@section('content')
    <!-- HERO / BANNER -->
    <section class="hero-area text-center text-white py-5" style="background: linear-gradient(135deg, #355d93, #4178c0);">
        <div class="container">
            <h1 class="display-4 font-weight-bold">Hébergement Web Professionnel</h1>
            <p class="lead mt-3">Linux, Windows ou Cloud – Choisissez le plan adapté à vos besoins avec TICAFRIQUE</p>
            <a href="#hebergements" class="btn btn-light btn-lg mt-3 shadow-sm">Découvrez nos packs</a>
        </div>
    </section>

    <!-- HÉBERGEMENTS MUTUALISÉS -->
    <section class="section" id="hebergements">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h3>Nos <span>hébergements mutualisés</span></h3>
                <p class="text-muted">TICAFRIQUE vous propose des solutions d'hébergement adaptées à tous vos besoins :
                    Linux, Cloud et Windows.</p>
            </div>

            <div class="row text-center">
                <!-- LINUX -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-lg border-0 hover-scale">
                        <div class="card-header bg-success text-white position-relative">
                            <h5>Linux</h5>
                            <span class="badge badge-pill badge-light position-absolute"
                                style="top:10px; right:10px;"> <i class="bi bi-battery-charging"></i></span>
                        </div>
                        <div class="card-body">
                            <p>Hébergement Linux performant, compatible PHP, MySQL et CMS (WordPress, Joomla, Drupal...).
                            </p>
                            <ul class="list-unstyled text-left">
                                <li>✔ Espace disque : 50 Go à 500 Go</li>
                                <li>✔ Domaines hébergeables : 1 à illimité</li>
                                <li>✔ Emails POP/IMAP illimités</li>
                                <li>✔ cPanel convivial</li>
                                <li>✔ Support 24/7</li>
                            </ul>
                            <a href="{{ route('hebergement.linux') }}" class="btn btn-success btn-block mt-3 shadow-sm">Voir les plans Linux</a>
                        </div>
                    </div>
                </div>

                <!-- CLOUD -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-lg border-0 hover-scale">
                        <div class="card-header bg-info text-white position-relative">
                            <h5>Cloud</h5>
                            <span class="badge badge-pill badge-warning position-absolute" style="top:10px; right:10px;">
                                <i class="bi bi-battery-charging"></i></span>
                        </div>
                        <div class="card-body">
                            <p>Hébergement Cloud sécurisé et évolutif, pour sites web à fort trafic ou entreprises.</p>
                            <ul class="list-unstyled text-left">
                                <li>✔ Espace disque : illimité</li>
                                <li>✔ Bande passante : illimitée</li>
                                <li>✔ RAM : 2 Go à 6 Go</li>
                                <li>✔ CPU : 2 vCore à 6 vCore</li>
                                <li>✔ Certificat SSL gratuit</li>
                            </ul>
                            <a href="{{ route('hebergement.cloud') }}" class="btn btn-info btn-block mt-3 shadow-sm">Voir les plans Cloud</a>
                        </div>
                    </div>
                </div>

                <!-- WINDOWS -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-lg border-0 hover-scale">
                        <div class="card-header bg-warning text-white position-relative">
                            <h5>Windows</h5>
                            <span class="badge badge-pill badge-dark position-absolute"
                                style="top:10px; right:10px;"><i class="bi bi-battery-charging"></i></span>
                        </div>
                        <div class="card-body">
                            <p>Hébergement Windows stable et sécurisé, idéal pour applications ASP, .NET et bases de données
                                MSSQL.</p>
                            <ul class="list-unstyled text-left">
                                <li>✔ Espace disque : 100 Go à 750 Go</li>
                                <li>✔ Domaines hébergeables : 1 à 10</li>
                                <li>✔ Emails POP/IMAP illimités</li>
                                <li>✔ cPanel inclus</li>
                                <li>✔ Support technique 24/7</li>
                            </ul>
                            <a href="{{ route('hebergement.windows') }}" class="btn btn-warning btn-block mt-3 shadow-sm">Voir les plans
                                Windows</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CARACTÉRISTIQUES GÉNÉRALES -->
    <section class="section bg-light py-5">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h3>Pourquoi choisir <span>TICAFRIQUE ?</span></h3>
                <p class="text-muted">Avec un support professionnel et des infrastructures performantes, nous garantissons
                    la réussite de votre projet web.</p>
            </div>

            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="service-box p-4 shadow-sm h-100 hover-scale">
                        <i class="fa fa-server fa-3x mb-3 text-primary"></i>
                        <h5>Infrastructure de pointe</h5>
                        <p>Serveurs Dell haut de gamme et réseau sécurisé pour garantir 99,99% de disponibilité.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="service-box p-4 shadow-sm h-100 hover-scale">
                        <i class="fa fa-cogs fa-3x mb-3 text-primary"></i>
                        <h5>Support 24/7</h5>
                        <p>Une équipe dédiée pour vous assister à chaque sollicitation, avec des solutions personnalisées.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="service-box p-4 shadow-sm h-100 hover-scale">
                        <i class="fa fa-lock fa-3x mb-3 text-primary"></i>
                        <h5>Sécurité assurée</h5>
                        <p>Cryptage SSL, sauvegardes automatiques et protection contre les attaques pour vos sites web.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        /* Hover scale effect */
        .hover-scale {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-scale:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        /* Badge style */
        .badge {
            font-size: 0.8rem;
            padding: 0.4rem 0.7rem;
        }

        /* Card header gradient optional */
        .card-header {
            font-weight: bold;
            font-size: 1.1rem;
        }
    </style>
@endpush
