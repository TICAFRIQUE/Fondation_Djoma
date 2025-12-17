@extends('frontend.layouts.base')


@section('title', 'Recherche de domaine')

@section('content')
    <section class="domain-section">
        <div class="domain-card">
            <h3>Recherche de domaine</h3>

            <form id="domainSearchForm" action="#" method="POST">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6 col-12 col-sm-12">
                        <input type="text" class="form-control" name="domain_name" placeholder="Entrez votre nom de domaine"
                            required>
                    </div>

                    <div class="mb-3 col-md-6 col-12 col-sm-12">
                        <select name="tld" class="form-select" required>
                            <option value="">Choisir l’extension</option>
                            <option value=".ci">.ci</option>
                            <option value=".com">.com</option>
                            <option value=".net">.net</option>
                            <option value=".org">.org</option>
                            <option value=".info">.info</option>
                            <option value=".tv">.tv</option>
                            <option value=".co">.co</option>
                            <option value=".biz">.biz</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Vérifier disponibilité</button>
            </form>

            <div id="domainSearchResult" class="domain-info-box mt-3"></div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        document.getElementById('domainSearchForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const name = this.domain_name.value.trim();
            const tld = this.tld.value;
            const resultBox = document.getElementById('domainSearchResult');

            if (name && tld) {
                // Simulation check (à remplacer par Ajax Laravel)
                const available = Math.random() > 0.5;
                resultBox.style.display = 'block';
                resultBox.className = 'domain-info-box ' + (available ? 'success' : 'error');
                resultBox.textContent = available ? `Le domaine ${name}${tld} est disponible !` :
                    `Le domaine ${name}${tld} est déjà pris.`;
            } else {
                resultBox.style.display = 'block';
                resultBox.className = 'domain-info-box warning';
                resultBox.textContent = 'Veuillez remplir tous les champs.';
            }
        });
    </script>
@endpush
