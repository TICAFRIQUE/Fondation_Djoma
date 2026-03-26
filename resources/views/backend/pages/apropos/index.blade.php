@extends('backend.layouts.master')

@section('title')
Images À propos
@endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1')
Gestion
@endslot
@slot('title')
Images section À propos
@endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Liste des images "À propos"</h5>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Ajouter une image</button>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-hover align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Titre</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($aproposList as $apropos)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($apropos->image)
                                <img src="{{ asset('storage/'.$apropos->image) }}" style="width:100px; border-radius:5px;">
                                @else
                                <span class="text-muted">Aucune image</span>
                                @endif
                            </td>
                            <td>{{ $apropos->title ?? '-' }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $apropos->id }}">Modifier</button>
                                <!-- <form action="{{ route('apropos.destroy', $apropos->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette image ?')">Supprimer</button>
                                </form> -->
                            </td>
                        </tr>

                        {{-- MODAL EDIT --}}
                        <div class="modal fade" id="editModal{{ $apropos->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modifier l'image</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <form action="{{ route('apropos.update', $apropos->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body text-center">
                                            @if($apropos->image)
                                            <img src="{{ asset('storage/'.$apropos->image) }}" style="max-width:200px;border-radius:5px;margin-bottom:15px;">
                                            @endif
                                            <div class="mb-3">
                                                <label class="form-label">Nouvelle image</label>
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Titre (optionnel)</label>
                                                <input type="text" name="title" value="{{ $apropos->title ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- MODAL ADD --}}
<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter une nouvelle image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('apropos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Titre (optionnel)</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection