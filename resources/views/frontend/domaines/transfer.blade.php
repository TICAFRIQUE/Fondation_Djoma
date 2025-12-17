@extends('frontend.layouts.base')

@section('title', 'Transfert de domaine')

@section('content')
   <section class="domain-section">
    <div class="domain-card">
        <h3>Transfert de domaine</h3>

        <form id="domainTransferForm" action="#" method="POST">
            @csrf

               <div class="row">
                 <div class="col-md-6 col-12 mb-3">
                    <input type="text" class="form-control" name="domain_name" placeholder="Nom de domaine à transférer" required>
                </div>

                <div class="col-md-6 col-12 mb-3">
                    <input type="text" class="form-control" name="auth_code" placeholder="Code d'autorisation (Auth Code)" required>
                </div>
               </div>


            <button type="submit" class="btn btn-success">Demander transfert</button>
        </form>

        <div id="domainTransferResult" class="domain-info-box mt-3"></div>
    </div>
</section>

@endsection

@push('scripts')
    <script>
        document.getElementById('domainTransferForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const name = this.domain_name.value.trim();
            const code = this.auth_code.value.trim();
            const resultBox = document.getElementById('domainTransferResult');

            if (name && code) {
                // Simulation (à remplacer par Ajax Laravel)
                resultBox.style.display = 'block';
                resultBox.className = 'domain-info-box success';
                resultBox.textContent = `La demande de transfert pour ${name} a été envoyée avec succès.`;
            } else {
                resultBox.style.display = 'block';
                resultBox.className = 'domain-info-box warning';
                resultBox.textContent = 'Veuillez remplir tous les champs.';
            }
        });
    </script>
@endpush
