@extends('backend.layouts.master')

@section('title', 'Toutes les commandes')

@section('content')
    <div class="container-fluid py-4">

        {{-- Dashboard cards --}}
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-0 bg-danger text-white p-3">
                    <div class="d-flex justify-content-between align-items-center ">
                        <div>
                            <h5>Total Commandes</h5>
                            <h3>{{ $commandes->total() }}</h3>
                        </div>
                        <i class="fas fa-shopping-cart fa-2x"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-0 bg-success text-white p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Domaines</h5>
                            <h3>{{ $commandes->where('service', 'domaine')->count() }}</h3>
                        </div>
                        <i class="fas fa-globe fa-2x"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-0 bg-warning text-dark p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Hébergements</h5>
                            <h3>{{ $commandes->where('service', 'hosting')->count() }}</h3>
                        </div>
                        <i class="fas fa-server fa-2x"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm border-0 bg-info text-white p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5>SSL / Autres</h5>
                            <h3>{{ $commandes->whereIn('service', ['ssl', 'autre'])->count() }}</h3>
                        </div>
                        <i class="fas fa-certificate fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Table commandes --}}
        @if ($commandes->count())
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Liste des commandes</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Statut</th>
                                <th>Nom / Société</th>
                                <th>Service</th>
                                <th>Domaine / Hébergement</th>
                                <th>Contact</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($commandes as $commande)
                                <tr>
                                    <td>{{ $commande->id }}</td>
                                    <td>
                                        <span
                                            class="badge {{ $commande->statut === 'particulier' ? 'bg-primary' : 'bg-secondary' }}">
                                            {{ ucfirst($commande->statut) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($commande->statut === 'particulier')
                                            {{ $commande->nomprenoms }}
                                        @else
                                            {{ $commande->societe }}
                                        @endif
                                    </td>
                                    <td>
                                        <span
                                            class="badge
                                        {{ $commande->service === 'domaine' ? 'bg-success' : '' }}
                                        {{ $commande->service === 'hosting' ? 'bg-warning text-dark' : '' }}
                                        {{ $commande->service === 'ssl' ? 'bg-info' : '' }}
                                        {{ $commande->service === 'autre' ? 'bg-secondary' : '' }}">
                                            {{ ucfirst($commande->service) }}
                                        </span>
                                    </td>
                                    <td>
                                        {{ $commande->domaine ?? ($commande->hebergement ?? '-') }}
                                    </td>
                                    <td>
                                        {{ $commande->emailc }}<br>
                                        {{ $commande->telc }}
                                    </td>
                                    <td>{{ $commande->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    {{ $commandes->links() }}
                </div>
            </div>
        @else
            <div class="alert alert-info">
                Aucune commande trouvée.
            </div>
        @endif
    </div>
@endsection
