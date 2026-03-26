@extends('backend.layouts.master')

@section('title')
Gestion des Sliders
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header d-flex justify-content-between">
                <h5>Sliders</h5>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
                    Ajouter
                </button>
            </div>

            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Titre</th>
                            <th>Ordre</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $slider)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('storage/'.$slider->image) }}" width="80">
                            </td>
                            <td>{{ $slider->title }}</td>
                            <td>{{ $slider->order }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $slider->id }}">Edit</button>

                                <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Supprimer ?')">Delete</button>
                                </form>
                            </td>
                        </tr>

                        {{-- MODAL EDIT --}}
                        <div class="modal fade" id="editModal{{ $slider->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="modal-header">
                                            <h5>Modifier</h5>
                                        </div>

                                        <div class="modal-body">
                                            <input type="text" name="title" value="{{ $slider->title }}" class="form-control mb-2">
                                            <input type="text" name="subtitle" value="{{ $slider->subtitle }}" class="form-control mb-2">
                                            <textarea name="description" class="form-control mb-2">{{ $slider->description }}</textarea>
                                            <input type="number" name="order" value="{{ $slider->order }}" class="form-control mb-2">
                                            <input type="file" name="image" class="form-control">
                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-primary">Update</button>
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
<div class="modal fade" id="addModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5>Ajouter un slider</h5>
                </div>

                <div class="modal-body">
                    <input type="text" name="title" placeholder="Titre" class="form-control mb-2" required>
                    <input type="text" name="subtitle" placeholder="Sous-titre" class="form-control mb-2">
                    <textarea name="description" placeholder="Description" class="form-control mb-2"></textarea>
                    <input type="number" name="order" placeholder="Ordre" class="form-control mb-2" required>
                    <input type="file" name="image" class="form-control" required>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-success">Ajouter</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection