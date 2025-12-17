@extends('frontend.layouts.base')

@section('title', 'Inscrivez-vous')

@section('content')
    <section class="section bg-light py-5">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h3>Inscrivez-vous pour votre <span>hébergement cloud</span></h3>
                <p class="text-muted">Remplissez le formulaire étape par étape pour choisir votre plan.</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-sm border-0 p-4">
                        <form id="signupForm" method="POST" action="{{ route('commande.service.store') }}">
                            @csrf

                            <!-- STEP 1 : Plan -->
                            <section class="form-step form-step-active">
                                <h5>Choisissez votre plan</h5>
                                <div class="mb-3">
                                    <select name="hebergement" class="form-select" required>
                                        <option value="" disabled selected>Sélectionnez un plan</option>
                                        <option value="Personnel Cloud">Personnel Cloud - 5.000 CFA/mois</option>
                                        <option value="Business Cloud">Business Cloud - 7.000 CFA/mois</option>
                                        <option value="Professionnal Cloud">Professionnal Cloud - 10.000 CFA/mois</option>
                                    </select>
                                </div>
                                <div class="text-end">
                                    <button type="button" class="btn btn-primary btn-next">Suivant</button>
                                </div>
                            </section>

                            <!-- STEP 2 : Informations client -->
                            <section class="form-step">
                                <h5>Vos informations</h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Statut</label>
                                        <select name="statut" class="form-select" required>
                                            <option value="particulier" selected>Particulier</option>
                                            <option value="entreprise">Entreprise</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 particulier">
                                        <label class="form-label">Nom & Prénoms</label>
                                        <input type="text" name="nomprenoms" class="form-control" required>
                                    </div>

                                    <div class="col-md-6 entreprise d-none">
                                        <label class="form-label">Entreprise</label>
                                        <input type="text" name="societe" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Téléphone</label>
                                        <input type="text" name="tel" class="form-control" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="emailc" class="form-control" required>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-light btn-prev">Retour</button>
                                    <button type="button" class="btn btn-primary btn-next">Suivant</button>
                                </div>
                            </section>

                            <!-- STEP 3 : Informations complémentaires -->
                            <section class="form-step">
                                <h5>Informations complémentaires</h5>
                                <div class="mb-3">
                                    <textarea name="complementaire" class="form-control" rows="4" placeholder="Ex: Besoins spécifiques, questions..."></textarea>
                                </div>
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" required>
                                    <label class="form-check-label">J’accepte les conditions</label>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-light btn-prev">Retour</button>
                                    <button type="submit" class="btn btn-success">Envoyer</button>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('signupForm');
            const steps = Array.from(document.querySelectorAll('.form-step'));
            const nextBtns = Array.from(document.querySelectorAll('.btn-next'));
            const prevBtns = Array.from(document.querySelectorAll('.btn-prev'));
            const statutSelect = document.querySelector('select[name="statut"]');
            const particulierFields = document.querySelectorAll('.particulier');
            const entrepriseFields = document.querySelectorAll('.entreprise');

            let currentStep = 0;

            function showStep(index) {
                steps.forEach((step, i) => {
                    step.classList.remove('form-step-active');
                    step.style.display = 'none';
                    step.style.opacity = 0;
                    step.style.transform = 'translateX(50px)';
                    step.style.transition = 'all 0.4s ease';
                });
                steps[index].classList.add('form-step-active');
                steps[index].style.display = 'block';
                setTimeout(() => {
                    steps[index].style.opacity = 1;
                    steps[index].style.transform = 'translateX(0)';
                }, 50);
            }

            function validateStep(step) {
                const inputs = Array.from(step.querySelectorAll('input, select, textarea'));
                for (let input of inputs) {
                    if (input.hasAttribute('required') && !input.value.trim()) {
                        input.focus();
                        input.classList.add('is-invalid');
                        return false;
                    } else {
                        input.classList.remove('is-invalid');
                    }
                }
                return true;
            }

            nextBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    if (validateStep(steps[currentStep])) {
                        if (currentStep < steps.length - 1) {
                            currentStep++;
                            showStep(currentStep);
                        }
                    }
                });
            });

            prevBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    if (currentStep > 0) {
                        currentStep--;
                        showStep(currentStep);
                    }
                });
            });

            statutSelect.addEventListener('change', () => {
                if (statutSelect.value === 'particulier') {
                    particulierFields.forEach(f => f.classList.remove('d-none'));
                    entrepriseFields.forEach(f => f.classList.add('d-none'));
                } else {
                    particulierFields.forEach(f => f.classList.add('d-none'));
                    entrepriseFields.forEach(f => f.classList.remove('d-none'));
                }
            });

            // Initialisation
            toggleStatut();
            showStep(currentStep);

            function toggleStatut() {
                if (statutSelect.value === 'particulier') {
                    particulierFields.forEach(f => f.classList.remove('d-none'));
                    entrepriseFields.forEach(f => f.classList.add('d-none'));
                } else {
                    particulierFields.forEach(f => f.classList.add('d-none'));
                    entrepriseFields.forEach(f => f.classList.remove('d-none'));
                }
            }

            // Laisse le submit fonctionner normalement
            form.addEventListener('submit', function(e) {
                if (!validateStep(steps[currentStep])) {
                    e.preventDefault(); // bloque submit si champs requis manquants
                }
            });
        });F
    </script>
@endsection
