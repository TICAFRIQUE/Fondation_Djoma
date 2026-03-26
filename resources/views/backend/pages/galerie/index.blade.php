@extends('backend.layouts.master')

@section('title')
Galerie
@endsection

@section('css')
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1')
Liste
@endslot
@slot('title')
Galerie
@endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title mb-0">Liste des images</h5>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                    Ajouter une image
                </button>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Titre</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($images as $key => $item)
                        <tr id="row_{{ $item->id }}">
                            <td>{{ ++$key }}</td>

                            <<td>
                                @if($item->type == 'video')
                                <video width="60" style="border-radius:6px;">
                                    <source src="{{ asset('storage/'.$item->path) }}" type="video/mp4">
                                </video>
                                @else
                                <img src="{{ asset('storage/'.$item->path) }}" width="60" style="border-radius:6px;">
                                @endif
                                </td>

                                <td>{{ $item->title }}</td>
                                <td>{{ $item->created_at }}</td>

                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-soft-secondary btn-sm" data-bs-toggle="dropdown">
                                            <i class="ri-more-fill"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">

                                            <li>
                                                <a class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $item->id }}">
                                                    Modifier
                                                </a>
                                            </li>

                                            <li>
                                                <form action="{{ route('galerie.delete',$item->id) }}" method="POST">
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
                                <form method="POST" action="{{ route('galerie.update',$item->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5>Modifier image</h5>
                                            <button class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body">

                                            <div class="mb-3">
                                                <label>Titre</label>
                                                <input type="text" name="title" value="{{ $item->title }}" class="form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label>Image</label>
                                                <input type="file" name="image" class="form-control">
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

{{-- MODAL CREATE --}}
<div class="modal fade" id="createModal">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('galerie.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="modal-content">
                <div class="modal-header">
                    <h5>Ajouter une image</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Titre</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" required>
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