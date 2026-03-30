<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fondation Djama Éducation — Offrir l'éducation, construire l'avenir</title>
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
      overflow-x: hidden
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

    /* ── NAVBAR ── */
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
      width: 80px;
      height: 80px;
      border-radius: 10px;
      background: var(--djama-blue);
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: var(--font-head);
      font-weight: 800;
      font-size: 18px;
      color: #fff;
      letter-spacing: -1px;
      flex-shrink: 0
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
      letter-spacing: .05em
    }

    .nav-link-djama {
      font-family: var(--font-head);
      font-weight: 500;
      font-size: 0.85rem;
      color: #3a4a5c !important;
      padding: 0.4rem 0.8rem !important;
      border-radius: 6px;
      transition: color .2s, background .2s
    }

    .nav-link-djama:hover,
    .nav-link-djama.active {
      color: var(--djama-blue) !important;
      background: rgba(31, 78, 121, 0.07)
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

    /* ── HERO SLIDER ── */
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
      border: none;
      border-radius: 10px;
      padding: .7rem 1.6rem;
      text-decoration: none;
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
      text-decoration: none;
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
      font-size: 1rem;
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
      border: none
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
      transition: width linear
    }

    /* ── SECTION TITLES ── */
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
      display: inline-block;
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

    /* ── IMPACT CHIFFRES ── */
    .impact-section {
      background: var(--djama-blue);
      position: relative;
      overflow: hidden
    }

    .impact-section::before {
      content: '';
      position: absolute;
      top: -60px;
      right: -60px;
      width: 300px;
      height: 300px;
      border-radius: 50%;
      background: rgba(44, 166, 209, 0.15)
    }

    .impact-num {
      font-family: var(--font-head);
      font-weight: 800;
      font-size: clamp(2.2rem, 4vw, 3rem);
      color: var(--djama-yellow);
      line-height: 1
    }

    .impact-label {
      font-size: .88rem;
      color: rgba(255, 255, 255, 0.75);
      margin-top: .3rem
    }

    .impact-divider {
      width: 1px;
      background: rgba(255, 255, 255, 0.15)
    }

    /* ── À PROPOS — 2 blocs ── */
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
      object-fit: cover;
      display: block
    }

    .apropos-img-block .apropos-img-ph {
      width: 100%;
      height: 100%;
      min-height: 500px;
      background: linear-gradient(160deg, #1F4E79 0%, #2CA6D1 100%);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 12px
    }

    .apropos-img-badge {
      position: absolute;
      bottom: 24px;
      left: 50%;
      transform: translateX(-50%);
      background: rgba(255, 255, 255, 0.95);
      border-radius: 14px;
      padding: 1rem 1.4rem;
      text-align: center;
      white-space: nowrap;
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

    /* ── PROGRAMMES — bannière verticale + liste ── */
    .programmes-split {
      display: grid;
      grid-template-columns: 340px 1fr;
      gap: 0;
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
      min-height: 540px;
      background: linear-gradient(175deg, #1F4E79 0%, #2CA6D1 100%)
    }

    .programmes-banner img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
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
      border-bottom: none;
      padding-bottom: 0
    }

    .prog-list-item:first-child {
      padding-top: 0
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
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 4px;
      margin-top: .4rem;
      transition: gap .2s
    }

    .prog-list-link:hover {
      gap: 8px
    }

    /* ── RÉALISATIONS — cards avec image ── */
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
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0
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

    .real-card-img-ph {
      font-size: 2.8rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 6px
    }

    .real-card-img-ph span {
      font-family: var(--font-head);
      font-size: .72rem;
      color: rgba(255, 255, 255, 0.7);
      font-weight: 600
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

    /* ── PROJETS CARROUSEL ── */
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
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0
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

    .projet-img-ph {
      font-size: 2.6rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 6px
    }

    .projet-img-ph span {
      font-family: var(--font-head);
      font-size: .72rem;
      color: rgba(255, 255, 255, 0.7);
      font-weight: 600
    }

    .status-badge {
      position: absolute;
      top: 10px;
      left: 10px;
      font-size: .68rem;
      font-weight: 700;
      font-family: var(--font-head);
      padding: .22rem .7rem;
      border-radius: 20px;
      display: inline-block
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

    .progress-djama {
      height: 7px;
      border-radius: 10px;
      background: #e8f0f7;
      overflow: hidden
    }

    .progress-djama-bar {
      height: 100%;
      border-radius: 10px;
      background: linear-gradient(90deg, var(--djama-blue-light), var(--djama-blue))
    }

    .projet-meta {
      display: flex;
      justify-content: space-between;
      font-size: .75rem;
      color: #8a9aaa;
      margin-top: .4rem;
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
      font-size: 1rem
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

    /* ── GALERIE FILLES — section immersive ── */
    .galerie-section {
      background: var(--djama-dark);
      position: relative;
      overflow: hidden;
      padding: 80px 0
    }

    .galerie-section::before {
      /* content: '';
      position: absolute;
      inset: 0;
      background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/svg%3E") */
      pointer-events: none;
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

    .gal-item-ph {
      width: 100%;
      height: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 8px;
      font-size: 2rem
    }

    .gal-item-ph span {
      font-family: var(--font-head);
      font-size: .72rem;
      color: rgba(255, 255, 255, 0.7);
      font-weight: 600
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

    .gal-5 {
      grid-column: span 2;
      grid-row: span 1
    }

    @media(max-width:991px) {
      .gal-1 {
        grid-column: span 6;
        grid-row: span 1
      }

      .gal-2,
      .gal-3,
      .gal-4,
      .gal-5 {
        grid-column: span 3;
        grid-row: span 1
      }
    }

    @media(max-width:640px) {

      .gal-1,
      .gal-2,
      .gal-3,
      .gal-4,
      .gal-5 {
        grid-column: span 1;
        grid-row: span 1
      }
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

    /* ── MEDIA ── */
    .media-section {
      background: var(--djama-light-bg)
    }

    .media-tab-btn {
      background: transparent;
      border: 1px solid rgba(31, 78, 121, 0.15);
      color: #4a5a6a;
      font-family: var(--font-head);
      font-weight: 600;
      font-size: .82rem;
      border-radius: 8px;
      padding: .45rem 1rem;
      cursor: pointer;
      transition: all .2s
    }

    .media-tab-btn.active,
    .media-tab-btn:hover {
      background: var(--djama-blue);
      color: #fff;
      border-color: var(--djama-blue)
    }

    .media-card {
      background: #fff;
      border-radius: 14px;
      overflow: hidden;
      border: 1px solid rgba(31, 78, 121, 0.08);
      transition: transform .2s, box-shadow .2s
    }

    .media-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 32px rgba(0, 0, 0, 0.09)
    }

    .media-thumb {
      height: 130px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2.6rem
    }

    .media-info {
      padding: .85rem 1rem
    }

    .media-info h6 {
      font-family: var(--font-head);
      font-weight: 700;
      font-size: .85rem;
      color: var(--djama-blue);
      margin-bottom: .2rem
    }

    .media-info span {
      font-size: .73rem;
      color: #8a9aaa
    }

    /* ── ACTUALITÉS ── */
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
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0
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

    .actu-img-ph {
      font-size: 2.5rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 6px
    }

    .actu-img-ph span {
      font-family: var(--font-head);
      font-size: .7rem;
      color: rgba(255, 255, 255, 0.7);
      font-weight: 600
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

    /* ── TÉMOIGNAGES ── */
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

    /* ── AGIR ── */
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
      text-decoration: none
    }

    .btn-agir:hover {
      transform: translateY(-1px);
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12)
    }

    /* ── ÉQUIPE ── */
    .equipe-card {
      text-align: center;
      padding: 1.5rem 1rem;
      border-radius: 14px;
      background: #fff;
      border: 1px solid rgba(31, 78, 121, 0.07);
      transition: box-shadow .2s, transform .2s
    }

    .equipe-card:hover {
      box-shadow: 0 10px 28px rgba(31, 78, 121, 0.09);
      transform: translateY(-2px)
    }

    .equipe-avatar {
      width: 72px;
      height: 72px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: var(--font-head);
      font-weight: 800;
      font-size: 1.3rem;
      margin: 0 auto .9rem;
      border: 3px solid rgba(31, 78, 121, 0.12)
    }

    .equipe-card h6 {
      font-family: var(--font-head);
      font-weight: 700;
      font-size: .9rem;
      color: var(--djama-blue);
      margin-bottom: .15rem
    }

    .equipe-card span {
      font-size: .78rem;
      color: #8a9aaa
    }

    /* ── CTA BANDE ── */
    .cta-bande {
      background: linear-gradient(135deg, var(--djama-orange) 0%, #e86010 100%);
      position: relative;
      overflow: hidden
    }

    .cta-bande::before {
      content: '';
      position: absolute;
      right: -40px;
      top: -40px;
      width: 200px;
      height: 200px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.08)
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

    /* ── FOOTER ── */
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
      margin-bottom: 1rem;
      letter-spacing: .04em
    }

    .footer-link {
      display: block;
      color: rgba(255, 255, 255, 0.65);
      font-size: .84rem;
      text-decoration: none;
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
      width: 36px;
      height: 36px;
      border-radius: 8px;
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.12);
      display: inline-flex;
      align-items: center;
      justify-content: center;
      color: rgba(255, 255, 255, 0.7);
      font-size: .95rem;
      text-decoration: none;
      transition: background .2s, color .2s
    }

    .social-btn:hover {
      background: var(--djama-orange);
      color: #fff;
      border-color: var(--djama-orange)
    }

    /* ── UTILITIES ── */
    .section-pad {
      padding: 80px 0
    }

    .section-pad-sm {
      padding: 60px 0
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
      text-decoration: none;
      transition: all .2s;
      border: none;
      cursor: pointer;
      align-self: flex-start
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
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 5px;
      transition: gap .2s
    }

    .btn-more:hover {
      gap: 9px;
      color: var(--djama-blue)
    }

    /* gradient image placeholders */
    .img-blue {
      background: linear-gradient(135deg, #1F4E79, #2CA6D1)
    }

    .img-green {
      background: linear-gradient(135deg, #1B5E20, #43A047)
    }

    .img-orange {
      background: linear-gradient(135deg, #E65100, #F47C20)
    }

    .img-purple {
      background: linear-gradient(135deg, #4527A0, #7E57C2)
    }

    .img-teal {
      background: linear-gradient(135deg, #006064, #26C6DA)
    }

    .img-red {
      background: linear-gradient(135deg, #B71C1C, #E53935)
    }

    .img-gold {
      background: linear-gradient(135deg, #F57F17, #FBC02D)
    }

    @media(max-width:991px) {
      .slider-arrow {
        display: none
      }
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
    }
  </style>
</head>

<body>

  <!-- ════ NAVBAR ════ -->
  <nav class="navbar navbar-expand-lg navbar-djama" id="mainNav">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2 text-decoration-none" href="#">
        <img src="{{ asset('assets/images/logo.jpeg') }}" class="navbar-brand-logo" alt="Logo">
        <div class="navbar-brand-text">Fondation Djama<small>Éducation</small></div>
      </a>
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <i class="bi bi-list" style="font-size:1.5rem;color:var(--djama-blue);"></i>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto align-items-lg-center gap-1 py-2 py-lg-0">
          <li class="nav-item"><a class="nav-link-djama active" href="#">Accueil</a></li>
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
      <div class="slide active" id="slide-0">
        <div class="slide-bg img-blue" style="background-image:url('https://images.unsplash.com/photo-1617854818583-09e7f077a156?w=1400&auto=format&fit=crop');"></div>
        <div class="slide-overlay"></div>
        <div class="slide-content">
          <div class="container py-5">
            <div class="row">
              <div class="col-lg-7 col-xl-6">
                <div class="slide-badge"><i class="bi bi-award-fill"></i> Fondée en 2013 · Abidjan, Côte d'Ivoire</div>
                <h1 class="slide-title">Offrir l'éducation,<br /><span>construire l'avenir</span></h1>
                <p class="slide-desc">La Fondation Djama Éducation œuvre pour la scolarisation des jeunes filles de l'Est du pays, l'autonomie économique et le développement des communautés.</p>
                <div class="slide-btns"><a href="#agir" class="btn-slide-primary"><i class="bi bi-heart-fill"></i> Soutenir la cause</a><a href="#programmes" class="btn-slide-secondary">Nos programmes <i class="bi bi-arrow-right"></i></a></div>
                <div class="slider-stats">
                  <div class="slider-stat">
                    <div class="slider-stat-num">+500</div>
                    <div class="slider-stat-label">Filles scolarisées</div>
                  </div>
                  <div class="slider-stat">
                    <div class="slider-stat-num">12</div>
                    <div class="slider-stat-label">Ans d'action</div>
                  </div>
                  <div class="slider-stat">
                    <div class="slider-stat-num">+80</div>
                    <div class="slider-stat-label">Micro-projets</div>
                  </div>
                  <div class="slider-stat">
                    <div class="slider-stat-num">+200</div>
                    <div class="slider-stat-label">Familles aidées</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="slide" id="slide-1">
        <div class="slide-bg img-green" style="background-image:url('https://images.unsplash.com/photo-1509062522246-3755977927d7?w=1400&auto=format&fit=crop');"></div>
        <div class="slide-overlay"></div>
        <div class="slide-content">
          <div class="container py-5">
            <div class="row">
              <div class="col-lg-7 col-xl-6">
                <div class="slide-badge"><i class="bi bi-book-fill"></i> Programme Éducation</div>
                <h1 class="slide-title">Chaque fille mérite<br /><span>d'aller à l'école</span></h1>
                <p class="slide-desc">Nous finançons la scolarité, les fournitures et le soutien scolaire de centaines de jeunes filles dans les zones rurales de l'Est de la Côte d'Ivoire.</p>
                <div class="slide-btns"><a href="#agir" class="btn-slide-primary"><i class="bi bi-gift-fill"></i> Parrainer une élève</a><a href="#programmes" class="btn-slide-secondary">En savoir plus <i class="bi bi-arrow-right"></i></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="slide" id="slide-2">
        <div class="slide-bg img-orange" style="background-image:url('https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=1400&auto=format&fit=crop');"></div>
        <div class="slide-overlay"></div>
        <div class="slide-content">
          <div class="container py-5">
            <div class="row">
              <div class="col-lg-7 col-xl-6">
                <div class="slide-badge"><i class="bi bi-people-fill"></i> Autonomisation économique</div>
                <h1 class="slide-title">Des micro-projets qui<br /><span>changent des vies</span></h1>
                <p class="slide-desc">Grâce au financement de micro-entreprises, des dizaines de jeunes femmes ont créé leur propre activité et sont devenues autonomes financièrement.</p>
                <div class="slide-btns"><a href="#agir" class="btn-slide-primary"><i class="bi bi-cash-coin"></i> Contribuer</a><a href="#realisations" class="btn-slide-secondary">Voir les réalisations <i class="bi bi-arrow-right"></i></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="slide" id="slide-3">
        <div class="slide-bg img-teal" style="background-image:url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=1400&auto=format&fit=crop');"></div>
        <div class="slide-overlay"></div>
        <div class="slide-content">
          <div class="container py-5">
            <div class="row">
              <div class="col-lg-7 col-xl-6">
                <div class="slide-badge"><i class="bi bi-heart-pulse-fill"></i> Programme Santé</div>
                <h1 class="slide-title">Santé et bien-être<br /><span>pour tous</span></h1>
                <p class="slide-desc">Campagnes médicales, projets agricoles, distribution alimentaire — nous répondons aux besoins urgents des populations les plus vulnérables.</p>
                <div class="slide-btns"><a href="#projets" class="btn-slide-primary"><i class="bi bi-clipboard2-pulse"></i> Nos projets</a><a href="#agir" class="btn-slide-secondary">Nous rejoindre <i class="bi bi-arrow-right"></i></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button class="slider-arrow prev" id="sliderPrev"><i class="bi bi-chevron-left"></i></button>
    <button class="slider-arrow next" id="sliderNext"><i class="bi bi-chevron-right"></i></button>
    <div class="slider-dots" id="sliderDots">
      <button class="slider-dot active"></button><button class="slider-dot"></button>
      <button class="slider-dot"></button><button class="slider-dot"></button>
    </div>
    <div class="slider-progress" id="sliderProgress"></div>
  </div>

  <!-- ════ IMPACT ════ -->
  <section class="impact-section section-pad-sm">
    <div class="container">
      <div class="row justify-content-center text-center gy-4">
        <div class="col-6 col-md-3">
          <div class="impact-num">+500</div>
          <div class="impact-label">Jeunes filles<br />scolarisées</div>
        </div>
        <div class="col-1 d-none d-md-block impact-divider"></div>
        <div class="col-6 col-md-3">
          <div class="impact-num">+80</div>
          <div class="impact-label">Micro-projets<br />financés</div>
        </div>
        <div class="col-1 d-none d-md-block impact-divider"></div>
        <div class="col-6 col-md-3">
          <div class="impact-num">12</div>
          <div class="impact-label">Années<br />d'engagement</div>
        </div>
        <div class="col-1 d-none d-md-block impact-divider"></div>
        <div class="col-6 col-md-3">
          <div class="impact-num">+200</div>
          <div class="impact-label">Familles<br />assistées</div>
        </div>
      </div>
    </div>
  </section>

  <!-- ════ À PROPOS — 2 blocs côte à côte ════ -->
  <section class="section-pad" id="apropos">
    <div class="container">
      <div class="row g-0 align-items-stretch" style="border-radius:20px;overflow:hidden;box-shadow:0 20px 60px rgba(31,78,121,0.12);border:1px solid rgba(31,78,121,0.08);">

        <!-- Bloc gauche — image verticale -->
        <div class="col-lg-5 d-none d-lg-block">
          <div class="apropos-img-block">
            <img src="{{ asset('assets/images/Une_fondation_au_service.jpg') }}" alt="Jeunes filles à l'école"
              onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
            <div class="apropos-img-ph" style="display:none;">
              <div style="font-size:4rem;">👧</div>
              <div style="font-family:var(--font-head);font-weight:700;font-size:1rem;color:rgba(255,255,255,0.8);">Nos bénéficiaires</div>
            </div>
            <!-- Badge flottant -->
            <div class="apropos-img-badge">
              <div class="d-flex gap-3">
                <div>
                  <div class="num">+500</div>
                  <div class="lbl">élèves soutenues</div>
                </div>
                <div style="width:1px;background:#e0e0e0;"></div>
                <div>
                  <div class="num">12</div>
                  <div class="lbl">ans d'action</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Bloc droit — contenu -->
        <div class="col-lg-7" style="background:#fff;padding:3rem 2.5rem;">
          <div class="section-eyebrow">À propos</div>
          <h2 class="section-title">Une fondation au service<br />des <span>plus vulnérables</span></h2>
          <p style="color:#4a5568;font-size:.95rem;line-height:1.8;margin-bottom:1.8rem;">
            Créée le <strong>30 janvier 2013</strong> à Abidjan Cocody, la Fondation Djama Éducation s'engage pour l'accès à l'éducation, la santé et l'autonomie des populations, avec une attention particulière pour les jeunes filles de l'Est du pays. En plus de 12 années d'action, nous avons transformé des centaines de vies.
          </p>
          <div class="d-flex flex-column gap-3 mb-4">
            <div class="apropos-info-item">
              <div class="apropos-info-icon" style="background:#E3F2FD;">📚</div>
              <div>
                <h6>Scolarisation des filles</h6>
                <p>Promouvoir l'accès à l'éducation pour les jeunes filles de l'Est et lutter contre l'abandon scolaire.</p>
              </div>
            </div>
            <div class="apropos-info-item">
              <div class="apropos-info-icon" style="background:#E8F5E9;">🌱</div>
              <div>
                <h6>Lutte contre la pauvreté</h6>
                <p>Financement de micro-projets pour l'autonomisation économique des jeunes filles et femmes.</p>
              </div>
            </div>
            <div class="apropos-info-item">
              <div class="apropos-info-icon" style="background:#FFF8E1;">🏥</div>
              <div>
                <h6>Santé & alimentation</h6>
                <p>Répondre aux besoins sanitaires, agricoles et alimentaires urgents des populations rurales.</p>
              </div>
            </div>
            <div class="apropos-info-item">
              <div class="apropos-info-icon" style="background:#EDE7F6;">📍</div>
              <div>
                <h6>Siège — Abidjan Cocody</h6>
                <p>Riviera 2 les Jardins, en face de la Mosquée · 23 B.P 1990 Abidjan 23</p>
              </div>
            </div>
          </div>
          <a href="#agir" class="btn btn-don px-4 me-2">Nous soutenir</a>
          <a href="#programmes" class="btn btn-prog-outline btn-prog">Nos programmes <i class="bi bi-arrow-right"></i></a>
        </div>

      </div>
    </div>
  </section>

  <!-- ════ PROGRAMMES — bannière verticale + liste ════ -->
  <section class="section-pad" id="programmes" style="background:var(--djama-light-bg);">
    <div class="container">
      <div class="text-center mb-5">
        <div class="section-eyebrow justify-content-center">Nos programmes</div>
        <h2 class="section-title">Des actions concrètes<br />sur le <span>terrain</span></h2>
      </div>
      <div class="programmes-split">

        <!-- Bannière verticale gauche -->
        <div class="programmes-banner">
          <img src="{{ asset('assets/images/Nos_programmes.jpg') }}"
            alt="Programmes Fondation Djama"
            onerror="this.style.display='none';" />
          <div class="programmes-banner-overlay"></div>
          <div class="programmes-banner-content">
            <div style="background:rgba(244,124,32,0.25);border:1px solid rgba(244,124,32,0.4);color:#ffc78a;border-radius:30px;padding:.3rem 1rem;font-family:var(--font-head);font-weight:700;font-size:.72rem;letter-spacing:.08em;text-transform:uppercase;display:inline-block;margin-bottom:1rem;">6 programmes actifs</div>
            <h3>Éducation · Économie · Santé · Social</h3>
            <p>Chaque programme est conçu pour répondre aux besoins spécifiques des populations que nous accompagnons depuis 2013.</p>
            <a href="#agir" class="btn-slide-primary" style="align-self:flex-start;">
              <i class="bi bi-heart-fill"></i> Soutenir un programme
            </a>
          </div>
        </div>

        <!-- Liste des programmes -->
        <div class="programmes-list">
          <div class="prog-list-item">
            <div class="prog-list-num" style="background:#E3F2FD;color:#1565C0;">1</div>
            <div>
              <h6>Scolarisation des jeunes filles</h6>
              <p>Prise en charge des frais scolaires, fournitures et suivi pédagogique pour les filles de l'Est du pays.</p>
              <a href="#" class="prog-list-link">En savoir plus <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
          <div class="prog-list-item">
            <div class="prog-list-num" style="background:#E8F5E9;color:#2E7D32;">2</div>
            <div>
              <h6>Financement de micro-projets</h6>
              <p>Microcrédit sans intérêt et formation entrepreneuriale pour les jeunes femmes porteuses de projets.</p>
              <a href="#" class="prog-list-link">En savoir plus <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
          <div class="prog-list-item">
            <div class="prog-list-num" style="background:#FFF8E1;color:#F57F17;">3</div>
            <div>
              <h6>Santé, agriculture & alimentation</h6>
              <p>Consultations gratuites, projets agricoles communautaires et distribution alimentaire d'urgence.</p>
              <a href="#" class="prog-list-link">En savoir plus <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
          <div class="prog-list-item">
            <div class="prog-list-num" style="background:#FCE4EC;color:#880E4F;">4</div>
            <div>
              <h6>Assistance aux personnes vulnérables</h6>
              <p>Aide d'urgence et accompagnement psychosocial pour les personnes en grande vulnérabilité.</p>
              <a href="#" class="prog-list-link">En savoir plus <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
          <div class="prog-list-item">
            <div class="prog-list-num" style="background:#EDE7F6;color:#4527A0;">5</div>
            <div>
              <h6>Alphabétisation des adultes</h6>
              <p>Cours du soir et week-end animés par des formateurs bénévoles qualifiés pour adultes.</p>
              <a href="#" class="prog-list-link">En savoir plus <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
          <div class="prog-list-item">
            <div class="prog-list-num" style="background:#E1F5FE;color:#01579B;">6</div>
            <div>
              <h6>Parrainage d'élèves</h6>
              <p>Mise en relation de bienfaiteurs avec une jeune fille pour suivre son parcours scolaire personnellement.</p>
              <a href="#agir" class="prog-list-link" style="color:var(--djama-orange);">Parrainer une élève <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ════ RÉALISATIONS — cards images ════ -->

  <!-- <section class="section-pad" id="realisations">
  <div class="container">
    <div class="row align-items-center mb-5">
      <div class="col-lg-6">
        <div class="section-eyebrow">Nos réalisations</div>
        <h2 class="section-title">Ce que nous avons<br/><span>accompli ensemble</span></h2>
      </div>
      <div class="col-lg-6">
        <p class="section-lead">Depuis 2013, des actions concrètes et mesurables transforment des centaines de vies.</p>
      </div>
    </div>
    <div class="row g-4">
      <div class="col-sm-6 col-lg-4">
        <div class="real-card">
          <div class="real-card-img img-blue">
            <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=600&auto=format&fit=crop" alt="Salles de classe" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"/>
            <div class="real-card-img-ph" style="display:none;flex-direction:column;align-items:center;">🏫<span>Salles de classe</span></div>
            <div class="real-year-badge">2018–2023</div>
          </div>
          <div class="real-card-body">
            <h6>Salles de classe construites</h6>
            <p>3 salles construites et équipées dans la région Est, bénéficiant à plus de 150 élèves par an.</p>
            <a href="#" class="btn-more">En savoir plus <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4">
        <div class="real-card">
          <div class="real-card-img img-green">
            <img src="https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=600&auto=format&fit=crop" alt="Bourses scolaires" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"/>
            <div class="real-card-img-ph" style="display:none;flex-direction:column;align-items:center;">👧<span>Bourses scolaires</span></div>
            <div class="real-year-badge">2013–2024</div>
          </div>
          <div class="real-card-body">
            <h6>Bourses scolaires attribuées</h6>
            <p>Plus de 500 bourses remises à des jeunes filles méritantes et démunies depuis la création.</p>
            <a href="#" class="btn-more">En savoir plus <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4">
        <div class="real-card">
          <div class="real-card-img img-orange">
            <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=600&auto=format&fit=crop" alt="Micro-projets" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"/>
            <div class="real-card-img-ph" style="display:none;flex-direction:column;align-items:center;">💼<span>Micro-projets</span></div>
            <div class="real-year-badge">2015–2024</div>
          </div>
          <div class="real-card-body">
            <h6>Micro-projets financés</h6>
            <p>83 micro-entreprises créées et accompagnées, générant des revenus durables pour des jeunes femmes.</p>
            <a href="#" class="btn-more">En savoir plus <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4">
        <div class="real-card">
          <div class="real-card-img img-red">
            <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=600&auto=format&fit=crop" alt="Campagnes médicales" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"/>
            <div class="real-card-img-ph" style="display:none;flex-direction:column;align-items:center;">🏥<span>Campagnes médicales</span></div>
            <div class="real-year-badge">2016–2024</div>
          </div>
          <div class="real-card-body">
            <h6>Campagnes médicales</h6>
            <p>6 campagnes organisées, touchant plus de 1 200 bénéficiaires dans les villages reculés.</p>
            <a href="#" class="btn-more">En savoir plus <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4">
        <div class="real-card">
          <div class="real-card-img img-purple">
            <img src="https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?w=600&auto=format&fit=crop" alt="Alphabétisation" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"/>
            <div class="real-card-img-ph" style="display:none;flex-direction:column;align-items:center;">📖<span>Alphabétisation</span></div>
            <div class="real-year-badge">2014–2024</div>
          </div>
          <div class="real-card-body">
            <h6>Adultes alphabétisés</h6>
            <p>120 adultes ont appris à lire et écrire grâce aux cours de la fondation.</p>
            <a href="#" class="btn-more">En savoir plus <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4">
        <div class="real-card">
          <div class="real-card-img img-teal">
            <img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=600&auto=format&fit=crop" alt="Agriculture" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"/>
            <div class="real-card-img-ph" style="display:none;flex-direction:column;align-items:center;">🌾<span>Agriculture</span></div>
            <div class="real-year-badge">2019–2024</div>
          </div>
          <div class="real-card-body">
            <h6>Coopératives agricoles</h6>
            <p>4 coopératives mises en place pour améliorer la sécurité alimentaire des communautés rurales.</p>
            <a href="#" class="btn-more">En savoir plus <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->

  <section class="section-pad" id="realisations">
    <div class="container">

      <div class="row align-items-center mb-5">
        <div class="col-lg-6">
          <div class="section-eyebrow">Nos réalisations</div>
          <h2 class="section-title">
            Ce que nous avons<br /><span>accompli ensemble</span>
          </h2>
        </div>
        <div class="col-lg-6">
          <p class="section-lead">
            Depuis {{ $realisations->first() && $realisations->first()->date_start 
    ? \Carbon\Carbon::parse($realisations->first()->date_start)->format('Y') 
    : '2013'}},
            des actions concrètes transforment des vies.
          </p>
        </div>
      </div>

      <div class="row g-4">

        @foreach($realisations as $item)
        <div class="col-sm-6 col-lg-4">

          <div class="real-card">

            {{-- IMAGE --}}
            <div class="real-card-img">

              @if($item->image)
              <img src="{{ asset('storage/'.$item->image) }}"
                alt="{{ $item->title }}"
                onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
              @endif

              {{-- FALLBACK --}}
              <div class="real-card-img-ph"
                style="{{ $item->image ? 'display:none;' : 'display:flex;' }} flex-direction:column;align-items:center;">
                📌
                <span>{{ $item->title }}</span>
              </div>

              {{-- BADGE DATE --}}
              <div class="real-year-badge">
                {{ $item->date_start ? \Carbon\Carbon::parse($item->date_start)->format('Y') : '' }}
                @if($item->date_end)
                – {{ \Carbon\Carbon::parse($item->date_end)->format('Y') }}
                @endif
              </div>

            </div>

            {{-- CONTENT --}}
            <div class="real-card-body">
              <h6>{{ $item->title }}</h6>

              <p>
                {{ \Illuminate\Support\Str::limit($item->description, 120) }}
              </p>

              <a href="{{ route('realisations.show', $item->slug) }}" class="btn-more">
                En savoir plus <i class="bi bi-arrow-right"></i>
              </a>
            </div>

          </div>

        </div>
        @endforeach

      </div>
    </div>
  </section>
  <!-- ════ PROJETS EN COURS — CARROUSEL ════ -->
  <!-- <section class="section-pad" id="projets" style="background:var(--djama-light-bg);"> -->
  <!-- <div class="container"> -->
  <!-- <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-5"> -->
  <!-- <div>
          <div class="section-eyebrow">Projets en cours</div>
          <h2 class="section-title mb-0">Initiatives <span>sur le terrain</span></h2>
        </div> -->
  <!-- <div class="d-flex align-items-center gap-3">
          <a href="#" class="btn-prog btn-prog-outline">Voir tous les projets <i class="bi bi-arrow-right"></i></a>
          <div class="d-flex gap-2">
            <button class="projets-nav-btn" id="projetPrev"><i class="bi bi-chevron-left"></i></button>
            <button class="projets-nav-btn" id="projetNext"><i class="bi bi-chevron-right"></i></button>
          </div> -->
  <!-- </div> -->
  <!-- </div>

      <div class="projets-carousel-wrap" id="projetsWrap">
        <div class="projets-carousel-track" id="projetsTrack">

          <div class="projet-slide">
            <div class="projet-card-img">
              <div class="projet-img-wrap img-blue">
                <img src="https://images.unsplash.com/photo-1592595896616-c37162298647?w=600&auto=format&fit=crop" alt="École Bondoukou" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
                <div class="projet-img-ph" style="display:none;flex-direction:column;align-items:center;">🏫<span>Construction</span></div>
                <span class="status-badge" style="background:#E8F5E9;color:#2E7D32;">En cours</span>
              </div> -->
  <!-- <div class="projet-body">
                <h6>Construction d'une école à Bondoukou</h6>
                <p>Bâtiment scolaire de 4 classes dans la région du Gontougo pour accueillir 160 élèves.</p>
                <div class="progress-djama">
                  <div class="progress-djama-bar" style="width:72%;"></div>
                </div>
                <div class="projet-meta"><span>Avancement : 72%</span><span>Fin : Juin 2025</span></div>
                <a href="#" class="btn-prog btn-prog-outline">En savoir plus <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div> -->

  <!-- <div class="projet-slide">
            <div class="projet-card-img">
              <div class="projet-img-wrap img-orange">
                <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=600&auto=format&fit=crop" alt="Micro-crédits" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
                <div class="projet-img-ph" style="display:none;flex-direction:column;align-items:center;">💼<span></span></div>
                <span class="status-badge" style="background:#FFF8E1;color:#F57F17;">En financement</span>
              </div>
              <div class="projet-body">
                <h6>Programme de micro-crédits 2025</h6>
                <p>Nouveau cycle de financement pour 30 jeunes femmes entrepreneures dans 3 régions.</p>
                <div class="progress-djama">
                  <div class="progress-djama-bar" style="width:45%;"></div>
                </div> -->
  <!-- <div class="projet-meta"><span>Financé : 45%</span><span>Objectif : 15M FCFA</span></div>
                <a href="#" class="btn-prog btn-prog-outline">En savoir plus <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>

          <div class="projet-slide">
            <div class="projet-card-img">
              <div class="projet-img-wrap img-teal">
                <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=600&auto=format&fit=crop" alt="Caravane médicale" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
                <div class="projet-img-ph" style="display:none;flex-direction:column;align-items:center;">🏥<span>Santé</span></div>
                <span class="status-badge" style="background:#E3F2FD;color:#1565C0;">Bientôt lancé</span>
              </div>
              <div class="projet-body"> -->
  <!-- <h6>Caravane médicale — Zone rurale Est</h6>
                <p>Campagne mobile de santé couvrant 8 villages : consultations, vaccinations, sensibilisation.</p>
                <div class="progress-djama">
                  <div class="progress-djama-bar" style="width:20%;"></div>
                </div>
                <div class="projet-meta"><span>Préparation : 20%</span><span>Sept. 2025</span></div>
                <a href="#" class="btn-prog btn-prog-outline">En savoir plus <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div> -->

  <!-- <div class="projet-slide">
            <div class="projet-card-img">
              <div class="projet-img-wrap img-green">
                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?w=600&auto=format&fit=crop" alt="Bourses 2025" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
                <div class="projet-img-ph" style="display:none;flex-direction:column;align-items:center;">🎓<span>Bourses 2025</span></div>
                <span class="status-badge" style="background:#E8F5E9;color:#2E7D32;">En cours</span>
              </div>
              <div class="projet-body">
                <h6>Bourses scolaires 2025–2026</h6>
                <p>Attribution de 150 nouvelles bourses pour la prochaine rentrée scolaire dans 4 régions.</p>
                <div class="progress-djama">
                  <div class="progress-djama-bar" style="width:60%;"></div>
                </div> -->
  <!-- <div class="projet-meta"><span>Sélection : 60%</span><span>Rentrée oct. 2025</span></div>
                <a href="#" class="btn-prog btn-prog-outline">En savoir plus <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>

          <div class="projet-slide">
            <div class="projet-card-img">
              <div class="projet-img-wrap img-purple">
                <img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=600&auto=format&fit=crop" alt="Coopérative agricole" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
                <div class="projet-img-ph" style="display:none;flex-direction:column;align-items:center;">🌾<span>Agriculture</span></div>
                <span class="status-badge" style="background:#FFF8E1;color:#F57F17;">En financement</span>
              </div> -->
  <!-- <div class="projet-body">
                <h6>Coopérative agricole féminine</h6>
                <p>Création d'une 5ème coopérative agricole entièrement gérée par des femmes dans la région de l'Est.</p>
                <div class="progress-djama">
                  <div class="progress-djama-bar" style="width:30%;"></div>
                </div>
                <div class="projet-meta"><span>Financé : 30%</span><span>Objectif : 8M FCFA</span></div>
                <a href="#" class="btn-prog btn-prog-outline">En savoir plus <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>

        </div>
      </div> -->

  <!-- Dots carrousel projets -->
  <!-- <div class="d-flex justify-content-center gap-2 mt-4" id="projetDots">
        <button class="slider-dot active" style="background:rgba(31,78,121,0.25);" onclick="goProjet(0)"></button>
        <button class="slider-dot" style="background:rgba(31,78,121,0.25);" onclick="goProjet(1)"></button>
        <button class="slider-dot" style="background:rgba(31,78,121,0.25);" onclick="goProjet(2)"></button>
      </div>
    </div>
  </section> -->
  <section class="section-pad" id="projets" style="background:var(--djama-light-bg);">
    <div class="container">

      <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-5">
        <div>
          <div class="section-eyebrow">Projets en cours</div>
          <h2 class="section-title mb-0">Initiatives <span>sur le terrain</span></h2>
        </div>

        <div class="d-flex align-items-center gap-3">
          <a href="" class="btn-prog btn-prog-outline">
            Voir tous les projets <i class="bi bi-arrow-right"></i>
          </a>

          <div class="d-flex gap-2">
            <button class="projets-nav-btn" id="projetPrev"><i class="bi bi-chevron-left"></i></button>
            <button class="projets-nav-btn" id="projetNext"><i class="bi bi-chevron-right"></i></button>
          </div>
        </div>
      </div>

      <div class="projets-carousel-wrap" id="projetsWrap">
        <div class="projets-carousel-track" id="projetsTrack">

          @foreach($projets as $item)
          <div class="projet-slide">

            <div class="projet-card-img">

              <div class="projet-img-wrap">

                {{-- IMAGE --}}
                @if($item->image)
                <img src="{{ asset('storage/'.$item->image) }}"
                  alt="{{ $item->title }}"
                  onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
                @endif

                {{-- FALLBACK --}}
                <div class="projet-img-ph"
                  style="{{ $item->image ? 'display:none;' : 'display:flex;' }} flex-direction:column;align-items:center;">
                  📌
                  <span>{{ $item->title }}</span>
                </div>

                {{-- STATUS --}}
                <span class="status-badge"
                  style="
                  @if($item->status == 'en_cours') background:#E8F5E9;color:#2E7D32;
                  @elseif($item->status == 'financement') background:#FFF8E1;color:#F57F17;
                  @elseif($item->status == 'bientot') background:#E3F2FD;color:#1565C0;
                  @endif
                ">
                  {{ ucfirst(str_replace('_',' ', $item->status)) }}
                </span>

              </div>

              {{-- BODY --}}
              <div class="projet-body">

                <h6>{{ $item->title }}</h6>

                <p>
                  {{ \Illuminate\Support\Str::limit($item->description, 120) }}
                </p>

                {{-- PROGRESS --}}
                <div class="progress-djama">
                  <div class="progress-djama-bar"
                    style="width:{{ $item->progress }}%;"></div>
                </div>

                <div class="projet-meta">
                  <span>{{ $item->progress }}%</span>

                  <span>
                    {{ $item->date_end ? $item->date_end->format('M Y') : '' }}
                  </span>
                </div>

                <a href="{{ route('projets.show', $item->slug) }}"
                  class="btn-prog btn-prog-outline">
                  En savoir plus <i class="bi bi-arrow-right"></i>
                </a>

              </div>

            </div>

          </div>
          @endforeach

        </div>
      </div>

      {{-- DOTS --}}
      <div class="d-flex justify-content-center gap-2 mt-4" id="projetDots">
        @foreach($projets as $key => $item)
        <button class="slider-dot {{ $key == 0 ? 'active' : '' }}"
          onclick="goProjet({{ $key }})">
        </button>
        @endforeach
      </div>

    </div>
  </section>

  <!-- ════ GALERIE FILLES — section immersive ════ -->
  <section class="galerie-section" id="galerie">
    <div class="container">
      <!-- Intro -->
      <div class="text-center mb-5">
        <div class="section-eyebrow justify-content-center" style="color:var(--djama-yellow);">
          <span style="background:var(--djama-yellow);"></span>Notre galerie
        </div>
        <div class="galerie-quote">
          Chaque visage est une <span>histoire de courage</span>,<br />chaque sourire est une <span>victoire</span> sur la pauvreté.
        </div>
        <p style="color:rgba(255,255,255,0.65);font-size:.95rem;max-width:560px;margin:0 auto;">
          Ces images témoignent de l'impact réel de la Fondation Djama Éducation sur le terrain, auprès des jeunes filles et de leurs familles.
        </p>
      </div>

      <!-- Grille mosaïque -->
      <div class="galerie-grid">

        <div class="gal-item gal-1">
          <img src="{{ asset('assets/images/13.jpeg') }}" alt="Élèves en classe"
            onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
          <div class="gal-item-ph img-blue" style="display:none;">👧<span>Élèves en classe</span></div>
          <div class="gal-overlay"></div>
          <div class="gal-label">Élèves en classe — Bondoukou</div>
        </div>

        <div class="gal-item gal-2">
          <img src="{{ asset('assets/images/18.jpeg') }}" alt="Remise de fournitures"
            onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
          <div class="gal-item-ph img-green" style="display:none;">📚<span>Fournitures</span></div>
          <div class="gal-overlay"></div>
          <div class="gal-label">Remise de fournitures 2024</div>
        </div>

        <div class="gal-item gal-3">
          <img src="{{ asset('assets/images/sous_prefecture_de_kouassia_niaguini.jpeg') }}" alt="Femmes entrepreneures"
            onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
          <div class="gal-item-ph img-orange" style="display:none;">🌱<span>Micro-projets</span></div>
          <div class="gal-overlay"></div>
          <div class="gal-label">SOUS Prefecture De Kouassia Niaguini </div>
        </div>
        <div class="gal-item gal-3">
          <img src="{{ asset('assets/images/elites.jpeg') }}" alt="Femmes entrepreneures"
            onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
          <div class="gal-item-ph img-orange" style="display:none;">🌱<span>Micro-projets</span></div>
          <div class="gal-overlay"></div>
          <div class="gal-label">Les Elites De Demain</div>
        </div>

        <div class="gal-item gal-4">
          <img src="{{ asset('assets/images/formateurs.jpeg') }}" alt="Campagne médicale"
            onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
          <div class="gal-item-ph img-teal" style="display:none;">🏥<span>Santé</span></div>
          <div class="gal-overlay"></div>
          <div class="gal-label">Les Enseignants</div>
        </div>






      </div>

      <!-- CTA galerie -->
      <div class="text-center mt-5">
        <a href="{{ route('galerie') }}" class="btn" style="background:rgba(255,255,255,0.10);border:1.5px solid rgba(255,255,255,0.25);color:#fff;font-family:var(--font-head);font-weight:600;border-radius:10px;padding:.7rem 1.8rem;font-size:.88rem;">
          <i class="bi bi-images me-2"></i>Voir toute la galerie
        </a>
      </div>

    </div>
  </section>

  <!-- ════ MÉDIATHÈQUE ════ -->
  <!-- <section class="media-section section-pad" id="mediatheque">
    <div class="container">
      <div class="row align-items-center mb-4">
        <div class="col-lg-6">
          <div class="section-eyebrow">Médiathèque</div>
          <h2 class="section-title">Photos, vidéos<br />&amp; <span>documents</span></h2>
        </div>
        <div class="col-lg-6 d-flex flex-wrap gap-2 justify-content-lg-end mt-3 mt-lg-0">
          <button class="media-tab-btn active" onclick="filterMedia(this,'all')">Tout voir</button>
          <button class="media-tab-btn" onclick="filterMedia(this,'photos')">Photos</button>
          <button class="media-tab-btn" onclick="filterMedia(this,'videos')">Vidéos</button> -->
          <!-- <button class="media-tab-btn" onclick="filterMedia(this,'docs')">Documents</button> -->
        <!-- </div>
      </div>
      <div class="row g-3" id="mediaGrid">
        <div class="col-6 col-md-4 col-lg-3 media-item" data-cat="photos">
          <div class="media-card">
            <div class="media-thumb" style="background:#E3F2FD;">📸</div>
            <div class="media-info">
              <h6>Rentrée scolaire 2024</h6><span>Photo · Jan 2024</span>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 media-item" data-cat="videos">
          <div class="media-card">
            <div class="media-thumb" style="background:#FCE4EC;">🎥</div>
            <div class="media-info">
              <h6>Témoignage d'Aminata</h6><span>Vidéo · 4 min</span>
            </div>
          </div>
        </div> -->
        <!-- <div class="col-6 col-md-4 col-lg-3 media-item" data-cat="docs">
          <div class="media-card">
            <div class="media-thumb" style="background:#FFF8E1;">📄</div>
            <div class="media-info">
              <h6>Rapport annuel 2023</h6><span>PDF · 2.4 Mo</span>
            </div>
          </div>
        </div> -->
        <!-- <div class="col-6 col-md-4 col-lg-3 media-item" data-cat="photos">
          <div class="media-card">
            <div class="media-thumb" style="background:#E8F5E9;">📸</div>
            <div class="media-info">
              <h6>Remise de fournitures</h6><span>Photo · Mars 2024</span>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 media-item" data-cat="videos">
          <div class="media-card">
            <div class="media-thumb" style="background:#EDE7F6;">🎥</div>
            <div class="media-info">
              <h6>Campagne médicale 2023</h6><span>Vidéo · 7 min</span>
            </div>
          </div>
        </div> -->
        <!--  <div class="col-6 col-md-4 col-lg-3 media-item" data-cat="docs">
          <div class="media-card">
            <div class="media-thumb" style="background:#E1F5FE;">📋</div>
            <div class="media-info">
              <h6>Brochure de présentation</h6><span>PDF · 1.1 Mo</span>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 media-item" data-cat="photos">
          <div class="media-card">
            <div class="media-thumb" style="background:#FCE4EC;">📸</div>
            <div class="media-info">
              <h6>Inauguration salle Bondoukou</h6><span>Photo · Juin 2023</span>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-4 col-lg-3 media-item" data-cat="docs">
          <div class="media-card">
            <div class="media-thumb" style="background:#FFF8E1;">📑</div>
            <div class="media-info">
              <h6>Statuts de la fondation</h6><span>PDF · 0.8 Mo</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ════ TÉMOIGNAGES ════ -->
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
        <!-- ════ ACTUALITÉS ════ -->
        <section class="section-pad" id="actualites" style="background:var(--djama-light-bg);">
          <div class="container">
            <div class="row align-items-center mb-5">
              <div class="col-lg-7">
                <div class="section-eyebrow">Actualités</div>
                <h2 class="section-title mb-0">Restez informés<br />de nos <span>actions</span></h2>
              </div>
              <div class="col-lg-5 text-lg-end mt-3 mt-lg-0"><a href="#" style="font-family:var(--font-head);font-weight:600;color:var(--djama-blue);text-decoration:none;font-size:.88rem;">Toutes les actualités <i class="bi bi-arrow-right ms-1"></i></a></div>
            </div>
            <div class="row g-4">
              <div class="col-md-6 col-lg-4">
                <div class="actu-card">
                  <div class="actu-img img-blue"><img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=600&auto=format&fit=crop" alt="Rentrée" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
                    <div class="actu-img-ph" style="display:none;flex-direction:column;align-items:center;">📚<span>Éducation</span></div><span class="actu-cat-badge" style="background:#E3F2FD;color:#1565C0;">Éducation</span>
                  </div>
                  <div class="actu-body">
                    <h6>Rentrée 2024 : 120 nouvelles bourses attribuées</h6>
                    <p>La fondation a remis des bourses scolaires à 120 jeunes filles lors de la cérémonie de rentrée à Bondoukou.</p><a href="#" class="btn-prog btn-prog-outline mt-auto">Lire l'article <i class="bi bi-arrow-right"></i></a>
                  </div>
                  <div class="actu-footer-bar"><span class="actu-date-txt"><i class="bi bi-calendar3"></i>15 Oct. 2024</span><span style="font-size:.75rem;color:#9aacbe;">5 min</span></div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="actu-card">
                  <div class="actu-img img-teal"><img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=600&auto=format&fit=crop" alt="Caravane" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
                    <div class="actu-img-ph" style="display:none;flex-direction:column;align-items:center;">🏥<span>Santé</span></div><span class="actu-cat-badge" style="background:#E8F5E9;color:#2E7D32;">Santé</span>
                  </div>
                  <div class="actu-body">
                    <h6>Caravane médicale : plus de 400 consultations gratuites</h6>
                    <p>Notre caravane a sillonné 5 villages de la région Est pour offrir des soins gratuits aux populations.</p><a href="#" class="btn-prog btn-prog-outline mt-auto">Lire l'article <i class="bi bi-arrow-right"></i></a>
                  </div>
                  <div class="actu-footer-bar"><span class="actu-date-txt"><i class="bi bi-calendar3"></i>3 Août 2024</span><span style="font-size:.75rem;color:#9aacbe;">4 min</span></div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="actu-card">
                  <div class="actu-img img-orange"><img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=600&auto=format&fit=crop" alt="Micro-crédits" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
                    <div class="actu-img-ph" style="display:none;flex-direction:column;align-items:center;">💼<span>Économie</span></div><span class="actu-cat-badge" style="background:#FFF8E1;color:#F57F17;">Économie</span>
                  </div>
                  <div class="actu-body">
                    <h6>Remise de micro-crédits à 15 jeunes entrepreneures</h6>
                    <p>15 jeunes femmes ont reçu leur financement pour démarrer ou développer leur activité génératrice de revenus.</p><a href="#" class="btn-prog btn-prog-outline mt-auto">Lire l'article <i class="bi bi-arrow-right"></i></a>
                  </div>
                  <div class="actu-footer-bar"><span class="actu-date-txt"><i class="bi bi-calendar3"></i>20 Juin 2024</span><span style="font-size:.75rem;color:#9aacbe;">3 min</span></div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- ════ AGIR & SOUTENIR ════ -->
        <section class="section-pad" id="agir">
          <div class="container">
            <div class="text-center mb-5">
              <div class="section-eyebrow justify-content-center">Agir & Soutenir</div>
              <h2 class="section-title">Choisissez votre<br /><span>façon d'aider</span></h2>
            </div>
            <div class="row g-4">
              <div class="col-sm-6 col-lg-3">
                <div class="agir-card">
                  <div class="agir-icon" style="background:#FFF3E0;">💰</div>
                  <h5>Faire un don</h5>
                  <p>Votre contribution finance directement la scolarité, les fournitures et les soins des bénéficiaires.</p><a href="#" class="btn-agir" style="background:var(--djama-orange);color:#fff;">Faire un don</a>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="agir-card">
                  <div class="agir-icon" style="background:#E8F5E9;">👧</div>
                  <h5>Parrainer une élève</h5>
                  <p>Prenez en charge une jeune fille et suivez son parcours scolaire personnellement tout au long de l'année.</p><a href="#" class="btn-agir" style="background:var(--djama-green);color:#fff;">Je parraine</a>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="agir-card">
                  <div class="agir-icon" style="background:#E3F2FD;">🤝</div>
                  <h5>Devenir bénévole</h5>
                  <p>Offrez votre temps et vos compétences : enseignement, conseil, logistique ou terrain.</p><a href="#" class="btn-agir" style="background:var(--djama-blue);color:#fff;">Je m'engage</a>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="agir-card">
                  <div class="agir-icon" style="background:#EDE7F6;">🏢</div>
                  <h5>Partenariat</h5>
                  <p>Associez votre entreprise ou ONG à notre mission et financez un programme complet.</p><a href="#contact" class="btn-agir" style="border:1.5px solid var(--djama-blue);color:var(--djama-blue);">Nous contacter</a>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- ════ ÉQUIPE ════ -->
        <section class="section-pad" id="equipe" style="background:var(--djama-light-bg);">
          <div class="container">
            <div class="text-center mb-5">
              <div class="section-eyebrow justify-content-center">Notre équipe</div>
              <h2 class="section-title">Les femmes et hommes qui <span>portent la mission</span></h2>
            </div>
            <div class="row g-4 justify-content-center">
              <div class="col-6 col-md-4 col-lg-3">
                <div class="equipe-card">
                  <div class="equipe-avatar" style="background:#E3F2FD;color:var(--djama-blue);">OA</div>
                  <h6>Mlle Ouattara Abran Fatoumata</h6><span>Présidente</span>
                </div>
              </div>
              <div class="col-6 col-md-4 col-lg-3">
                <div class="equipe-card">
                  <div class="equipe-avatar" style="background:#E8F5E9;color:var(--djama-green);">OM</div>
                  <h6>Mlle Ouattara Affoua Mandinan</h6><span>Vice-Présidente</span>
                </div>
              </div>
              <div class="col-6 col-md-4 col-lg-3">
                <div class="equipe-card">
                  <div class="equipe-avatar" style="background:#FFF8E1;color:#F57F17;">OY</div>
                  <h6>Mlle Ouattara Yah Mariame</h6><span>Secrétaire Générale</span>
                </div>
              </div>
              <div class="col-6 col-md-4 col-lg-3">
                <div class="equipe-card">
                  <div class="equipe-avatar" style="background:#EDE7F6;color:#4527A0;">AA</div>
                  <h6>M. Adaman Amara</h6><span>Trésorier Général</span>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- ════ CTA BANDE ════ -->
        <section class="cta-bande section-pad-sm">
          <div class="container text-center position-relative">
            <h2 class="mb-2">Ensemble, construisons un avenir meilleur</h2>
            <p class="mb-4">Votre soutien, quelle que soit sa forme, change concrètement des vies.</p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
              <a href="#agir" class="btn-cta-white btn"><i class="bi bi-heart-fill me-2" style="color:var(--djama-orange);"></i>Faire un don maintenant</a>
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
                <p style="color:#4a5568;font-size:.92rem;line-height:1.75;margin-bottom:1.5rem;">Vous souhaitez faire un don, devenir partenaire ou simplement en savoir plus ? Notre équipe vous répond.</p>
                <div class="d-flex flex-column gap-3">
                  <div class="d-flex align-items-start gap-3">
                    <div style="width:38px;height:38px;border-radius:10px;background:#E3F2FD;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="bi bi-geo-alt-fill" style="color:var(--djama-blue);"></i></div>
                    <div>
                      <div style="font-family:var(--font-head);font-weight:700;font-size:.88rem;color:var(--djama-blue);">Siège social</div>
                      <div style="font-size:.83rem;color:#5a6a7a;">Riviera 2 les Jardins, en face de la Mosquée<br />Abidjan Cocody — 23 B.P 1990 Abidjan 23</div>
                    </div>
                  </div>
                  <div class="d-flex align-items-start gap-3">
                    <div style="width:38px;height:38px;border-radius:10px;background:#E8F5E9;display:flex;align-items:center;justify-content:center;flex-shrink:0;"><i class="bi bi-calendar-check-fill" style="color:var(--djama-green);"></i></div>
                    <div>
                      <div style="font-family:var(--font-head);font-weight:700;font-size:.88rem;color:var(--djama-blue);">Fondée le</div>
                      <div style="font-size:.83rem;color:#5a6a7a;">30 janvier 2013</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-7">
                <div style="background:#fff;border:1px solid rgba(31,78,121,0.10);border-radius:16px;padding:2rem;">
                  <div class="row g-3">
                    <div class="col-md-6"><label style="font-family:var(--font-head);font-weight:600;font-size:.82rem;color:var(--djama-blue);margin-bottom:6px;display:block;">Nom complet</label><input type="text" class="form-control" placeholder="Votre nom" style="border-radius:10px;border-color:rgba(31,78,121,0.15);font-size:.88rem;" /></div>
                    <div class="col-md-6"><label style="font-family:var(--font-head);font-weight:600;font-size:.82rem;color:var(--djama-blue);margin-bottom:6px;display:block;">Email</label><input type="email" class="form-control" placeholder="votre@email.com" style="border-radius:10px;border-color:rgba(31,78,121,0.15);font-size:.88rem;" /></div>
                    <div class="col-12"><label style="font-family:var(--font-head);font-weight:600;font-size:.82rem;color:var(--djama-blue);margin-bottom:6px;display:block;">Objet</label><select class="form-select" style="border-radius:10px;border-color:rgba(31,78,121,0.15);font-size:.88rem;">
                        <option>Je souhaite faire un don</option>
                        <option>Je veux parrainer une élève</option>
                        <option>Je veux devenir bénévole</option>
                        <option>Proposition de partenariat</option>
                        <option>Autre demande</option>
                      </select></div>
                    <div class="col-12"><label style="font-family:var(--font-head);font-weight:600;font-size:.82rem;color:var(--djama-blue);margin-bottom:6px;display:block;">Message</label><textarea class="form-control" rows="4" placeholder="Votre message..." style="border-radius:10px;border-color:rgba(31,78,121,0.15);font-size:.88rem;resize:none;"></textarea></div>
                    <div class="col-12"><button class="btn btn-don w-100 py-3" style="font-size:.92rem;"><i class="bi bi-send-fill me-2"></i>Envoyer le message</button></div>
                  </div>
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
                  <img src="{{ asset('assets/images/logo.jpeg') }}" class="navbar-brand-logo" alt="Logo">
                  <div class="footer-brand">Fondation Djama Éducation</div>
                </div>
                <div class="footer-slogan">« Offrir l'éducation, construire l'avenir »</div>
                <p style="font-size:.82rem;color:rgba(255,255,255,0.55);margin-top:1rem;line-height:1.7;">Fondée en 2013, la Fondation Djama œuvre pour l'éducation, l'autonomie et la santé des populations vulnérables de Côte d'Ivoire.</p>
                <div class="d-flex gap-2 mt-3">
                  <a href="#" class="social-btn"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="social-btn"><i class="bi bi-instagram"></i></a>
                  <a href="#" class="social-btn"><i class="bi bi-twitter-x"></i></a>
                  <a href="#" class="social-btn"><i class="bi bi-linkedin"></i></a>
                  <a href="#" class="social-btn"><i class="bi bi-youtube"></i></a>
                </div>
              </div>
              <div class="col-6 col-lg-2">
                <div class="footer-title">Navigation</div>
                <a class="footer-link" href="#">Accueil</a><a class="footer-link" href="#apropos">À propos</a>
                <a class="footer-link" href="#programmes">Programmes</a><a class="footer-link" href="#realisations">Réalisations</a>
                <a class="footer-link" href="#projets">Projets</a>
              </div>
              <div class="col-6 col-lg-2">
                <div class="footer-title">Ressources</div>
                <a class="footer-link" href="#galerie">Galerie</a><a class="footer-link" href="#mediatheque">Médiathèque</a>
                <a class="footer-link" href="#actualites">Actualités</a><a class="footer-link" href="#temoignages">Témoignages</a>
                <a class="footer-link" href="#contact">Contact</a>
              </div>
              <div class="col-lg-4">
                <div class="footer-title">Agir maintenant</div>
                <p style="font-size:.82rem;color:rgba(255,255,255,0.55);margin-bottom:1rem;line-height:1.7;">Rejoignez notre communauté et recevez nos actualités terrain.</p>
                <div class="input-group" style="max-width:320px;"><input type="email" class="form-control" placeholder="Votre email" style="border-radius:10px 0 0 10px;background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);color:#fff;font-size:.85rem;" /><button class="btn btn-don" style="border-radius:0 10px 10px 0;">S'inscrire</button></div>
                <div class="mt-3"><a href="#agir" class="btn btn-don" style="max-width:320px;width:100%;display:block;text-align:center;"><i class="bi bi-heart-fill me-2"></i>Faire un don</a></div>
              </div>
            </div>
            <hr class="footer-divider my-4" />
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
              <div class="footer-copy">© 2025 Fondation Djama Éducation. Tous droits réservés. · Siège : Abidjan Cocody, Riviera 2</div>
              <div class="d-flex gap-3"><a href="#" style="font-size:.75rem;color:rgba(255,255,255,0.35);text-decoration:none;">Mentions légales</a><a href="#" style="font-size:.75rem;color:rgba(255,255,255,0.35);text-decoration:none;">Politique de confidentialité</a></div>
            </div>
          </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
          /* ── NAVBAR ── */
          const nav = document.getElementById('mainNav');
          window.addEventListener('scroll', () => nav.classList.toggle('scrolled', window.scrollY > 30));
          // STYLE LINK NAV

          /* ── HERO SLIDER ── */
          const SLIDES_COUNT = 4,
            AUTO_DELAY = 5500;
          let current = 0;
          const track = document.getElementById('sliderTrack');
          const dots = document.querySelectorAll('.slider-dot');
          const progress = document.getElementById('sliderProgress');
          let timer = null;

          function goTo(idx) {
            document.getElementById('slide-' + current).classList.remove('active');
            dots[current].classList.remove('active');
            current = (idx + SLIDES_COUNT) % SLIDES_COUNT;
            document.getElementById('slide-' + current).classList.add('active');
            dots[current].classList.add('active');
            track.style.transform = 'translateX(-' + (current * 100) + '%)';
            resetProgress();
          }

          function resetProgress() {
            clearTimeout(timer);
            progress.style.transition = 'none';
            progress.style.width = '0%';
            setTimeout(() => {
              progress.style.transition = 'width ' + AUTO_DELAY + 'ms linear';
              progress.style.width = '100%';
            }, 30);
            timer = setTimeout(() => goTo(current + 1), AUTO_DELAY);
          }
          document.getElementById('sliderNext').addEventListener('click', () => goTo(current + 1));
          document.getElementById('sliderPrev').addEventListener('click', () => goTo(current - 1));
          dots.forEach((d, i) => d.addEventListener('click', () => goTo(i)));
          let tx = 0;
          const hs = document.getElementById('heroSlider');
          hs.addEventListener('touchstart', e => {
            tx = e.touches[0].clientX;
          }, {
            passive: true
          });
          hs.addEventListener('touchend', e => {
            const d = tx - e.changedTouches[0].clientX;
            if (Math.abs(d) > 50) d > 0 ? goTo(current + 1) : goTo(current - 1);
          });
          document.addEventListener('keydown', e => {
            if (e.key === 'ArrowRight') goTo(current + 1);
            if (e.key === 'ArrowLeft') goTo(current - 1);
          });
          resetProgress();

          /* ── PROJETS CARROUSEL ── */
          let projetIdx = 0;
          const pTrack = document.getElementById('projetsTrack');
          const pDots = document.querySelectorAll('#projetDots .slider-dot');

          function getProjetVisible() {
            const w = document.getElementById('projetsWrap').offsetWidth;
            if (w < 640) return 1;
            if (w < 992) return 2;
            return 3;
          }

          function getProjetMax() {
            return Math.max(0, 5 - getProjetVisible());
          }

          function goProjet(idx) {
            const max = getProjetMax();
            projetIdx = Math.max(0, Math.min(idx, max));
            const itemW = pTrack.querySelector('.projet-slide').offsetWidth + 24;
            pTrack.style.transform = 'translateX(-' + (projetIdx * itemW) + 'px)';
            pDots.forEach((d, i) => d.classList.toggle('active', i === Math.floor(projetIdx / getProjetVisible())));
            document.getElementById('projetPrev').disabled = projetIdx <= 0;
            document.getElementById('projetNext').disabled = projetIdx >= max;
          }
          document.getElementById('projetNext').addEventListener('click', () => goProjet(projetIdx + 1));
          document.getElementById('projetPrev').addEventListener('click', () => goProjet(projetIdx - 1));
          goProjet(0);
          window.addEventListener('resize', () => goProjet(projetIdx));

          /* ── MEDIA FILTER ── */
          function filterMedia(btn, cat) {
            document.querySelectorAll('.media-tab-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            document.querySelectorAll('.media-item').forEach(item => {
              item.style.display = (cat === 'all' || item.dataset.cat === cat) ? '' : 'none';
            });
          }
        </script>
</body>

</html>