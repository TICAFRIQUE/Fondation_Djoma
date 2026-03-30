@extends('backend.layouts.master')

@section('title')
Projets
@endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1')
Gestion
@endslot
@slot('title')
Projets
@endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">

        <div class="card">

            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Liste des projets</h5>

                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                    Ajouter un projet
                </button>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered align-middle">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Titre</th>
                                <th>Statut</th>
                                <th>Progression</th>
                                <th>Date fin</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($projets as $key => $item)
                            <tr>

                                <td>{{ $key + 1 }}</td>

                                <td>
                                    @if($item->image)
                                        <img src="{{ asset('storage/'.$item->image) }}"
                                             width="60"
                                             style="border-radius:6px;">
                                    @else
                                        -
                                    @endif
                                </td>

                                <td>{{ $item->title }}</td>

                                <td>
                                    @if($item->status == 'en_cours')
                                        <span class="badge bg-success">En cours</span>
                                    @elseif($item->status == 'financement')
                                        <span class="badge bg-warning">Financement</span>
                                    @else
                                        <span class="badge bg-info">Bientôt</span>
                                    @endif
                                </td>

                                <td>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar"
                                             style="width:{{ $item->progress }}%;">
                                        </div>
                                    </div>
                                    <small>{{ $item->progress }}%</small>
                                </td>

                                <td>
                                    {{ $item->date_end ? $item->date_end->format('d/m/Y') : '-' }}
                                </td>

                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-soft-secondary btn-sm" data-bs-toggle="dropdown">
                                            <i class="ri-more-fill"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-menu-end">

                                            <li>
                                                <a class="dropdown-item"
                                                   data-bs-toggle="modal"
                                                   data-bs-target="#editModal{{ $item->id }}">
                                                    Modifier
                                                </a>
                                            </li>

                                            <li>
                                                <form action="{{ route('projets.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="dropdown-item text-danger">
                                                        Supprimer
                                                    </button>
                                                </form>
                                            </li>

                                        </ul>
                                    </div>
                                </td>

                            </tr>

                            {{-- MODAL EDIT --}}
                            <div class="modal fade" id="editModal{{ $item->id }}">
                                <div class="modal-dialog">
                                    <form method="POST"
                                          action="{{ route('projets.update', $item->id) }}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5>Modifier projet</h5>
                                                <button class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">

                                                <div class="mb-3">
                                                    <label>Titre</label>
                                                    <input type="text" name="title"
                                                           value="{{ $item->title }}"
                                                           class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label>Description</label>
                                                    <textarea name="description"
                                                              class="form-control">{{ $item->description }}</textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Image</label>
                                                    <input type="file" name="image" class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label>Statut</label>
                                                    <select name="status" class="form-control">
                                                        <option value="en_cours" {{ $item->status=='en_cours'?'selected':'' }}>En cours</option>
                                                        <option value="financement" {{ $item->status=='financement'?'selected':'' }}>Financement</option>
                                                        <option value="bientot" {{ $item->status=='bientot'?'selected':'' }}>Bientôt</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Progression (%)</label>
                                                    <input type="number" name="progress"
                                                           value="{{ $item->progress }}"
                                                           class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label>Date fin</label>
                                                    <input type="date" name="date_end"
                                                           value="{{ $item->date_end ? $item->date_end->format('Y-m-d') : '' }}"
                                                           class="form-control">
                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <button class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                                                <button class="btn btn-primary">Modifier</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>

                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>

        </div>

    </div>
</div>

{{-- MODAL CREATE --}}
<div class="modal fade" id="createModal">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('projets.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="modal-content">

                <div class="modal-header">
                    <h5>Ajouter un projet</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Titre</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                       
                    </div>

                    <div class="mb-3">
                        <label>Statut</label>
                        <select name="status" class="form-control">
                            <option value="en_cours">En cours</option>
                            <option value="financement">Financement</option>
                            <option value="bientot">Bientôt</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Progression (%)</label>
                        <input type="number" name="progress" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Date fin</label>
                        <input type="date" name="date_end" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                    <button class="btn btn-primary">Enregistrer</button>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection