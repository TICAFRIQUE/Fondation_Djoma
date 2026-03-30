<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | Fondation Djama Éducation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --djama-blue: #1F4E79;
            --djama-orange: #F47C20;
            --djama-green: #43A047;
            --djama-dark: #0D2B45;
            --djama-light-bg: #F4F8FC;
        }

        body {
            background: var(--djama-light-bg);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #475569;
        }

        /* HERO */
        .hero {
            background: linear-gradient(135deg, var(--djama-blue), var(--djama-dark));
            color: white;
            padding: 80px 0 60px;
            position: relative;
            overflow: hidden;
        }

        .hero::after {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            top: -100px;
            right: -100px;
        }

        .hero h1 {
            font-weight: 800;
            font-size: clamp(2.2rem, 5vw, 3.2rem);
        }

        .hero p {
            opacity: 0.9;
        }

        .breadcrumb-link {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: 0.9rem;
        }

        .breadcrumb-link:hover {
            color: white;
        }

        /* CARD */
        .item-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            transition: all 0.35s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .item-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.08);
        }

        .item-image {
            height: 260px;
            object-fit: cover;
            width: 100%;
        }

        .item-body {
            padding: 22px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        /* BADGE */
        .badge-news {
            background: rgba(31, 78, 121, 0.1);
            color: var(--djama-blue);
        }

        .badge-projet {
            background: rgba(244, 124, 32, 0.1);
            color: var(--djama-orange);
        }

        .badge-realisation {
            background: rgba(67, 160, 71, 0.1);
            color: var(--djama-green);
        }

        .badge-custom {
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        /* TITLE */
        .item-title {
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--djama-dark);
            text-decoration: none;
        }

        .item-title:hover {
            color: var(--djama-blue);
        }

        /* TEXT */
        .item-excerpt {
            font-size: 0.92rem;
            color: #64748b;
            margin: 10px 0;
            line-height: 1.6;
            flex-grow: 1;
        }

        /* META */
        .item-meta {
            font-size: 0.8rem;
            color: #94a3b8;
            border-top: 1px solid #e2e8f0;
            padding-top: 10px;
            margin-top: 10px;
        }

        /* BUTTON */
        .btn-read {
            background: var(--djama-blue);
            color: white;
            border-radius: 10px;
            padding: 10px 16px;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: 0.3s;
        }

        .btn-read:hover {
            background: var(--djama-orange);
            gap: 10px;
        }

        /* EMPTY */
        .empty {
            text-align: center;
            padding: 80px 20px;
        }

        .empty i {
            font-size: 3rem;
            color: #cbd5e1;
        }

        .empty h4 {
            margin-top: 15px;
            color: #64748b;
        }
    </style>
</head>

<body>

    <!-- HERO -->
    <section class="hero">
        <div class="container">
            <a href="{{ route('index') }}" class="breadcrumb-link">
                <i class="ri-home-4-line"></i> Accueil
            </a>

            <h1 class="mt-3">{{ $title }}</h1>
            <p>Découvrez nos {{ $type }}</p>
        </div>
    </section>

    <!-- CONTENT -->
    <div class="container py-5">

        @if($items->count())

        <div class="row g-4">

            @foreach($items as $item)
            <div class="col-md-6 col-lg-4">

                <div class="item-card">

                    <!-- IMAGE -->
                    @if($item->image)
                    <img src="{{ asset('storage/'.$item->image) }}" class="item-image">
                    @else
                    <div class="item-image d-flex align-items-center justify-content-center">
                        📌
                    </div>
                    @endif

                    <!-- BODY -->
                    <div class="item-body">

                        <span class="badge-custom badge-{{ $type }}">
                            @if($type == 'news')
                            {{ $item->category ?? 'Actualité' }}
                            @elseif($type == 'projet')
                            {{ ucfirst($item->status ?? 'Projet') }}
                            @else
                            Réalisation
                            @endif
                        </span>

                        <a href="
                        @if($type == 'news')
                            {{ route('news.show', $item->slug) }}
                        @elseif($type == 'projet')
                            {{ route('projets.show', $item->slug) }}
                        @else
                            {{ route('realisations.show', $item->slug) }}
                        @endif
                        " class="item-title">
                            {{ $item->title }}
                        </a>

                        <p class="item-excerpt">
                            {{ \Illuminate\Support\Str::limit($item->content ?? $item->description, 100) }}
                        </p>

                        <div class="item-meta">
                            <i class="ri-calendar-line"></i>
                            {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                        </div>

                        <a href="
                        @if($type == 'news')
                            {{ route('news.show', $item->slug) }}
                        @elseif($type == 'projet')
                            {{ route('projets.show', $item->slug) }}
                        @else
                            {{ route('realisations.show', $item->slug) }}
                        @endif
                        " class="btn-read mt-3">
                            Lire <i class="ri-arrow-right-line"></i>
                        </a>

                    </div>

                </div>

            </div>
            @endforeach

        </div>

        <div class="mt-5">
            {{ $items->links() }}
        </div>

        @else

        <div class="empty">
            <i class="ri-inbox-line"></i>
            <h4>Aucun contenu disponible</h4>
            <p>Revenez plus tard</p>
        </div>

        @endif

    </div>

</body>

</html>