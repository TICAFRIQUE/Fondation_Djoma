@extends('frontend.layouts.base')

@section('title', 'Commande Service Web')

@section('content')

    <div class="container py-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif


        {{-- Header doux --}}
        <div class="text-center mb-5">
            <h2 class="fw-bold">Commande de service web</h2>
            <p class="text-muted">Quelques étapes simples pour traiter votre demande</p>

            {{-- Progress bar --}}
            <div class="progress step-progress mx-auto mt-4">
                <div class="progress-bar" id="progressBar" role="progressbar" style="width: 25%"></div>
            </div>
        </div>

        {{-- Formulaire multi-étapes UX --}}
        <form action="{{ route('commande.service.store') }}" method="POST" class="card border-0 shadow-sm ux-form">
            @csrf
            <div class="card-body p-4 p-lg-5">

                {{-- STEP 1 --}}
                <section class="ux-step active">
                    <h4 class="mb-3">Votre identité</h4>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Statut</label>
                            <select name="statut" id="statut" class="form-select">
                                <option value="particulier" selected>Particulier</option>
                                <option value="entreprise">Entreprise</option>
                            </select>
                        </div>

                        <div class="col-md-6 particulier">
                            <label class="form-label">Nom & Prénoms</label>
                            <input type="text" name="nomprenoms" class="form-control">
                        </div>

                        <div class="col-md-6 particulier">
                            <label class="form-label">Fonction</label>
                            <input type="text" name="fonction" class="form-control">
                        </div>

                        <div class="col-md-6 entreprise d-none">
                            <label class="form-label">Entreprise</label>
                            <input type="text" name="societe" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Téléphone</label>
                            <input type="text" name="tel" class="form-control">
                        </div>
                    </div>

                    <div class="text-end mt-4">
                        <button type="button" class="btn btn-primary next-step">Continuer</button>
                    </div>
                </section>

                {{-- STEP 2 --}}
                <section class="ux-step">
                    <h4 class="mb-3">Service souhaité</h4>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Type de service</label>
                            <select name="service" id="service" class="form-select">
                                <option value="domaine">Nom de domaine</option>
                                <option value="hosting">Hébergement</option>
                                <option value="ssl">Certificat SSL</option>
                                <option value="autre">Autre</option>
                            </select>
                        </div>

                        <div class="col-md-6 domaine">
                            <label class="form-label">Nom de domaine</label>
                            <input type="text" name="domaine" class="form-control">
                        </div>

                        <div class="col-md-6 hosting d-none">
                            <label class="form-label">Formule d’hébergement</label>
                            <select name="hebergement" class="form-select">
                                <option>Présence</option>
                                <option>Confort</option>
                                <option>Premium</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-light prev-step">Retour</button>
                        <button type="button" class="btn btn-primary next-step">Continuer</button>
                    </div>
                </section>

                {{-- STEP 3 --}}
                <section class="ux-step">
                    <h4 class="mb-3">Contact</h4>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="emailc" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Téléphone</label>
                            <input type="text" name="telc" class="form-control">
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-light prev-step">Retour</button>
                        <button type="button" class="btn btn-primary next-step">Continuer</button>
                    </div>
                </section>

                {{-- STEP 4 --}}
                <section class="ux-step">
                    <h4 class="mb-3">Finalisation</h4>

                    <textarea name="complementaire" class="form-control mb-3" rows="4" placeholder="Informations complémentaires"></textarea>

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" required>
                        <label class="form-check-label">J’accepte les conditions</label>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-light prev-step">Retour</button>
                        <button class="btn btn-success px-4">Envoyer</button>
                    </div>
                </section>

            </div>
        </form>
        ```

    </div>
@endsection
