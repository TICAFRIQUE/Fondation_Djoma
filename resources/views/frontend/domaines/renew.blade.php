@extends('frontend.layouts.base')


@section('title', 'Renouvellement de domaine')

@section('content')
    <section class="domain-section">
        <div class="domain-card">
            <h3>Renouvellement de domaine</h3>

            <form id="domainRenewForm" action="#" method="POST">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-12 col-sm-12 col-lg-12">
                        <input type="text" class="form-control" name="domain_name" placeholder="Nom de domaine à renouveler"
                            required>
                    </div>

                    <div class="mb-3 col-md-12 col-sm-12 col-lg-12">
                        <select name="period" class="form-select" required>
                            <option value="">Durée de renouvellement</option>
                            <option value="1">1 an</option>
                            <option value="2">2 ans</option>
                            <option value="3">3 ans</option>
                            <option value="5">5 ans</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-warning">Renouveler</button>
            </form>

            <div id="domainRenewResult" class="domain-info-box mt-3"></div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.getElementById('domainRenewForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const name = this.domain_name.value.trim();
            const period = this.period.value;
            const resultBox = document.getElementById('domainRenewResult');

            if (name && period) {
                // Simulation (à remplacer par Ajax Laravel)
                resultBox.style.display = 'block';
                resultBox.className = 'domain-info-box success';
                resultBox.textContent = `Le domaine ${name} a été renouvelé pour ${period} an(s).`;
            } else {
                resultBox.style.display = 'block';
                resultBox.className = 'domain-info-box warning';
                resultBox.textContent = 'Veuillez remplir tous les champs.';
            }
        });
    </script>
@endpush
