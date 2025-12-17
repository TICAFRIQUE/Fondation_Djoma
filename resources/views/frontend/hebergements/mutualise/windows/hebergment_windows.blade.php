@extends('frontend.layouts.base')

@section('content')
    @php
        // 1. Les libellés de la colonne de gauche
        $features = [
            'Espace disque',
            'Nombre de domaines',
            'Email compte POP',
            'Nom domaine',
            'Système d\'exploitation',
            'Serveur HTTP',
            'Accès FTP privé',
            'Statistiques',
            'Modification de DNS',
            'Webmail',
            'Configuration Outlook',
            'Base de données',
            'Support technique',
            'Satisfait ou remboursé',
        ];

        // 2. Les packs de prix
        $plans = [
            [
                'title' => 'Présence',
                'price' => '3000 CFA HT / mois',
                'color' => '#355d93',
                'features' => [
                    '100 Go',
                    '1',
                    '100',
                    '.Ci offert',
                    'Centos 7',
                    'Apache 2.4',
                    '2',
                    'Inclus',
                    '✓',
                    '✓',
                    '✓',
                    '3',
                    'Inclus',
                    '30 jours',
                ],
                'link' => 'webcompte_presence_windows.php',
            ],
            [
                'title' => 'Confort',
                'price' => '5000 CFA HT / mois',
                'color' => '#4178c0',
                'features' => [
                    '300 Go',
                    '3',
                    '300',
                    '.Ci offert',
                    'Centos 7',
                    'Apache 2.4',
                    '3',
                    'Inclus',
                    '✓',
                    '✓',
                    '✓',
                    '10',
                    'Inclus',
                    '30 jours',
                ],
                'link' => 'webcompte_confort_windows.php',
            ],
            [
                'title' => 'Prestige',
                'price' => '7000 CFA HT / mois',
                'color' => '#ff8c00',
                'features' => [
                    '750 Go',
                    '10',
                    '1000',
                    '.Ci offert',
                    'Centos 7',
                    'Apache 2.4',
                    '10',
                    'Inclus',
                    '✓',
                    '✓',
                    '✓',
                    '20',
                    'Inclus',
                    '30 jours',
                ],
                'link' => 'webcompte_prestige_windows.php',
            ],
            [
                'title' => 'Autres',
                'price' => 'Sur mesure',
                'color' => '#6c757d',
                'features' => ['Contactez-nous pour un plan spécifique'],
                'link' => 'contact.php',
            ],
        ];

        // 3. Caractéristiques avec icônes
        $featuresWin = [
            ['icon' => 'cpanel.png', 'title' => 'CPANEL convivial', 'desc' => 'Gestion simplifiée avec TICAFRIQUE.'],
            [
                'icon' => 'disponibilite.png',
                'title' => '99.9% Disponibilité',
                'desc' => 'Service garanti ou remboursé.',
            ],
            ['icon' => 'mondial.png', 'title' => 'Accès mondial', 'desc' => 'Accédez à vos données partout.'],
            ['icon' => 'support.png', 'title' => 'Support 24h/7', 'desc' => 'Une équipe à votre écoute.'],
            ['icon' => 'application.png', 'title' => 'Multi-apps', 'desc' => 'Compatible PHP, CMS, ASP.'],
            ['icon' => 'serveur.png', 'title' => 'Serveur Stable', 'desc' => 'Infrastructure haute performance.'],
        ];

        // 4. Services (Bas de page)
        $services = [
            ['icon' => 'fa-server', 'title' => 'Infrastructure', 'desc' => 'Serveurs Dell haut de gamme.'],
            ['icon' => 'fa-wordpress', 'title' => 'Admin Console', 'desc' => 'Interface cPanel incluse.'],
            ['icon' => 'fa-envelope', 'title' => 'Emails Pros', 'desc' => 'Comptes illimités & Webmail.'],
            ['icon' => 'fa-shield-halved', 'title' => 'Sécurité', 'desc' => 'Cryptage SSL & FTP sécurisé.'],
        ];
    @endphp

    {{-- BANNIÈRE --}}
    <section class="hero-banner"
        style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('assets/images/hebergement.jpg') }}');">
        <div class="container text-center text-white py-5">
            <h1 class="display-4 fw-bold">Hébergement Windows Professionnel</h1>
            <p class="lead">Des solutions robustes pour vos applications .NET et SQL Server.</p>
        </div>
    </section>

    {{-- SECTION TARIFS --}}
    <section class="section-padding bg-light">
        <div class="container-fluid px-lg-5">
            <div class="text-center mb-5">
                <h3 class="fw-bold">Prix de nos Packs <span class="text-primary-blue">d'hébergement Windows</span></h3>
            </div>

            <div class="row g-2 justify-content-center">
                {{-- Colonne Caractéristiques --}}
                <div class="col-xl-2 d-none d-xl-block">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-dark text-white py-4 text-center">
                            <h6 class="mb-0">Détails techniques</h6>
                        </div>
                        <ul class="list-group list-group-flush feature-labels-list">
                            @foreach ($features as $feature)
                                <li class="list-group-item">{!! $feature !!}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- Plans --}}
                @foreach ($plans as $plan)
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div
                            class="pricing-card animate-on-scroll {{ $plan['title'] == 'Confort' ? 'is-recommended' : '' }}">
                            @if ($plan['title'] == 'Confort')
                                <div class="badge-recommended">RECOMMANDÉ</div>
                            @endif
                            <div class="card-header-custom text-center text-white"
                                style="background-color: {{ $plan['color'] }}">
                                <p class="small mb-0 opacity-75">{{ $plan['price'] }}</p>
                                <h5 class="mb-0">{{ $plan['title'] }}</h5>
                            </div>
                            <ul class="list-group list-group-flush text-center plan-values-list">
                                @foreach ($plan['features'] as $feat)
                                    <li class="list-group-item" data-label="{{ $features[$loop->index] ?? '' }}">
                                        {{ $feat }}
                                    </li>
                                @endforeach
                            </ul>
                            <div class="p-3 text-center">
                                <a href="{{ $plan['link'] }}" class="btn btn-order w-100"
                                    style="background-color: {{ $plan['color'] }}">Commander</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CARACTÉRISTIQUES (SERVEUR À DROITE) --}}
    <section class="section-padding bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h3 class="fw-bold">Caractéristiques <span class="text-primary-blue">Hébergements</span></h3>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="row g-3">
                        @foreach ($featuresWin as $f)
                            <div class="col-md-4">
                                <div
                                    class="feature-box-small  animate-on-scroll text-center p-3 h-100 shadow-sm border rounded">
                                    <img src="{{ asset('assets/images/' . $f['icon']) }}" alt="{{ $f['title'] }}"
                                        class="mb-2" height="40">
                                    <h6 class="fw-bold small">{{ $f['title'] }}</h6>
                                    <p class="text-muted mb-0" style="font-size: 0.7rem;">{{ $f['desc'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <img src="{{ asset('assets/images/server.png') }}" class="img-fluid floating-server" alt="Server">
                </div>
            </div>
        </div>
    </section>

    {{-- SERVICES FINAUX --}}
    <section class="section-padding bg-light">
        <div class="container">
            <div class="row g-4 text-center">
                @foreach ($services as $s)
                    <div class="col-md-3">
                        <div class="card service-hover animate-on-scroll border-0 shadow-sm p-4 h-100 service-hover">
                            <i class="fa {{ $s['icon'] }} fa-2x text-primary mb-3"></i>
                            <h6 class="fw-bold">{{ $s['title'] }}</h6>
                            <p class="small text-muted mb-0">{{ $s['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            /* ============================
               1. ANIMATION ON SCROLL
            ============================ */
            const animatedItems = document.querySelectorAll(".animate-on-scroll");

            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add("is-visible");
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.15,
                }
            );

            animatedItems.forEach((item) => observer.observe(item));

            /* ============================
               2. PULSE PLAN RECOMMANDÉ
            ============================ */
            const recommendedPlan = document.querySelector(
                ".pricing-card.is-recommended"
            );
            if (recommendedPlan) {
                setTimeout(() => {
                    recommendedPlan.classList.add("pulse-highlight");
                }, 600);
            }

            /* ============================
               3. HOVER JS (DESKTOP ONLY)
            ============================ */
            if (window.matchMedia("(hover: hover)").matches) {
                document.querySelectorAll(".pricing-card").forEach((card) => {
                    card.addEventListener("mouseenter", () => {
                        card.style.transform = "translateY(-12px)";
                    });

                    card.addEventListener("mouseleave", () => {
                        card.style.transform = "translateY(0)";
                    });
                });
            }
        });
    </script>
@endsection
