<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title ?? $realisation->title ?? $projet->title }} - Fondation Djama</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #1F4E79;
            --secondary: #F47C20;
            --dark: #0D2B45;
            --success: #16A34A;

            --bg: #F4F8FC;
            --card: #ffffff;

            --text: #334155;
            --muted: #64748B;

            --radius: 18px;
            --transition: 0.3s ease;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #f8fafc, #eef5fb);
            color: var(--text);
        }

        /* NAV */
        .nav-custom {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #e2e8f0;
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            height: 50px;
        }

        /* HERO */
        .hero {
            padding: 50px 0 30px;
        }

        .badge-type {
            background: rgba(31, 78, 121, 0.1);
            color: var(--primary);
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 999px;
            font-size: 0.75rem;
        }

        .title {
            font-weight: 800;
            font-size: clamp(2rem, 5vw, 3rem);
            color: var(--dark);
            margin: 15px 0;
            line-height: 1.2;
        }

        .meta {
            color: var(--muted);
            font-size: 0.9rem;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        /* IMAGE */
        .featured {
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            margin: 30px 0;
        }

        .featured img {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }

        /* CONTENT */
        .content {
            background: var(--card);
            padding: 35px;
            border-radius: var(--radius);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            line-height: 1.8;
            font-size: 1.05rem;
        }

        .content p:first-letter {
            font-size: 3rem;
            font-weight: bold;
            float: left;
            margin-right: 10px;
            color: var(--secondary);
        }

        /* SIDEBAR */
        .sidebar {
            background: white;
            padding: 25px;
            border-radius: var(--radius);
            border: 1px solid #e2e8f0;
            position: sticky;
            top: 100px;
        }

        .sidebar h5 {
            font-weight: 700;
            margin-bottom: 20px;
        }

        .info {
            margin-bottom: 15px;
        }

        .info small {
            color: var(--muted);
            text-transform: uppercase;
            font-size: 0.7rem;
        }

        .info strong {
            display: block;
            color: var(--dark);
        }

        /* SHARE */
        .share {
            display: flex;
            gap: 10px;
        }

        .share a {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f5f9;
            color: var(--text);
            transition: var(--transition);
        }

        .share a:hover {
            transform: translateY(-3px);
            background: var(--secondary);
            color: white;
        }

        /* BUTTON */
        .btn-back {
            margin-top: 20px;
            width: 100%;
            background: var(--primary);
            color: white;
            padding: 12px;
            border-radius: 10px;
            text-align: center;
            display: block;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .btn-back:hover {
            background: var(--secondary);
        }

        /* MOBILE */
        @media(max-width:991px) {
            .featured img {
                height: 300px;
            }

            .sidebar {
                position: static;
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- NAV -->
    <div class="nav-custom">
        <div class="container d-flex align-items-center justify-content-between">
            <img src="{{ asset('assets/images/logo.jpeg') }}" class="logo">
        </div>
    </div>

    <div class="container">

        <!-- HERO -->
        <div class="hero">
            <span class="badge-type">
                @if(isset($article)) {{ $article->category }}
                @elseif(isset($realisation)) Réalisation
                @else Projet
                @endif
            </span>

            <h1 class="title">
                {{ $article->title ?? $realisation->title ?? $projet->title }}
            </h1>

            <div class="meta">
                <span><i class="ri-calendar-line"></i>
                    {{ optional($article->published_at)->format('d M Y') }}
                </span>
                <span><i class="ri-eye-line"></i> {{ rand(120,600) }} vues</span>
            </div>
        </div>

        <div class="row g-4">

            <!-- CONTENT -->
            <div class="col-lg-8">

                <div class="featured">
                    <img src="{{ asset('storage/'.($article->image ?? $realisation->image ?? $projet->image)) }}">
                </div>

                <div class="content">
                    {!! nl2br(e($article->content ?? $realisation->description ?? $projet->description)) !!}
                </div>

            </div>

            <!-- SIDEBAR -->
            <div class="col-lg-4">
                <div class="sidebar">

                    <h5>Informations</h5>

                    <div class="info">
                        <small>Date</small>
                        <strong>{{ optional($article->published_at)->format('d M Y') }}</strong>
                    </div>

                    <div class="info">
                        <small>Type</small>
                        <strong>
                            @if(isset($article)) Actualité
                            @elseif(isset($realisation)) Réalisation
                            @else Projet
                            @endif
                        </strong>
                    </div>

                    <hr>

                    <div class="share">
                        <a href="#"><i class="ri-facebook-fill"></i></a>
                        <a href="#"><i class="ri-whatsapp-line"></i></a>
                        <a href="#"><i class="ri-linkedin-fill"></i></a>
                    </div>

                    <a href="{{ route('index') }}" class="btn-back">
                        ← Retour
                    </a>

                </div>
            </div>

        </div>

    </div>

</body>

</html>