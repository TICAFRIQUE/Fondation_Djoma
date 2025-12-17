@extends('frontend.layouts.base')

@section('title', 'Hébergement Web Linux')

@section('content')

<!-- =====================================================
 HERO / PRICING
===================================================== -->
<section class="hero-pricing"
    style="background-image:url('{{ asset('assets/images/hebergement.jpg') }}');">

    <div class="hero-overlay"></div>

    <div class="container hero-content">

        <div class="hero-header text-center">
            <h1>Hébergement Web <span>Linux</span></h1>
            <p>
                Des solutions d’hébergement performantes, sécurisées et évolutives
                pour vos projets professionnels.
            </p>
        </div>

        <!-- TABLE PRICING -->
        <div class="pricing-table">

            <!-- COLONNE DES CARACTÉRISTIQUES -->
            <div class="pricing-column specs">
                <div class="pricing-header">
                    <h4>Caractéristiques</h4>
                </div>
                <ul>
                    <li>Espace disque</li>
                    <li>Domaines hébergeables</li>
                    <li>Bande passante</li>
                    <li>Comptes email</li>
                    <li>Nom de domaine</li>
                    <li>Système</li>
                    <li>Serveur HTTP</li>
                    <li>FTP sécurisé</li>
                    <li>DNS modifiable</li>
                    <li>Webmail</li>
                    <li>Bases de données</li>
                    <li>Support technique</li>
                    <li>Satisfait ou remboursé</li>
                </ul>
            </div>

            <!-- PACK PRÉSENCE -->
            <div class="pricing-column">
                <div class="pricing-header highlight">
                    <span class="price">54 000 CFA</span>
                    <h4>Présence</h4>
                </div>
                <ul>
                    <li>100 Go</li>
                    <li>1</li>
                    <li>1000 Go</li>
                    <li>100</li>
                    <li>.ci offert</li>
                    <li>CentOS 7</li>
                    <li>Apache 2.4</li>
                    <li>✔</li>
                    <li>✔</li>
                    <li>✔</li>
                    <li>3</li>
                    <li>Inclus</li>
                    <li>30 jours</li>
                </ul>
                <a href="{{ route('hebergement.commander') }}" class="btn-pricing">Commander</a>
            </div>

            <!-- PACK CONFORT -->
            <div class="pricing-column popular">
                <div class="pricing-header highlight">
                    <span class="badge">Recommandé</span>
                    <span class="price">90 000 CFA</span>
                    <h4>Confort Business</h4>
                </div>
                <ul>
                    <li>300 Go</li>
                    <li>3</li>
                    <li>3000 Go</li>
                    <li>300</li>
                    <li>.ci offert</li>
                    <li>CentOS 7</li>
                    <li>Apache 2.4</li>
                    <li>✔</li>
                    <li>✔</li>
                    <li>✔</li>
                    <li>10</li>
                    <li>Prioritaire</li>
                    <li>30 jours</li>
                </ul>
                <a href="{{ route('hebergement.commander') }}" class="btn-pricing primary">Commander</a>
            </div>

            <!-- PACK PRESTIGE -->
            <div class="pricing-column">
                <div class="pricing-header highlight">
                    <span class="price">102 000 CFA</span>
                    <h4>Prestige Pro</h4>
                </div>
                <ul>
                    <li>750 Go</li>
                    <li>10</li>
                    <li>Illimité</li>
                    <li>Illimité</li>
                    <li>.ci offert</li>
                    <li>CentOS 7</li>
                    <li>Apache 2.4</li>
                    <li>✔</li>
                    <li>✔</li>
                    <li>✔</li>
                    <li>20</li>
                    <li>Premium</li>
                    <li>30 jours</li>
                </ul>
                <a href="{{ route('hebergement.commander') }}" class="btn-pricing">Commander</a>
            </div>

        </div>
    </div>
</section>

<!-- =====================================================
 FEATURES
===================================================== -->
<section class="features-section">
    <div class="container">

        <div class="section-header text-center">
            <h2>Caractéristiques <span>techniques</span></h2>
            <p>Une infrastructure fiable pensée pour la performance et la sécurité.</p>
        </div>

        <div class="features-layout">
            <div class="features-grid">
                @foreach ([
                    ['cpanel.png','cPanel intuitif','Administration simple et rapide'],
                    ['disponibilite.png','Disponibilité 99.9%','Haute tolérance aux pannes'],
                    ['mondial.png','Accès mondial','Gestion depuis partout'],
                    ['support.png','Support 24/7','Assistance technique continue'],
                    ['application.png','Multi-applications','CMS, PHP, frameworks'],
                    ['serveur.png','Infrastructure sécurisée','Serveurs redondants']
                ] as $f)
                    <div class="feature-card">
                        <img src="{{ asset('assets/images/'.$f[0]) }}">
                        <h5>{{ $f[1] }}</h5>
                        <p>{{ $f[2] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="features-image">
                <img src="{{ asset('assets/images/server.png') }}">
            </div>
        </div>

    </div>
</section>

<!-- =====================================================
 WHY TICAFRIQUE
===================================================== -->
<section class="why-section">
    <div class="container">

        <div class="section-header text-center">
            <h2>Pourquoi choisir <span>TICAFRIQUE</span> ?</h2>
            <p>Un partenaire technologique fiable pour vos projets critiques.</p>
        </div>

        <div class="why-grid">
            @foreach ([
                ['fa-server','Infrastructure professionnelle'],
                ['fa-lock','Sécurité renforcée'],
                ['fa-wordpress','Gestion simplifiée'],
                ['fa-envelope','Emails professionnels'],
                ['fa-rocket','Déploiement rapide'],
                ['fa-cogs','Technologies avancées']
            ] as $w)
                <div class="why-card">
                    <i class="fa {{ $w[0] }}"></i>
                    <h5>{{ $w[1] }}</h5>
                    <p>Solutions conçues pour la performance et la fiabilité.</p>
                </div>
            @endforeach
        </div>

    </div>
</section>

@endsection
