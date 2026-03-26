<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médiathèque | Galerie</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">

    <style>
        :root {
            --djama-dark: #0D2B45;
            --djama-orange: #ff7b00;
        }

        body {
            background: var(--djama-dark);
            font-family: 'Inter', sans-serif;
            color: #fff;
        }

        .back-btn {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: .6rem 1.2rem;
            border-radius: 50px;
            text-decoration: none;
            transition: .3s;
        }

        .back-btn:hover {
            background: #fff;
            color: var(--djama-dark);
        }

        .section-eyebrow {
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.85rem;
            color: var(--djama-orange);
            font-weight: 700;
            margin-bottom: 10px;
        }

        .section-title {
            font-weight: 800;
            font-size: 2.5rem;
            margin-bottom: 30px;
        }

        .section-title span {
            color: var(--djama-orange);
        }

        /* Style des boutons de filtre */
        .media-tab-btn {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #ccc;
            padding: 8px 25px;
            border-radius: 50px;
            transition: 0.3s;
        }

        .media-tab-btn.active {
            background: var(--djama-orange);
            color: white;
            border-color: var(--djama-orange);
            box-shadow: 0 4px 15px rgba(255, 123, 0, 0.3);
        }

        /* Grille et Cartes */
        .media-card {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 15px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: 0.3s;
        }

        .media-thumb-wrapper {
            position: relative;
            height: 220px;
            background: #000;
        }

        .media-thumb-wrapper img,
        .media-thumb-wrapper video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .video-overlay-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 3rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .media-info {
            padding: 15px;
        }

        .media-info h6 {
            margin: 0;
            font-size: 0.95rem;
            font-weight: 600;
        }

        .media-info span {
            font-size: 0.75rem;
            color: #888;
        }
    </style>
</head>

<body>

    <a href="{{ route('index') }}" class="back-btn">
        <i class="ri-arrow-left-line"></i> Retour
    </a>

    <div class="container py-5 mt-5">
        <div class="row align-items-center mb-5">
            <div class="col-lg-7">
                <div class="section-eyebrow">Médiathèque</div>
                <h2 class="section-title">Photos & <span>Vidéos</span></h2>
            </div>
            <div class="col-lg-5 d-flex flex-wrap gap-2 justify-content-lg-end">
                <button class="media-tab-btn active" onclick="filterMedia(this, 'all')">Tout voir</button>
                <button class="media-tab-btn" onclick="filterMedia(this, 'image')">Photos</button>
                <button class="media-tab-btn" onclick="filterMedia(this, 'video')">Vidéos</button>
            </div>
        </div>

        <div class="row g-4" id="mediaGrid">
            @forelse($images as $item)
            <div class="col-6 col-md-4 col-lg-3 media-item" data-type="{{ $item->type }}">
                <div class="media-card">
                    <div class="media-thumb-wrapper">
                        @if($item->type == 'video')
                        <div class="video-overlay-icon"><i class="ri-play-circle-line"></i></div>
                        <video muted>
                            <source src="{{ asset('storage/'.$item->path) }}#t=0.5" type="video/mp4">
                        </video>
                        @else
                        <img src="{{ asset('storage/'.$item->path) }}" alt="{{ $item->title }}" loading="lazy">
                        @endif
                    </div>
                    <div class="media-info">
                        <h6>{{ $item->title ?? 'Sans titre' }}</h6>
                        <span>
                            <i class="{{ $item->type == 'video' ? 'ri-movie-line' : 'ri-image-line' }}"></i>
                            {{ ucfirst($item->type) }}
                        </span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">Aucun contenu trouvé.</p>
            </div>
            @endforelse
        </div>
    </div>

    <script>
        function filterMedia(btn, type) {
            // 1. Activer le bouton cliqué
            document.querySelectorAll('.media-tab-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            // 2. Filtrer les items
            const items = document.querySelectorAll('.media-item');

            items.forEach(item => {
                const itemCategory = item.getAttribute('data-type'); // Récupère 'image' ou 'video'

                if (type === 'all' || itemCategory === type) {
                    item.style.display = 'block';
                    // Animation d'entrée
                    item.style.opacity = '0';
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transition = 'opacity 0.3s ease-in';
                    }, 10);
                } else {
                    item.style.display = 'none';
                }
            });
        }
    </script>

</body>

</html>