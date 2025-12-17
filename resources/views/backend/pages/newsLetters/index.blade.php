@extends('backend.layouts.master')

@section('title', 'Newsletter')

@section('content')

    <div class="container-fluid">

        {{-- ================= PAGE HEADER ================= --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="mb-1">Newsletter</h3>
                <p class="text-muted mb-0">
                    Gestion des abonnés à la newsletter
                </p>
            </div>
            <div>
    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#sendNewsletterModal">
        <i class="fas fa-paper-plane me-1"></i> Envoyer une newsletter
    </button>

    <a href="#" class="btn btn-outline-primary btn-sm">
        <i class="fas fa-download me-1"></i> Exporter
    </a>
</div>



        </div>

        {{-- ================= KPI CARDS ================= --}}
        <div class="row mb-4">

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3 text-primary">
                            <i class="fas fa-envelope fa-2x"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 text-muted">Total abonnés</h6>
                            <h4 class="mb-0">{{ $subscribers->total() }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3 text-success">
                            <i class="fas fa-calendar-check fa-2x"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 text-muted">Ce mois</h6>
                            <h4 class="mb-0">
                                {{ $subscribers->where('created_at', '>=', now()->startOfMonth())->count() }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3 text-danger">
                            <i class="fas fa-trash fa-2x"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 text-muted">Actions</h6>
                            <h4 class="mb-0">Gestion</h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- ================= ALERT ================= --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle me-1"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- ================= TABLE ================= --}}
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Liste des abonnés</h5>
                <span class="badge bg-primary">
                    {{ $subscribers->total() }} abonnés
                </span>
            </div>

            <div class="card-body p-0">

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Date d’inscription</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($subscribers as $subscriber)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        <i class="fas fa-envelope text-muted me-1"></i>
                                        {{ $subscriber->email }}
                                    </td>

                                    <td>
                                        <span class="badge bg-light text-dark">
                                            {{ $subscriber->created_at->format('d/m/Y') }}
                                        </span>
                                        <small class="text-muted">
                                            {{ $subscriber->created_at->format('H:i') }}
                                        </small>
                                    </td>

                                    <td class="text-end">

                                        <form action="{{ route('newsletters.destroy', $subscriber->id) }}" method="POST"
                                            onsubmit="return confirm('Voulez-vous vraiment supprimer cet email ?')"
                                            class="d-inline">
                                            @csrf
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">
                                        Aucun abonné trouvé
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

            {{-- ================= PAGINATION ================= --}}
            <div class="card-footer bg-white">
                {{ $subscribers->links() }}
            </div>
        </div>

    </div>

    <!-- ================= SEND NEWSLETTER MODAL ================= -->
<div class="modal fade" id="sendNewsletterModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <form action="{{ route('newsletters.send') }}" method="POST" class="modal-content">
            @csrf

            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-paper-plane me-1"></i>
                    Envoyer une newsletter
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <div class="mb-3">
                    <label class="form-label">Objet du mail</label>
                    <input type="text" name="subject" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Message</label>
                    <textarea name="content" rows="6" class="form-control" required></textarea>
                </div>

                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i>
                    Le message sera envoyé à <strong>tous les abonnés</strong>.
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Annuler
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-paper-plane"></i> Envoyer
                </button>
            </div>
        </form>
    </div>
</div>


@endsection
