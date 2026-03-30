<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data->title }} | Association Djama</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap');

        :root {
            --djama-blue: #1F4E79;
            --djama-orange: #F47C20;
            --djama-green: #43A047;
            --djama-dark: #0D2B45;
            --bg-subtle: #f4f8fc;
        }

        body {
            background: var(--bg-subtle);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #475569;
        }

        /* HERO */
        .hero {
            position: relative;
            height: 420px;
            border-radius: 30px;
            overflow: hidden;
            margin-bottom: 40px;
        }

        .hero img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(13, 43, 69, 0.85), rgba(13, 43, 69, 0.2));
            display: flex;
            align-items: flex-end;
            padding: 40px;
        }

        .hero-title {
            color: #fff;
            font-weight: 800;
            font-size: clamp(2rem, 5vw, 3rem);
        }

        /* BADGE */
        .badge-dynamic {
            padding: 8px 16px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.7rem;
            text-transform: uppercase;
        }

        .type-news {
            background: rgba(31, 78, 121, 0.15);
            color: var(--djama-blue);
        }

        .type-realisation {
            background: rgba(67, 160, 71, 0.15);
            color: var(--djama-green);
        }

        .type-projet {
            background: rgba(244, 124, 32, 0.15);
            color: var(--djama-orange);
        }

        /* CONTENT */
        .content-card {
            background: #fff;
            padding: 45px;
            border-radius: 25px;
            border: 1px solid #e2e8f0;
            line-height: 1.9;
            font-size: 1.05rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
        }

        /* SIDEBAR */
        .sidebar-info {
            background: #fff;
            padding: 30px;
            border-radius: 25px;
            border: 1px solid #e2e8f0;
            position: sticky;
            top: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
        }

        .info-block {
            margin-bottom: 25px;
        }

        .info-label {
            font-size: 0.65rem;
            text-transform: uppercase;
            color: #94a3b8;
            font-weight: 700;
        }

        .info-value {
            font-weight: 700;
            color: var(--djama-dark);
        }

        /* BUTTON */
        .btn-back {
            background: var(--djama-dark);
            color: #fff;
            padding: 14px;
            border-radius: 14px;
            width: 100%;
            text-align: center;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-back:hover {
            background: var(--djama-blue);
            transform: translateY(-3px);
        }

        /* SHARE */
        .share-btn {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            border: none;
            background: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.3s;
        }

        .share-btn:hover {
            background: var(--djama-blue);
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="container py-5">

        <div class="mb-4">
            <a href="{{ route('index') }}" class="text-decoration-none text-muted small fw-bold">
                <i class="ri-arrow-left-line"></i> Accueil / {{ ucfirst($type) }}
            </a>
        </div>

        <div class="row g-5">

            {{-- LEFT --}}
            <div class="col-lg-8">

                <span class="badge-dynamic type-{{ $type }}">
                    {{ $type == 'news' ? ($data->category ?? 'Actualité') : ucfirst($type) }}
                </span>

                {{-- HERO IMAGE --}}
                <div class="hero mt-3">
                    <img src="{{ asset('storage/'.$data->image) }}">
                    <div class="hero-overlay">
                        <h1 class="hero-title">{{ $data->title }}</h1>
                    </div>
                </div>

                {{-- CONTENT --}}
                <div class="content-card">
                    {!! nl2br(e($data->content ?? $data->description)) !!}
                </div>

            </div>

            {{-- RIGHT --}}
            <div class="col-lg-4">

                <div class="sidebar-info">

                    <h5 class="fw-bold mb-4 text-dark">Informations</h5>

                    @if($type == 'news')
                    <div class="info-block">
                        <div class="info-label">Publication</div>
                        <div class="info-value">
                            <i class="ri-calendar-line"></i>
                            {{ optional($data->published_at)->format('d M Y') }}
                        </div>
                    </div>
                    @endif

                    @if($type == 'realisation' || $type == 'projet')
                    <div class="info-block">
                        <div class="info-label">Période</div>
                        <div class="info-value">
                            {{ optional($data->date_start)->format('Y') }} -
                            {{ optional($data->date_end)->format('Y') }}
                        </div>
                    </div>
                    @endif

                    <div class="info-block">
                        <div class="info-label">Partager</div>
                        <div class="d-flex gap-2 mt-2">
                            <button class="share-btn"><i class="ri-facebook-fill"></i></button>
                            <button class="share-btn"><i class="ri-whatsapp-line"></i></button>
                        </div>
                    </div>

                    <hr>

                    <a href="{{ route('index') }}" class="btn-back">
                        <i class="ri-home-4-line"></i> Retour au site
                    </a>

                </div>

            </div>

        </div>

    </div>

</body>

</html>