<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fondation Djama Éducation — Offrir l'éducation, construire l'avenir</title>

  <link rel="preconnect" href="https://cdn.jsdelivr.net">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet" />

  <style>
    :root {
      --djama-blue: #1F4E79;
      --djama-blue-light: #2CA6D1;
      --djama-orange: #F47C20;
      --djama-red: #E53935;
      --djama-green: #43A047;
      --djama-yellow: #FBC02D;
      --djama-dark: #0D2B45;
      --djama-light-bg: #F4F8FC;
      --font-head: 'Poppins', sans-serif;
      --font-body: 'Open Sans', sans-serif;
      scroll-padding-top: 110px;
    }

    *,
    *::before,
    *::after {
      box-sizing: border-box
    }

    a {
      text-decoration: none
    }

    html {
      scroll-behavior: smooth
    }

    body {
      font-family: var(--font-body);
      color: #1a1a2e;
      background: #fff;
      overflow-x: hidden;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: var(--font-head)
    }

    img {
      max-width: 100%;
      height: auto
    }


    /* ───────────────────────────
       UTILITAIRES COMMUNS
    ─────────────────────────── */
    .section-pad {
      padding: 80px 0
    }

    .section-pad-sm {
      padding: 60px 0
    }

    .section-eyebrow {
      font-family: var(--font-head);
      font-weight: 700;
      font-size: .72rem;
      letter-spacing: .12em;
      text-transform: uppercase;
      color: var(--djama-orange);
      margin-bottom: .5rem;
      display: flex;
      align-items: center;
      gap: 8px
    }

    .section-eyebrow::before {
      content: '';
      width: 24px;
      height: 2px;
      background: var(--djama-orange);
      border-radius: 2px
    }

    .section-title {
      font-family: var(--font-head);
      font-weight: 800;
      font-size: clamp(1.6rem, 3.5vw, 2.3rem);
      color: var(--djama-blue);
      line-height: 1.2;
      margin-bottom: 1rem
    }

    .section-title span {
      color: var(--djama-orange)
    }

    .section-lead {
      color: #4a5568;
      font-size: 1rem;
      line-height: 1.75;
      max-width: 560px
    }

    .btn-prog {
      font-family: var(--font-head);
      font-weight: 600;
      font-size: .82rem;
      border-radius: 8px;
      padding: .55rem 1.2rem;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      border: none;
      cursor: pointer;
      transition: all .2s;
    }

    .btn-prog-blue {
      background: var(--djama-blue);
      color: #fff
    }

    .btn-prog-blue:hover {
      background: #163a5c;
      color: #fff;
      transform: translateY(-1px)
    }

    .btn-prog-outline {
      background: transparent;
      color: var(--djama-blue);
      border: 1.5px solid var(--djama-blue)
    }

    .btn-prog-outline:hover {
      background: var(--djama-blue);
      color: #fff
    }

    .btn-more {
      font-family: var(--font-head);
      font-weight: 600;
      font-size: .82rem;
      color: var(--djama-blue-light);
      display: inline-flex;
      align-items: center;
      gap: 5px;
      transition: gap .2s
    }

    .btn-more:hover {
      gap: 9px;
      color: var(--djama-blue)
    }

    .btn-don {
      background: var(--djama-orange);
      color: #fff;
      font-family: var(--font-head);
      font-weight: 600;
      font-size: 0.85rem;
      border: none;
      border-radius: 8px;
      padding: 0.45rem 1.1rem;
      transition: background .2s, transform .15s
    }

    .btn-don:hover {
      background: #d96a10;
      color: #fff;
      transform: translateY(-1px)
    }

    .form-control {
      border-radius: 10px !important;
      border-color: rgba(31, 78, 121, 0.15) !important;
      font-size: .88rem !important;
      min-height: 44px !important;
    }

    .form-control:focus {
      border-color: var(--djama-blue) !important;
      box-shadow: 0 0 0 0.25rem rgba(31, 78, 121, 0.15) !important;
    }


    /* ───────────────────────────
       NAVBAR
    ─────────────────────────── */
    .navbar-djama {
      background: rgba(255, 255, 255, 0.97);
      backdrop-filter: blur(12px);
      border-bottom: 1px solid rgba(31, 78, 121, 0.10);
      padding: 0.6rem 0;
      position: sticky;
      top: 0;
      z-index: 1050;
      transition: box-shadow 0.3s
    }

    .navbar-djama.scrolled {
      box-shadow: 0 2px 24px rgba(31, 78, 121, 0.10)
    }

    .navbar-brand-logo {
      width: 70px;
      height: 70px;
      border-radius: 10px;
      object-fit: cover;
    }

    .navbar-brand-text {
      font-family: var(--font-head);
      font-weight: 700;
      font-size: 1rem;
      color: var(--djama-blue);
      line-height: 1.1
    }

    .navbar-brand-text small {
      font-weight: 400;
      font-size: 0.65rem;
      color: #6c8099;
      display: block;
    }

    .nav-link-djama {
      font-family: var(--font-head);
      font-weight: 500;
      font-size: 0.85rem;
      color: #3a4a5c !important;
      padding: 0.7rem 0.8rem !important;
      border-radius: 6px;
      min-height: 44px;
      transition: color .2s, background .2s
    }

    .nav-link-djama:hover,
    .nav-link-djama.active {
      color: var(--djama-blue) !important;
      background: rgba(31, 78, 121, 0.07)
    }


    /* ───────────────────────────
       HERO SLIDER
    ─────────────────────────── */
    .hero-slider {
      position: relative;
      width: 100%;
      overflow: hidden
    }

    .slider-track {
      display: flex;
      transition: transform 0.65s cubic-bezier(0.4, 0, 0.2, 1);
      will-change: transform
    }

    .slide {
      min-width: 100%;
      position: relative;
      min-height: 88vh;
      display: flex;
      align-items: center;
      overflow: hidden
    }

    .slide-bg {
      position: absolute;
      inset: 0;
      background-size: cover;
      background-position: center;
      transition: transform 8s ease
    }

    .slide.active .slide-bg {
      transform: scale(1.05)
    }

    .slide-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to right, rgba(13, 43, 69, 0.88) 0%, rgba(13, 43, 69, 0.50) 60%, rgba(13, 43, 69, 0.20) 100%)
    }

    .slide-content {
      position: relative;
      z-index: 2;
      width: 100%
    }

    .slide-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: rgba(244, 124, 32, 0.22);
      border: 1px solid rgba(244, 124, 32, 0.4);
      color: #ffc78a;
      border-radius: 30px;
      padding: 0.3rem 1rem;
      font-size: .78rem;
      font-weight: 600;
      font-family: var(--font-head);
      margin-bottom: 1.2rem;
      opacity: 0;
      transform: translateY(20px);
      transition: opacity .5s .2s, transform .5s .2s
    }

    .slide.active .slide-badge {
      opacity: 1;
      transform: none
    }

    .slide-title {
      font-family: var(--font-head);
      font-weight: 800;
      font-size: clamp(1.9rem, 4.5vw, 3.2rem);
      color: #fff;
      line-height: 1.15;
      margin-bottom: 1rem;
      opacity: 0;
      transform: translateY(24px);
      transition: opacity .55s .35s, transform .55s .35s
    }

    .slide.active .slide-title {
      opacity: 1;
      transform: none
    }

    .slide-title span {
      color: var(--djama-yellow)
    }

    .slide-desc {
      font-size: 1rem;
      color: rgba(255, 255, 255, 0.8);
      line-height: 1.75;
      max-width: 540px;
      margin-bottom: 1.8rem;
      opacity: 0;
      transform: translateY(20px);
      transition: opacity .55s .5s, transform .55s .5s
    }

    .slide.active .slide-desc {
      opacity: 1;
      transform: none
    }

    .slide-btns {
      display: flex;
      flex-wrap: wrap;
      gap: .8rem;
      opacity: 0;
      transform: translateY(16px);
      transition: opacity .5s .65s, transform .5s .65s
    }

    .slide.active .slide-btns {
      opacity: 1;
      transform: none
    }

    .btn-slide-primary {
      background: var(--djama-orange);
      color: #fff;
      font-family: var(--font-head);
      font-weight: 700;
      font-size: .9rem;
      border-radius: 10px;
      padding: .7rem 1.6rem;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: background .2s, transform .15s
    }

    .btn-slide-primary:hover {
      background: #d96a10;
      color: #fff;
      transform: translateY(-2px)
    }

    .btn-slide-secondary {
      background: transparent;
      color: #fff;
      font-family: var(--font-head);
      font-weight: 600;
      font-size: .9rem;
      border: 2px solid rgba(255, 255, 255, 0.4);
      border-radius: 10px;
      padding: .68rem 1.6rem;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: border-color .2s, background .2s
    }

    .btn-slide-secondary:hover {
      border-color: #fff;
      background: rgba(255, 255, 255, 0.08);
      color: #fff
    }

    .slider-stats {
      display: flex;
      flex-wrap: wrap;
      gap: .8rem;
      margin-top: 2rem;
      opacity: 0;
      transform: translateY(16px);
      transition: opacity .5s .8s, transform .5s .8s
    }

    .slide.active .slider-stats {
      opacity: 1;
      transform: none
    }

    .slider-stat {
      background: rgba(255, 255, 255, 0.10);
      border: 1px solid rgba(255, 255, 255, 0.18);
      border-radius: 12px;
      padding: .6rem 1rem;
      text-align: center;
      min-width: 90px
    }

    .slider-stat-num {
      font-family: var(--font-head);
      font-weight: 800;
      font-size: 1.4rem;
      color: var(--djama-yellow);
      line-height: 1
    }

    .slider-stat-label {
      font-size: .68rem;
      color: rgba(255, 255, 255, 0.65);
      margin-top: 2px
    }

    .slider-arrow {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      z-index: 10;
      width: 46px;
      height: 46px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.15);
      border: 1.5px solid rgba(255, 255, 255, 0.3);
      color: #fff;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background .2s, border-color .2s
    }

    .slider-arrow:hover {
      background: var(--djama-orange);
      border-color: var(--djama-orange)
    }

    .slider-arrow.prev {
      left: 20px
    }

    .slider-arrow.next {
      right: 20px
    }

    .slider-dots {
      position: absolute;
      bottom: 22px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 8px;
      z-index: 10
    }

    .slider-dot {
      width: 8px;
      height: 8px;
      border-radius: 4px;
      background: rgba(255, 255, 255, 0.4);
      cursor: pointer;
      transition: background .3s, width .3s;
      border: none;
      min-width: 44px;
      min-height: 44px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }

    .slider-dot.active {
      background: var(--djama-orange);
      width: 24px
    }

    .slider-progress {
      position: absolute;
      bottom: 0;
      left: 0;
      height: 3px;
      background: var(--djama-orange);
      width: 0%;
      z-index: 10;
    }


    /* ───────────────────────────
       SECTIONS COMMUNES
    ─────────────────────────── */
    .impact-section {
      background: linear-gradient(135deg, #f8fafc, #eaf4ff)
    }

    .impact-num {
      font-family: var(--font-head);
      font-weight: 800;
      font-size: clamp(2.2rem, 4vw, 3rem);
      color: #1F4E79;
      margin-bottom: 8px;
    }

    .impact-label {
      font-size: 0.95rem;
      color: #475569;
      line-height: 1.5;
    }

    .impact-divider {
      width: 1px;
      background: linear-gradient(to bottom, transparent, #ddd, transparent);
    }

    .apropos-img-block {
      position: relative;
      border-radius: 20px;
      overflow: hidden;
      height: 100%;
      min-height: 500px;
    }

    .apropos-img-block img {
      width: 100%;
      height: 100%;
      object-fit: cover
    }

    .apropos-img-badge {
      position: absolute;
      bottom: 24px;
      left: 50%;
      transform: translateX(-50%);
      background: rgba(255, 255, 255, 0.95);
      border-radius: 14px;
      padding: 1rem 1.4rem;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15)
    }

    .apropos-img-badge .num {
      font-family: var(--font-head);
      font-weight: 800;
      font-size: 1.8rem;
      color: var(--djama-blue);
      line-height: 1
    }

    .apropos-img-badge .lbl {
      font-size: .75rem;
      color: #6a7a8a;
      margin-top: 2px
    }

    .apropos-info-item {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      padding: .85rem 1rem;
      border-radius: 12px;
      background: var(--djama-light-bg);
      transition: background .2s
    }

    .apropos-info-item:hover {
      background: #e8f0f7
    }

    .apropos-info-icon {
      width: 42px;
      height: 42px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      font-size: 1.1rem
    }

    .apropos-info-item h6 {
      font-family: var(--font-head);
      font-weight: 700;
      font-size: .88rem;
      color: var(--djama-blue);
      margin-bottom: 2px
    }

    .apropos-info-item p {
      font-size: .82rem;
      color: #5a6a7a;
      margin: 0;
      line-height: 1.55
    }


    .programmes-split {
      display: grid;
      grid-template-columns: 340px 1fr;
      border-radius: 20px;
      overflow: hidden;
      border: 1px solid rgba(31, 78, 121, 0.10)
    }

    @media(max-width:991px) {
      .programmes-split {
        grid-template-columns: 1fr
      }
    }

    .programmes-banner {
      position: relative;
      min-height: 540px
    }

    .programmes-banner img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      position: absolute;
      inset: 0
    }

    .programmes-banner-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(13, 43, 69, 0.92) 0%, rgba(13, 43, 69, 0.45) 50%, rgba(13, 43, 69, 0.2) 100%)
    }

    .programmes-banner-content {
      position: relative;
      z-index: 2;
      padding: 2rem;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      height: 100%;
      min-height: 540px
    }

    .programmes-banner h3 {
      font-family: var(--font-head);
      font-weight: 800;
      font-size: 1.6rem;
      color: #fff;
      margin-bottom: .5rem
    }

    .programmes-banner p {
      font-size: .88rem;
      color: rgba(255, 255, 255, 0.8);
      line-height: 1.65;
      margin-bottom: 1.2rem
    }

    .programmes-list {
      background: #fff;
      padding: 2rem
    }

    .prog-list-item {
      display: flex;
      gap: 16px;
      padding: 1.2rem 0;
      border-bottom: 1px solid rgba(31, 78, 121, 0.07)
    }

    .prog-list-item:last-child {
      border-bottom: none
    }

    .prog-list-num {
      width: 36px;
      height: 36px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: var(--font-head);
      font-weight: 800;
      font-size: .85rem;
      flex-shrink: 0;
      margin-top: 2px
    }

    .prog-list-item h6 {
      font-family: var(--font-head);
      font-weight: 700;
      font-size: .95rem;
      color: var(--djama-blue);
      margin-bottom: .3rem
    }

    .prog-list-item p {
      font-size: .83rem;
      color: #5a6a7a;
      margin: 0;
      line-height: 1.6
    }

    .prog-list-link {
      font-family: var(--font-head);
      font-weight: 600;
      font-size: .78rem;
      color: var(--djama-blue-light);
      display: inline-flex;
      align-items: center;
      gap: 4px;
      margin-top: .4rem;
      cursor: pointer;
      transition: gap .2s
    }

    .prog-list-link:hover {
      gap: 8px
    }


    .real-card {
      background: #fff;
      border-radius: 14px;
      overflow: hidden;
      border: 1px solid rgba(31, 78, 121, 0.09);
      transition: transform .25s, box-shadow .25s;
      height: 100%;
      display: flex;
      flex-direction: column
    }

    .real-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 16px 40px rgba(31, 78, 121, 0.12)
    }

    .real-card-img {
      height: 185px;
      overflow: hidden;
      position: relative
    }

    .real-card-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform .5s
    }

    .real-card:hover .real-card-img img {
      transform: scale(1.06)
    }

    .real-year-badge {
      position: absolute;
      bottom: 10px;
      right: 10px;
      background: var(--djama-blue);
      color: #fff;
      font-family: var(--font-head);
      font-size: .7rem;
      font-weight: 700;
      padding: .2rem .6rem;
      border-radius: 6px
    }

    .real-card-body {
      padding: 1.1rem 1.2rem;
      flex: 1;
      display: flex;
      flex-direction: column
    }

    .real-card-body h6 {
      font-family: var(--font-head);
      font-weight: 700;
      font-size: .93rem;
      color: var(--djama-blue);
      margin-bottom: .4rem
    }

    .real-card-body p {
      font-size: .83rem;
      color: #5a6a7a;
      line-height: 1.65;
      flex: 1;
      margin-bottom: .9rem
    }


    .projets-carousel-wrap {
      position: relative;
      overflow: hidden
    }

    .projets-carousel-track {
      display: flex;
      gap: 24px;
      transition: transform .55s cubic-bezier(0.4, 0, 0.2, 1);
      will-change: transform
    }

    .projet-slide {
      flex: 0 0 calc(33.333% - 16px);
      min-width: 280px
    }

    @media(max-width:991px) {
      .projet-slide {
        flex: 0 0 calc(50% - 12px)
      }
    }

    @media(max-width:640px) {
      .projet-slide {
        flex: 0 0 90%
      }
    }

    .projet-card-img {
      background: #fff;
      border-radius: 16px;
      overflow: hidden;
      border: 1px solid rgba(31, 78, 121, 0.09);
      transition: transform .25s, box-shadow .25s;
      height: 100%;
      display: flex;
      flex-direction: column
    }

    .projet-card-img:hover {
      transform: translateY(-4px);
      box-shadow: 0 14px 36px rgba(31, 78, 121, 0.11)
    }

    .projet-img-wrap {
      height: 200px;
      overflow: hidden;
      position: relative
    }

    .projet-img-wrap img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform .5s
    }

    .projet-card-img:hover .projet-img-wrap img {
      transform: scale(1.06)
    }

    .status-badge {
      position: absolute;
      top: 10px;
      left: 10px;
      font-size: .68rem;
      font-weight: 700;
      font-family: var(--font-head);
      padding: .22rem .7rem;
      border-radius: 20px
    }

    .projet-body {
      padding: 1.2rem;
      flex: 1;
      display: flex;
      flex-direction: column
    }

    .projet-body h6 {
      font-family: var(--font-head);
      font-weight: 700;
      font-size: .95rem;
      color: var(--djama-blue);
      margin-bottom: .4rem
    }

    .projet-body p {
      font-size: .83rem;
      color: #5a6a7a;
      line-height: 1.65;
      flex: 1;
      margin-bottom: .9rem
    }

    .projets-nav-btn {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      background: #fff;
      border: 1.5px solid rgba(31, 78, 121, 0.15);
      color: var(--djama-blue);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all .2s;
    }

    .projets-nav-btn:hover {
      background: var(--djama-blue);
      color: #fff;
      border-color: var(--djama-blue)
    }

    .projets-nav-btn:disabled {
      opacity: .3;
      cursor: not-allowed
    }


    .galerie-section {
      background: var(--djama-dark);
      padding: 80px 0
    }

    .galerie-quote {
      font-family: var(--font-head);
      font-size: clamp(1.4rem, 3vw, 2rem);
      font-weight: 700;
      color: #fff;
      line-height: 1.3;
      text-align: center;
      margin-bottom: 1rem
    }

    .galerie-quote span {
      color: var(--djama-yellow)
    }

    .galerie-grid {
      display: grid;
      grid-template-columns: repeat(12, 1fr);
      grid-template-rows: 300px 220px;
      gap: 10px
    }

    @media(max-width:991px) {
      .galerie-grid {
        grid-template-columns: repeat(6, 1fr);
        grid-template-rows: 160px 160px 160px
      }
    }

    @media(max-width:640px) {
      .galerie-grid {
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: repeat(4, 140px)
      }
    }

    .gal-item {
      border-radius: 14px;
      overflow: hidden;
      position: relative;
      cursor: pointer
    }

    .gal-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform .5s
    }

    .gal-item:hover img {
      transform: scale(1.08)
    }

    .gal-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(13, 43, 69, 0.7) 0%, transparent 60%);
      opacity: 0;
      transition: opacity .3s
    }

    .gal-item:hover .gal-overlay {
      opacity: 1
    }

    .gal-label {
      position: absolute;
      bottom: 10px;
      left: 12px;
      font-family: var(--font-head);
      font-size: .75rem;
      font-weight: 700;
      color: #fff;
      opacity: 0;
      transform: translateY(6px);
      transition: opacity .3s, transform .3s
    }

    .gal-item:hover .gal-label {
      opacity: 1;
      transform: none
    }

    .gal-1 {
      grid-column: span 4;
      grid-row: span 2
    }

    .gal-2 {
      grid-column: span 3;
      grid-row: span 1
    }

    .gal-3 {
      grid-column: span 5;
      grid-row: span 1
    }

    .gal-4 {
      grid-column: span 3;
      grid-row: span 1
    }

    @media(max-width:991px) {
      .gal-1 {
        grid-column: span 6;
        grid-row: span 1
      }

      .gal-2,
      .gal-3,
      .gal-4 {
        grid-column: span 3;
        grid-row: span 1
      }
    }

    @media(max-width:640px) {

      .gal-1,
      .gal-2,
      .gal-3,
      .gal-4 {
        grid-column: span 1;
        grid-row: span 1
      }
    }


    .actu-card {
      background: #fff;
      border-radius: 14px;
      overflow: hidden;
      border: 1px solid rgba(31, 78, 121, 0.08);
      transition: transform .2s, box-shadow .2s;
      height: 100%;
      display: flex;
      flex-direction: column
    }

    .actu-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 14px 36px rgba(0, 0, 0, 0.10)
    }

    .actu-img {
      height: 190px;
      overflow: hidden;
      position: relative
    }

    .actu-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform .5s
    }

    .actu-card:hover .actu-img img {
      transform: scale(1.05)
    }

    .actu-cat-badge {
      position: absolute;
      top: 10px;
      left: 10px;
      font-family: var(--font-head);
      font-size: .68rem;
      font-weight: 700;
      letter-spacing: .06em;
      text-transform: uppercase;
      padding: .22rem .7rem;
      border-radius: 20px
    }

    .actu-body {
      padding: 1.2rem 1.3rem;
      flex: 1;
      display: flex;
      flex-direction: column
    }

    .actu-body h6 {
      font-family: var(--font-head);
      font-weight: 700;
      font-size: .95rem;
      color: var(--djama-blue);
      line-height: 1.4;
      margin-bottom: .4rem
    }

    .actu-body p {
      font-size: .83rem;
      color: #5a6a7a;
      line-height: 1.6;
      flex: 1;
      margin-bottom: 1rem
    }

    .actu-footer-bar {
      padding: .75rem 1.3rem;
      border-top: 1px solid rgba(0, 0, 0, 0.05);
      display: flex;
      align-items: center;
      justify-content: space-between
    }

    .actu-date-txt {
      font-size: .75rem;
      color: #9aacbe;
      display: flex;
      align-items: center;
      gap: 4px
    }

    .temoignage-card {
      background: #fff;
      border-radius: 16px;
      border: 1px solid rgba(31, 78, 121, 0.08);
      padding: 1.6rem;
      transition: box-shadow .2s;
      height: 100%
    }

    .temoignage-card:hover {
      box-shadow: 0 12px 32px rgba(31, 78, 121, 0.09)
    }

    .temoignage-quote {
      font-size: 2.4rem;
      color: var(--djama-orange);
      line-height: 1;
      font-family: Georgia, serif;
      margin-bottom: .5rem
    }

    .temoignage-text {
      font-size: .9rem;
      color: #4a5568;
      line-height: 1.75;
      font-style: italic;
      margin-bottom: 1rem
    }

    .temoignage-avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: var(--djama-blue);
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: var(--font-head);
      font-weight: 700;
      font-size: .9rem;
      flex-shrink: 0
    }

    .temoignage-name {
      font-family: var(--font-head);
      font-weight: 700;
      font-size: .88rem;
      color: var(--djama-blue)
    }

    .temoignage-role {
      font-size: .75rem;
      color: #8a9aaa
    }


    .agir-card {
      background: #fff;
      border-radius: 16px;
      border: 1px solid rgba(31, 78, 121, 0.08);
      padding: 1.8rem 1.5rem;
      text-align: center;
      height: 100%;
      transition: transform .25s, box-shadow .25s, border-color .25s
    }

    .agir-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(31, 78, 121, 0.10);
      border-color: rgba(44, 166, 209, 0.25)
    }

    .agir-icon {
      width: 64px;
      height: 64px;
      border-radius: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.8rem;
      margin: 0 auto 1rem
    }

    .agir-card h5 {
      font-family: var(--font-head);
      font-weight: 700;
      font-size: 1rem;
      color: var(--djama-blue);
      margin-bottom: .5rem
    }

    .agir-card p {
      font-size: .85rem;
      color: #5a6a7a;
      line-height: 1.65;
      margin-bottom: 1.2rem
    }

    .btn-agir {
      font-family: var(--font-head);
      font-weight: 600;
      font-size: .82rem;
      border-radius: 8px;
      padding: .5rem 1.2rem;
      transition: transform .15s, box-shadow .15s;
      display: inline-block;
      cursor: pointer;
      border: none;
    }

    .btn-agir:hover {
      transform: translateY(-1px);
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12)
    }


    .cta-bande {
      background: linear-gradient(135deg, var(--djama-orange) 0%, #e86010 100%);
      position: relative;
      overflow: hidden
    }

    .cta-bande h2 {
      font-family: var(--font-head);
      font-weight: 800;
      color: #fff
    }

    .cta-bande p {
      color: rgba(255, 255, 255, 0.85)
    }

    .btn-cta-white {
      background: #fff;
      color: var(--djama-orange);
      font-family: var(--font-head);
      font-weight: 700;
      font-size: .9rem;
      border: none;
      border-radius: 10px;
      padding: .7rem 1.8rem;
      transition: transform .15s, box-shadow .2s
    }

    .btn-cta-white:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
      color: var(--djama-orange)
    }


    .footer-djama {
      background: var(--djama-dark);
      color: rgba(255, 255, 255, 0.75)
    }

    .footer-brand {
      font-family: var(--font-head);
      font-weight: 800;
      font-size: 1.2rem;
      color: #fff
    }

    .footer-slogan {
      font-size: .8rem;
      color: var(--djama-yellow);
      font-style: italic;
      margin-top: .2rem
    }

    .footer-title {
      font-family: var(--font-head);
      font-weight: 700;
      color: #fff;
      font-size: .9rem;
      margin-bottom: 1rem
    }

    .footer-link {
      display: block;
      color: rgba(255, 255, 255, 0.65);
      font-size: .84rem;
      margin-bottom: .45rem;
      transition: color .2s
    }

    .footer-link:hover {
      color: var(--djama-yellow)
    }

    .footer-divider {
      border-color: rgba(255, 255, 255, 0.08)
    }

    .footer-copy {
      font-size: .78rem;
      color: rgba(255, 255, 255, 0.4)
    }

    .social-btn {
      width: 44px;
      height: 44px;
      border-radius: 8px;
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.12);
      display: inline-flex;
      align-items: center;
      justify-content: center;
      color: rgba(255, 255, 255, 0.7);
      font-size: .95rem;
      transition: background .2s, color .2s
    }

    .social-btn:hover {
      background: var(--djama-orange);
      color: #fff;
      border-color: var(--djama-orange)
    }


    /* ───────────────────────────
       MODAUX
    ─────────────────────────── */
    .modal-overlay {
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.45);
      backdrop-filter: blur(8px);
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      visibility: hidden;
      transition: 0.3s ease;
      z-index: 9999;
    }

    .modal-overlay.active {
      opacity: 1;
      visibility: visible
    }

    .modal-box {
      background: white;
      border-radius: 20px;
      padding: 30px;
      max-width: 550px;
      width: 90%;
      box-shadow: 0 25px 60px rgba(0, 0, 0, 0.2);
      transform: translateY(40px) scale(0.9);
      transition: 0.35s ease;
      position: relative;
    }

    .modal-overlay.active .modal-box {
      transform: translateY(0) scale(1)
    }

    .modal-close {
      position: absolute;
      top: 15px;
      right: 20px;
      font-size: 22px;
      cursor: pointer;
      font-weight: bold;
      width: 44px;
      height: 44px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .modal-title {
      font-size: 1.6rem;
      font-weight: 700;
      color: var(--djama-dark);
      margin-bottom: 20px;
    }

    .honeypot {
      position: absolute;
      left: -9999px;
      opacity: 0;
    }


    .back-top {
      position: fixed;
      bottom: 20px;
      right: 20px;
      width: 48px;
      height: 48px;
      border-radius: 50%;
      background: var(--djama-blue);
      color: white;
      border: none;
      cursor: pointer;
      z-index: 1050;
      opacity: 0;
      transform: translateY(20px);
      transition: all .3s;
    }

    .back-top.visible {
      opacity: 1;
      transform: none
    }


    @media(max-width:767px) {
      .section-pad {
        padding: 52px 0
      }

      .slide {
        min-height: 88vh
      }

      .slide-overlay {
        background: linear-gradient(to bottom, rgba(13, 43, 69, 0.75), rgba(13, 43, 69, 0.65))
      }

      .slider-arrow {
        display: none
      }
    }
  </style>
</head>

<body>

  <!-- ════ NAVBAR ════ -->
  <nav class="navbar navbar-expand-lg navbar-djama" id="mainNav">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2" href="#">
        <img src="{{ asset('assets/images/logo.jpeg') }}" class="navbar-brand-logo" alt="Logo Fondation Djama Éducation" loading="eager">
        <div class="navbar-brand-text">Fondation Djama<small>Éducation</small></div>
      </a>

      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-label="Menu">
        <i class="bi bi-list" style="font-size:1.5rem;color:var(--djama-blue);"></i>
      </button>

      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto align-items-lg-center gap-1 py-2 py-lg-0">
          <li class="nav-item"><a class="nav-link-djama active" href="#top">Accueil</a></li>
          <li class="nav-item"><a class="nav-link-djama" href="#apropos">À propos</a></li>
          <li class="nav-item"><a class="nav-link-djama" href="#programmes">Programmes</a></li>
          <li class="nav-item"><a class="nav-link-djama" href="#realisations">Réalisations</a></li>
          <li class="nav-item"><a class="nav-link-djama" href="#projets">Projets</a></li>
          <li class="nav-item"><a class="nav-link-djama" href="#galerie">Galerie</a></li>
          <li class="nav-item"><a class="nav-link-djama" href="#actualites">Actualités</a></li>
          <li class="nav-item ms-lg-2">
            <a href="#agir" class="btn btn-don"><i class="bi bi-heart-fill me-1" style="font-size:.75rem;"></i> Faire un don</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- ════ HERO SLIDER ════ -->
  <div class="hero-slider" id="heroSlider">
    <div class="slider-track" id="sliderTrack">
      @foreach($sliders as $key => $slide)
      <div class="slide {{ $key === 0 ? 'active' : '' }}">
        <div class="slide-bg" style="background-image:url('{{ asset('storage/'.$slide->image) }}');"></div>
        <div class="slide-overlay"></div>

        <div class="slide-content">
          <div class="container py-5">
            <div class="row">
              <div class="col-lg-7 col-xl-6">
                @if($slide->badge) <div class="slide-badge">{!! $slide->badge !!}</div> @endif
                <h1 class="slide-title">
                  {{ $slide->title }}<br>
                  @if($slide->highlight) <span>{{ $slide->highlight }}</span> @endif
                </h1>
                <p class="slide-desc">{{ $slide->description }}</p>
                <div class="slide-btns">
                  @if($slide->btn1_text) <a href="#{{ $slide->btn1_link }}" class="btn-slide-primary">{{ $slide->btn1_text }}</a> @endif
                  @if($slide->btn2_text) <a href="#{{ $slide->btn2_link }}" class="btn-slide-secondary">{{ $slide->btn2_text }} <i class="bi bi-arrow-right"></i></a> @endif
                </div>
                @if($slide->stats)
                <div class="slider-stats">
                  @foreach($slide->stats as $stat)
                  <div class="slider-stat">
                    <div class="slider-stat-num">{{ $stat['value'] }}</div>
                    <div class="slider-stat-label">{{ $stat['label'] }}</div>
                  </div>
                  @endforeach
                </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <button class="slider-arrow prev" id="sliderPrev" aria-label="Précédent">‹</button>
    <button class="slider-arrow next" id="sliderNext" aria-label="Suivant">›</button>

    <div class="slider-dots" id="sliderDots">
      @foreach($sliders as $key => $slide)
      <button class="slider-dot {{ $key === 0 ? 'active' : '' }}" aria-label="Slide {{ $key + 1 }}"></button>
      @endforeach
    </div>

    <div class="slider-progress" id="sliderProgress"></div>
  </div>

  <!-- ════ IMPACT ════ -->
  <section class="impact-section section-pad-sm">
    <div class="container">
      <div class="row justify-content-center text-center gy-4">
        @foreach($impacts as $impact)
        <div class="col-6 col-md-3">
          <div class="impact-num counter" data-target="{{ preg_replace('/[^0-9]/', '', $impact->value) }}">0</div>
          <div class="impact-label">{!! nl2br(e($impact->label)) !!}</div>
        </div>
        @if(!$loop->last) <div class="col-1 d-none d-md-block impact-divider"></div> @endif
        @endforeach
      </div>
    </div>
  </section>

  <!-- ════ À PROPOS ════ -->
  <section class="section-pad" id="apropos">
    <div class="container">
      <div class="row g-0 align-items-stretch" style="border-radius:20px;overflow:hidden;box-shadow:0 20px 60px rgba(31,78,121,0.12);border:1px solid rgba(31,78,121,0.08);">

        <div class="col-lg-5 d-none d-lg-block">
          <div class="apropos-img-block">
            <img src="{{ $apropos && $apropos->image ? asset('storage/'.$apropos->image) : asset('assets/images/Une_fondation_au_service.jpg') }}"
              alt="Fondation Djama Éducation" loading="lazy">

            <div class="apropos-img-badge">
              <div class="d-flex gap-3">
                <div>
                  <div class="num">{{ $apropos->stat_1_value ?? '+500' }}</div>
                  <div class="lbl">{{ $apropos->stat_1_label ?? 'élèves soutenues' }}</div>
                </div>
                <div style="width:1px;background:#e0e0e0;"></div>
                <div>
                  <div class="num">{{ $apropos->stat_2_value ?? '12' }}</div>
                  <div class="lbl">{{ $apropos->stat_2_label ?? 'ans d\'action' }}</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-7" style="background:#fff;padding:3rem 2.5rem;">
          <div class="section-eyebrow">À propos</div>
          <h2 class="section-title">{{ $apropos->title ?? 'Une fondation au service des plus vulnérables' }}</h2>
          <p style="color:#4a5568;">{{ $apropos->description ?? 'Depuis 2013, la Fondation Djama Éducation œuvre pour la scolarisation des jeunes filles, l\'autonomie économique et le développement des communautés les plus vulnérables de l\'Est de la Côte d\'Ivoire.' }}</p>

          <div class="d-flex flex-column gap-3 mb-4">
            @foreach($apropos->items ?? [] as $item)
            <div class="apropos-info-item">
              <div class="apropos-info-icon" style="background:{{ $item->color ?? '#E3F2FD' }};">{{ $item->icon ?? '📌' }}</div>
              <div>
                <h6>{{ $item->title }}</h6>
                <p>{{ $item->description }}</p>
              </div>
            </div>
            @endforeach
          </div>

          <a href="#agir" class="btn btn-don px-4 me-2">Nous soutenir</a>
          <a href="#programmes" class="btn btn-prog-outline btn-prog">Nos programmes <i class="bi bi-arrow-right"></i></a>
        </div>

      </div>
  </section>

  <!-- ════ PROGRAMMES ════ -->
  <section class="section-pad" id="programmes" style="background:var(--djama-light-bg);">
    <div class="container">
      <div class="text-center mb-5">
        <div class="section-eyebrow justify-content-center">Nos programmes</div>
        <h2 class="section-title">Des actions concrètes<br />sur le <span>terrain</span></h2>
      </div>

      <div class="programmes-split">
        @php $banner = $programmes->first(); @endphp
        <div class="programmes-banner">
          <img src="{{ $banner && $banner->image ? asset('storage/'.$banner->image) : asset('assets/images/Nos_programmes.jpg') }}"
            alt="Nos programmes" loading="lazy">
          <div class="programmes-banner-overlay"></div>

          <div class="programmes-banner-content">
            <div style="display:inline-block;background:rgba(244,124,32,0.25);border:1px solid rgba(244,124,32,0.4);color:#ffc78a;border-radius:30px;padding:.3rem 1rem;font-family:var(--font-head);font-weight:700;font-size:.72rem;margin-bottom:1rem;">
              {{ $programmes->count() }} programmes actifs
            </div>

            <h3>{{ $banner->title ?? 'Éducation · Économie · Santé · Social' }}</h3>
            <p>{{ $banner->description ?? 'Chaque programme est conçu pour répondre aux besoins spécifiques des populations que nous accompagnons.' }}</p>

            <a href="#agir" class="btn-slide-primary" style="align-self:flex-start;"><i class="bi bi-heart-fill"></i> Soutenir un programme</a>
          </div>
        </div>

        <div class="programmes-list">
          @foreach($programmes as $prog)
          <div class="prog-list-item">
            <div class="prog-list-num" style="background:{{ $prog->color_bg }};color:{{ $prog->color_text }};">{{ $loop->iteration }}</div>
            <div>
              <h6>{{ $prog->title }}</h6>
              <p>{{ \Illuminate\Support\Str::limit($prog->description, 100) }}</p>
              <a class="prog-list-link open-programme-modal" data-title="{{ $prog->title }}" data-content="{{ $prog->description }}">
                En savoir plus <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  <!-- ════ MODAL PROGRAMME ════ -->
  <div class="modal-overlay" id="programmeModal">
    <div class="modal-box">
      <span class="modal-close" aria-label="Fermer">&times;</span>
      <h3 class="modal-title" id="programmeModalTitle"></h3>
      <p class="modal-content" id="programmeModalContent"></p>
    </div>
  </div>

  <!-- ════ REALISATIONS ════ -->
  <section class="section-pad" id="realisations">
    <div class="container">
      <div class="row align-items-center mb-5">
        <div class="col-lg-6">
          <div class="section-eyebrow">Nos réalisations</div>
          <h2 class="section-title">Ce que nous avons<br /><span>accompli ensemble</span></h2>
        </div>
        <div class="col-lg-6">
          <p class="section-lead">Depuis 2013, des actions concrètes et mesurables transforment des centaines de vies.</p>
        </div>
      </div>

      <div class="row g-4">
        @foreach($realisations as $item)
        <div class="col-sm-6 col-lg-4">
          <div class="real-card">
            <div class="real-card-img">
              <img src="{{ $item->image ? asset('storage/'.$item->image) : '' }}"
                alt="{{ $item->title }}"
                loading="lazy"
                onerror="this.style.display='none'">
              <div class="real-year-badge">
                {{ $item->date_start ? \Carbon\Carbon::parse($item->date_start)->format('Y') : '' }}
                @if($item->date_end) – {{ \Carbon\Carbon::parse($item->date_end)->format('Y') }} @endif
              </div>
            </div>

            <div class="real-card-body">
              <h6>{{ $item->title }}</h6>
              <p>{{ \Illuminate\Support\Str::limit($item->description, 120) }}</p>
              <a href="{{ route('realisations.show', $item->slug) }}" class="btn-more">En savoir plus <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ════ PROJETS ════ -->
  <section class="section-pad" id="projets" style="background:var(--djama-light-bg);">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-5">
        <div>
          <div class="section-eyebrow">Projets en cours</div>
          <h2 class="section-title mb-0">Initiatives <span>sur le terrain</span></h2>
        </div>

        <div class="d-flex align-items-center gap-3">
          <a href="{{ route('projets.all') }}" class="btn-prog btn-prog-outline">Voir tous les projets <i class="bi bi-arrow-right"></i></a>
          <div class="d-flex gap-2">
            <button class="projets-nav-btn" id="projetPrev" aria-label="Précédent"><i class="bi bi-chevron-left"></i></button>
            <button class="projets-nav-btn" id="projetNext" aria-label="Suivant"><i class="bi bi-chevron-right"></i></button>
          </div>
        </div>
      </div>

      <div class="projets-carousel-wrap" id="projetsWrap">
        <div class="projets-carousel-track" id="projetsTrack">
          @foreach($projets as $item)
          <div class="projet-slide">
            <div class="projet-card-img">
              <div class="projet-img-wrap">
                <img src="{{ $item->image ? asset('storage/'.$item->image) : '' }}"
                  alt="{{ $item->title }}"
                  loading="lazy"
                  onerror="this.style.display='none'">

                <span class="status-badge" style="
                  @if($item->status == 'en_cours') background:#E8F5E9;color:#2E7D32;
                  @elseif($item->status == 'financement') background:#FFF8E1;color:#F57F17;
                  @else background:#E3F2FD;color:#1565C0; @endif
                ">
                  {{ ucfirst(str_replace('_',' ', $item->status)) }}
                </span>
              </div>

              <div class="projet-body">
                <h6>{{ $item->title }}</h6>
                <p>{{ \Illuminate\Support\Str::limit($item->description, 120) }}</p>
                <a href="{{ route('projets.show', $item->slug) }}" class="btn-prog btn-prog-outline">
                  En savoir plus <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>

      <div class="d-flex justify-content-center gap-2 mt-4" id="projetDots">
        @foreach($projets as $key => $item)
        <button class="slider-dot {{ $key == 0 ? 'active' : '' }}" onclick="goProjet({{ $key }})" aria-label="Projet {{ $key + 1 }}"></button>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ════ GALERIE ════ -->
  <section class="galerie-section" id="galerie">
    <div class="container">
      <div class="text-center mb-5">
        <div class="section-eyebrow justify-content-center" style="color:var(--djama-yellow);">Notre galerie</div>
        <div class="galerie-quote">
          Chaque visage est une <span>histoire de courage</span>,<br />chaque sourire est une <span>victoire</span> sur la pauvreté.
        </div>
        <p style="color:rgba(255,255,255,0.65);font-size:.95rem;max-width:560px;margin:0 auto;">
          Ces images témoignent de l'impact réel de la Fondation Djama Éducation sur le terrain.
        </p>
      </div>

      <div class="galerie-grid">
        <div class="gal-item gal-1">
          <img src="{{ asset('assets/images/13.jpeg') }}" alt="Élèves en classe - Bondoukou" loading="lazy">
          <div class="gal-overlay"></div>
          <div class="gal-label">Élèves en classe — Bondoukou</div>
        </div>

        <div class="gal-item gal-2">
          <img src="{{ asset('assets/images/18.jpeg') }}" alt="Remise de fournitures 2024" loading="lazy">
          <div class="gal-overlay"></div>
          <div class="gal-label">Remise de fournitures 2024</div>
        </div>

        <div class="gal-item gal-3">
          <img src="{{ asset('assets/images/sous_prefecture_de_kouassia_niaguini.jpeg') }}" alt="Sous préfecture de Kouassia Niaguini" loading="lazy">
          <div class="gal-overlay"></div>
          <div class="gal-label">Sous préfecture de Kouassia Niaguini</div>
        </div>

        <div class="gal-item gal-4">
          <img src="{{ asset('assets/images/formateurs.jpeg') }}" alt="Les enseignants" loading="lazy">
          <div class="gal-overlay"></div>
          <div class="gal-label">Les enseignants</div>
        </div>
      </div>

      <div class="text-center mt-5">
        <a href="{{ route('galerie') }}" class="btn" style="background:rgba(255,255,255,0.10);border:1.5px solid rgba(255,255,255,0.25);color:#fff;font-family:var(--font-head);font-weight:600;border-radius:10px;padding:.7rem 1.8rem;font-size:.88rem;">
          <i class="bi bi-images me-2"></i>Voir toute la galerie
        </a>
      </div>
    </div>
  </section>

  <!-- ════ TEMOIGNAGES ════ -->
  <section class="section-pad" id="temoignages">
    <div class="container">
      <div class="text-center mb-5">
        <div class="section-eyebrow justify-content-center">Témoignages</div>
        <h2 class="section-title">Des vies <span>transformées</span></h2>
      </div>

      <div class="row g-4">
        <div class="col-md-6 col-lg-4">
          <div class="temoignage-card">
            <div class="temoignage-quote">"</div>
            <p class="temoignage-text">Grâce à la Fondation Djama, j'ai pu retourner à l'école. Aujourd'hui je suis en troisième et je rêve de devenir médecin.</p>
            <div class="d-flex align-items-center gap-3">
              <div class="temoignage-avatar">AF</div>
              <div>
                <div class="temoignage-name">Aminata F.</div>
                <div class="temoignage-role">Élève, 15 ans — Bondoukou</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="temoignage-card">
            <div class="temoignage-quote">"</div>
            <p class="temoignage-text">Le micro-crédit m'a permis d'ouvrir mon commerce de couture. Aujourd'hui j'emploie deux autres femmes du village.</p>
            <div class="d-flex align-items-center gap-3">
              <div class="temoignage-avatar" style="background:var(--djama-green);">MK</div>
              <div>
                <div class="temoignage-name">Mariam K.</div>
                <div class="temoignage-role">Bénéficiaire micro-projet — Abengourou</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4">
          <div class="temoignage-card">
            <div class="temoignage-quote">"</div>
            <p class="temoignage-text">Nous avons appris à lire à 45 ans. Mon mari et moi pouvons maintenant lire les ordonnances médicales de nos enfants.</p>
            <div class="d-flex align-items-center gap-3">
              <div class="temoignage-avatar" style="background:var(--djama-orange);">YD</div>
              <div>
                <div class="temoignage-name">Yah D.</div>
                <div class="temoignage-role">Cours d'alphabétisation — Gontougo</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ════ ACTUALITES ════ -->
  <section class="section-pad" id="actualites" style="background:var(--djama-light-bg);">
    <div class="container">
      <div class="row align-items-center mb-5">
        <div class="col-lg-7">
          <div class="section-eyebrow">Actualités</div>
          <h2 class="section-title mb-0">Restez informés<br />de nos <span>actions</span></h2>
        </div>
        <div class="col-lg-5 text-lg-end mt-3 mt-lg-0">
          <a href="{{ route('news.all') }}" style="font-family:var(--font-head);font-weight:600;color:var(--djama-blue);font-size:.88rem;">
            Toutes les actualités <i class="bi bi-arrow-right ms-1"></i>
          </a>
        </div>
      </div>

      <div class="row g-4">
        @foreach($news as $item)
        <div class="col-md-6 col-lg-4">
          <div class="actu-card">
            <div class="actu-img">
              <img src="{{ $item->image ? asset('storage/'.$item->image) : '' }}"
                alt="{{ $item->title }}"
                loading="lazy"
                onerror="this.style.display='none'">
              <span class="actu-cat-badge" style="background:#E3F2FD;color:#1565C0;">{{ $item->category }}</span>
            </div>

            <div class="actu-body">
              <h6>{{ $item->title }}</h6>
              <p>{{ \Illuminate\Support\Str::limit($item->content, 120) }}</p>
              <a href="{{ route('news.show', $item->slug) }}" class="btn-prog btn-prog-outline mt-auto">
                Lire l'article <i class="bi bi-arrow-right"></i>
              </a>
            </div>

            <div class="actu-footer-bar">
              <span class="actu-date-txt">
                <i class="bi bi-calendar3"></i>
                {{ $item->published_at ? $item->published_at->format('d M Y') : 'Non publié' }}
              </span>
              <span style="font-size:.75rem;color:#9aacbe;">{{ $item->reading_time }} min</span>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ════ AGIR ════ -->
  <section class="section-pad" id="agir">
    <div class="container">
      <div class="text-center mb-5">
        <div class="section-eyebrow justify-content-center">Agir & Soutenir</div>
        <h2 class="section-title">Choisissez votre<br><span>façon d'aider</span></h2>
      </div>

      <div class="row g-4">
        @foreach($agirs as $agir)
        <div class="col-sm-6 col-lg-3">
          <div class="agir-card">
            <div class="agir-icon" style="background:{{ $agir->color }}">
              {!! $agir->icon !!}
            </div>
            <h5>{{ $agir->title }}</h5>
            <p>{{ $agir->description }}</p>
            <button class="btn-agir open-agir-modal"
              style="background:{{ $agir->btn_bg ?? 'var(--djama-orange)' }};color:{{ $agir->btn_color ?? '#fff' }};"
              data-type="{{ $agir->type }}"
              data-title="{{ $agir->title }}">
              {{ $agir->title }}
            </button>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ════ MODAL AGIR ════ -->
  <div class="modal-overlay" id="agirModal">
    <div class="modal-box">
      <span class="modal-close" aria-label="Fermer">&times;</span>
      <h3 id="agirModalTitle" class="modal-title"></h3>

      <form method="POST" action="{{ route('engagement.store') }}" id="agirForm">
        @csrf

        <input type="hidden" name="type" id="agirModalType">
        <input type="text" name="website" class="honeypot" tabindex="-1" autocomplete="off">

        <div class="mb-3">
          <input type="text" name="name" placeholder="Votre nom complet" required class="form-control">
        </div>

        <div class="mb-3">
          <input type="email" name="email" placeholder="Adresse email" required class="form-control">
        </div>

        <div class="mb-3">
          <input type="tel" name="phone" placeholder="Numéro de téléphone" class="form-control">
        </div>

        <div id="agirAmountField" class="mb-3" style="display:none;">
          <input type="number" name="amount" placeholder="Montant du don" min="1000" class="form-control">
        </div>

        <div class="mb-3">
          <textarea name="message" placeholder="Votre message" rows="3" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-don w-100 py-3">
          <i class="bi bi-send-fill me-2"></i>Envoyer
        </button>

        <div id="agirFormFeedback" class="mt-3 text-center d-none"></div>
      </form>
    </div>
  </div>

  <!-- ════ CTA BANDE ════ -->
  <section class="cta-bande section-pad-sm">
    <div class="container text-center position-relative">
      <h2 class="mb-2">Ensemble, construisons un avenir meilleur</h2>
      <p class="mb-4">Votre soutien, quelle que soit sa forme, change concrètement des vies.</p>
      <div class="d-flex flex-wrap justify-content-center gap-3">
        <a href="#agir" class="btn-cta-white btn"><i class="bi bi-heart-fill me-2"></i>Faire un don maintenant</a>
        <a href="#contact" class="btn" style="background:rgba(255,255,255,0.15);color:#fff;border:2px solid rgba(255,255,255,0.4);border-radius:10px;font-family:var(--font-head);font-weight:600;padding:.7rem 1.8rem;">Nous contacter</a>
      </div>
    </div>
  </section>

  <!-- ════ CONTACT ════ -->
  <section class="section-pad" id="contact">
    <div class="container">
      <div class="row gy-5">
        <div class="col-lg-5">
          <div class="section-eyebrow">Contact</div>
          <h2 class="section-title">Parlons de<br /><span>votre engagement</span></h2>
          <p style="color:#4a5568;font-size:.92rem;line-height:1.75;margin-bottom:1.5rem;">
            Vous souhaitez faire un don, devenir partenaire ou simplement en savoir plus ? Notre équipe vous répond.
          </p>
        </div>

        <div class="col-lg-7">
          <div style="background:#fff;border:1px solid rgba(31,78,121,0.10);border-radius:16px;padding:2rem;">
            <form action="{{ route('contact.store') }}" method="POST">
              @csrf
              <div class="row g-3">
                <div class="col-md-6">
                  <label style="font-family:var(--font-head);font-weight:600;font-size:.82rem;color:var(--djama-blue);margin-bottom:6px;display:block;">Nom complet</label>
                  <input type="text" name="name" class="form-control" required />
                </div>

                <div class="col-md-6">
                  <label style="font-family:var(--font-head);font-weight:600;font-size:.82rem;color:var(--djama-blue);margin-bottom:6px;display:block;">Email</label>
                  <input type="email" name="email" class="form-control" required />
                </div>

                <div class="col-12">
                  <label style="font-family:var(--font-head);font-weight:600;font-size:.82rem;color:var(--djama-blue);margin-bottom:6px;display:block;">Objet</label>
                  <select name="subject" class="form-select" required>
                    <option value="Je souhaite faire un don">Je souhaite faire un don</option>
                    <option value="Je veux parrainer une élève">Je veux parrainer une élève</option>
                    <option value="Je veux devenir bénévole">Je veux devenir bénévole</option>
                    <option value="Proposition de partenariat">Proposition de partenariat</option>
                    <option value="Autre demande">Autre demande</option>
                  </select>
                </div>

                <div class="col-12">
                  <label style="font-family:var(--font-head);font-weight:600;font-size:.82rem;color:var(--djama-blue);margin-bottom:6px;display:block;">Message</label>
                  <textarea name="message" class="form-control" rows="4" required style="resize:none;"></textarea>
                </div>

                <div class="col-12">
                  <button type="submit" class="btn btn-don w-100 py-3" style="font-size:.92rem;min-height:48px;">
                    <i class="bi bi-send-fill me-2"></i>Envoyer le message
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ════ FOOTER ════ -->
  <footer class="footer-djama py-5">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-4">
          <div class="d-flex align-items-center gap-2 mb-2">
            <img src="{{ asset('assets/images/logo.jpeg') }}" class="navbar-brand-logo" alt="Logo Fondation Djama" loading="lazy">
            <div class="footer-brand">Fondation Djama Éducation</div>
          </div>
          <div class="footer-slogan">« Offrir l'éducation, construire l'avenir »</div>
          <p style="font-size:.82rem;color:rgba(255,255,255,0.55);margin-top:1rem;line-height:1.7;">
            Fondée en 2013, la Fondation Djama œuvre pour l'éducation, l'autonomie et la santé des populations vulnérables de Côte d'Ivoire.
          </p>

          <div class="d-flex gap-2 mt-3">
            <a href="#" class="social-btn" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="social-btn" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="social-btn" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="social-btn" aria-label="Youtube"><i class="bi bi-youtube"></i></a>
          </div>
        </div>

        <div class="col-6 col-lg-2">
          <div class="footer-title">Navigation</div>
          <a class="footer-link" href="#">Accueil</a>
          <a class="footer-link" href="#apropos">À propos</a>
          <a class="footer-link" href="#programmes">Programmes</a>
          <a class="footer-link" href="#realisations">Réalisations</a>
          <a class="footer-link" href="#projets">Projets</a>
        </div>

        <div class="col-6 col-lg-2">
          <div class="footer-title">Ressources</div>
          <a class="footer-link" href="#galerie">Galerie</a>
          <a class="footer-link" href="#actualites">Actualités</a>
          <a class="footer-link" href="#temoignages">Témoignages</a>
          <a class="footer-link" href="#contact">Contact</a>
        </div>

        <div class="col-lg-4">
          <div class="footer-title">Agir maintenant</div>
          <p style="font-size:.82rem;color:rgba(255,255,255,0.55);margin-bottom:1rem;line-height:1.7;">
            Rejoignez notre communauté et recevez nos actualités terrain.
          </p>

          <a href="#agir" class="btn btn-don" style="max-width:320px;width:100%;display:block;text-align:center;">
            <i class="bi bi-heart-fill me-2"></i>Faire un don
          </a>
        </div>
      </div>

      <hr class="footer-divider my-4" />

      <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
        <div class="footer-copy">© {{ date('Y') }} Fondation Djama Éducation. Tous droits réservés. · Siège : Abidjan Cocody</div>
        <div class="d-flex gap-3">
          <a href="#" style="font-size:.75rem;color:rgba(255,255,255,0.35);">Mentions légales</a>
          <a href="#" style="font-size:.75rem;color:rgba(255,255,255,0.35);">Politique de confidentialité</a>
        </div>
      </div>
    </div>
  </footer>

  <button class="back-top" id="backTop" aria-label="Retour en haut"><i class="bi bi-chevron-up"></i></button>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function debounce(fn, delay = 100) {
      let timer;
      return (...args) => {
        clearTimeout(timer);
        timer = setTimeout(() => fn(...args), delay);
      }
    }


    // ──────────────────────────────────
    // NAVBAR
    // ──────────────────────────────────
    const nav = document.getElementById('mainNav');
    const navLinks = document.querySelectorAll('.nav-link-djama');
    const sections = document.querySelectorAll('section[id]');

    function updateNavbar() {
      const scrollY = window.scrollY;
      nav.classList.toggle('scrolled', scrollY > 30);

      sections.forEach(section => {
        const top = section.offsetTop - 120;
        const height = section.offsetHeight;
        const id = section.getAttribute('id');

        if (scrollY >= top && scrollY < top + height) {
          navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === '#' + id) link.classList.add('active');
          });
        }
      });

      document.getElementById('backTop').classList.toggle('visible', scrollY > 600);
    }

    window.addEventListener('scroll', debounce(updateNavbar));
    document.getElementById('backTop').addEventListener('click', () => window.scrollTo({
      top: 0,
      behavior: 'smooth'
    }));

    navLinks.forEach(link => {
      link.addEventListener('click', () => {
        if (document.querySelector('.navbar-collapse.show')) {
          bootstrap.Collapse.getInstance(document.getElementById('navMenu')).hide();
        }
      });
    });


    // ──────────────────────────────────
    // HERO SLIDER
    // ──────────────────────────────────
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('#sliderDots .slider-dot');
    const nextBtn = document.getElementById('sliderNext');
    const prevBtn = document.getElementById('sliderPrev');
    const progress = document.getElementById('sliderProgress');

    let currentSlide = 0;
    let sliderInterval;
    const SLIDER_DELAY = 6000;

    function showSlide(index) {
      slides.forEach(s => s.classList.remove('active'));
      dots.forEach(d => d.classList.remove('active'));

      slides[index].classList.add('active');
      dots[index].classList.add('active');
      currentSlide = index;

      resetProgressBar();
    }

    function nextSlide() {
      currentSlide = (currentSlide + 1) % slides.length;
      showSlide(currentSlide);
    }

    function prevSlide() {
      currentSlide = (currentSlide - 1 + slides.length) % slides.length;
      showSlide(currentSlide);
    }

    function resetProgressBar() {
      clearInterval(sliderInterval);
      progress.style.transition = 'none';
      progress.style.width = '0%';

      setTimeout(() => {
        progress.style.transition = `width ${SLIDER_DELAY}ms linear`;
        progress.style.width = '100%';
      }, 50);

      sliderInterval = setInterval(nextSlide, SLIDER_DELAY);
    }

    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);
    dots.forEach((dot, i) => dot.addEventListener('click', () => showSlide(i)));

    document.addEventListener('keydown', e => {
      if (e.key === 'ArrowRight') nextSlide();
      if (e.key === 'ArrowLeft') prevSlide();
    });

    let touchStartX = 0;
    document.getElementById('heroSlider').addEventListener('touchstart', e => touchStartX = e.touches[0].clientX, {
      passive: true
    });
    document.getElementById('heroSlider').addEventListener('touchend', e => {
      const delta = touchStartX - e.changedTouches[0].clientX;
      if (Math.abs(delta) > 50) delta > 0 ? nextSlide() : prevSlide();
    });

    resetProgressBar();


    // ──────────────────────────────────
    // COMPTEURS IMPACT
    // ──────────────────────────────────
    const counters = document.querySelectorAll('.counter');
    let countersAnimated = false;

    function animateCounters() {
      counters.forEach(counter => {
        const target = +counter.dataset.target;
        let count = 0;
        const steps = 80;
        const increment = target / steps;

        const update = () => {
          if (count < target) {
            count += increment;
            counter.innerText = Math.ceil(count);
            requestAnimationFrame(update);
          } else {
            counter.innerText = target;
          }
        };
        update();
      });
    }

    const counterObserver = new IntersectionObserver((entries) => {
      if (entries[0].isIntersecting && !countersAnimated) {
        animateCounters();
        countersAnimated = true;
      }
    }, {
      threshold: 0.5
    });
    counterObserver.observe(document.querySelector('.impact-section'));


    // ──────────────────────────────────
    // CAROUSEL PROJETS
    // ──────────────────────────────────
    let projetIndex = 0;
    const projetsTrack = document.getElementById('projetsTrack');
    const projetPrevBtn = document.getElementById('projetPrev');
    const projetNextBtn = document.getElementById('projetNext');
    const projetDots = document.querySelectorAll('#projetDots .slider-dot');

    function getVisibleProjets() {
      const w = document.getElementById('projetsWrap').offsetWidth;
      if (w < 640) return 1;
      if (w < 992) return 2;
      return 3;
    }

    function goProjet(index) {
      const max = Math.max(0, projetsTrack.children.length - getVisibleProjets());
      projetIndex = Math.max(0, Math.min(index, max));

      const itemWidth = projetsTrack.querySelector('.projet-slide').offsetWidth + 24;
      projetsTrack.style.transform = `translateX(-${projetIndex * itemWidth}px)`;

      projetPrevBtn.disabled = projetIndex <= 0;
      projetNextBtn.disabled = projetIndex >= max;

      projetDots.forEach((d, i) => d.classList.toggle('active', i === Math.floor(projetIndex / getVisibleProjets())));
    }

    projetNextBtn.addEventListener('click', () => goProjet(projetIndex + 1));
    projetPrevBtn.addEventListener('click', () => goProjet(projetIndex - 1));
    window.addEventListener('resize', debounce(() => goProjet(projetIndex)));
    goProjet(0);


    // ──────────────────────────────────
    // MODAL PROGRAMMES
    // ──────────────────────────────────
    const programmeModal = document.getElementById('programmeModal');
    const programmeModalTitle = document.getElementById('programmeModalTitle');
    const programmeModalContent = document.getElementById('programmeModalContent');

    document.addEventListener('click', e => {
      const btn = e.target.closest('.open-programme-modal');
      if (btn) {
        programmeModalTitle.textContent = btn.dataset.title;
        programmeModalContent.textContent = btn.dataset.content;
        programmeModal.classList.add('active');
      }
    });

    programmeModal.querySelector('.modal-close').addEventListener('click', () => programmeModal.classList.remove('active'));
    programmeModal.addEventListener('click', e => e.target === programmeModal && programmeModal.classList.remove('active'));


    // ──────────────────────────────────
    // MODAL AGIR
    // ──────────────────────────────────
    const agirModal = document.getElementById('agirModal');
    const agirModalTitle = document.getElementById('agirModalTitle');
    const agirModalType = document.getElementById('agirModalType');
    const agirAmountField = document.getElementById('agirAmountField');
    const agirForm = document.getElementById('agirForm');

    document.querySelectorAll('.open-agir-modal').forEach(btn => {
      btn.addEventListener('click', () => {
        agirModalTitle.innerText = btn.dataset.title;
        agirModalType.value = btn.dataset.type;

        // Afficher champ montant seulement pour les dons
        agirAmountField.style.display = btn.dataset.type === 'donation' ? 'block' : 'none';

        agirModal.classList.add('active');
      });
    });

    agirModal.querySelector('.modal-close').addEventListener('click', () => agirModal.classList.remove('active'));
    agirModal.addEventListener('click', e => e.target === agirModal && agirModal.classList.remove('active'));

    // Gestion soumission formulaire
    agirForm.addEventListener('submit', async (e) => {
      e.preventDefault();

      // Anti bot honeypot
      if (agirForm.querySelector('[name="website"]').value) return;

      const feedback = document.getElementById('agirFormFeedback');
      const btn = agirForm.querySelector('button[type="submit"]');

      btn.disabled = true;
      btn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Envoi en cours...';
      feedback.classList.add('d-none');

      try {
        // Envoyer vraiment les données via FormData
        const formData = new FormData(agirForm);
        const response = await fetch(agirForm.action, {
          method: 'POST',
          body: formData,
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
          }
        });

        if (!response.ok) {
          throw new Error(`Erreur HTTP: ${response.status}`);
        }

        const data = await response.json();

        feedback.innerHTML = '✅ Message envoyé avec succès ! Nous vous recontacterons très rapidement.';
        feedback.style.color = '#2E7D32';
        feedback.classList.remove('d-none');
        agirForm.reset();

        setTimeout(() => agirModal.classList.remove('active'), 2000);

      } catch (err) {
        console.error('Erreur:', err);
        feedback.innerHTML = '❌ Une erreur est survenue, veuillez réessayer.';
        feedback.style.color = '#E53935';
        feedback.classList.remove('d-none');
      }

      btn.disabled = false;
      btn.innerHTML = '<i class="bi bi-send-fill me-2"></i>Envoyer';
    });


    // Ferme TOUS les modaux avec Echap
    document.addEventListener('keydown', e => {
      if (e.key === 'Escape') {
        programmeModal.classList.remove('active');
        agirModal.classList.remove('active');
      }
    });
  </script>
</body>

</html>