@extends('backend.layouts.master')

@section('title')
Actualités
@endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1') Contenu @endslot
@slot('title') Actualités @endslot
@endcomponent

<div class="card">

    <div class="card-header d-flex justify-content-between">
        <h5>Liste des actualités</h5>

        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            Ajouter
        </button>
    </div>

    <div class="card-body table-responsive">

        <table class="table table-bordered align-middle">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Titre</th>
                    <th>Catégorie</th>
                    <th>Date</th>
                    <th>Lecture</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach($news as $key => $item)
                <tr>

                    <td>{{ $key+1 }}</td>

                    <td>
                        @if($item->image)
                        <img src="{{ asset('storage/'.$item->image) }}" width="60">
                        @endif
                    </td>

                    <td>{{ $item->title }}</td>

                    <td>
                        <span class="badge bg-info">{{ $item->category }}</span>
                    </td>

                    <td>
                        {{ $item->published_at ? $item->published_at->format('d/m/Y') : '-' }}
                    </td>

                    <td>{{ $item->reading_time }} min</td>

                    <td>

                        <form action="{{ route('news.destroy',$item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">
                                Supprimer
                            </button>
                        </form>

                    </td>

                </tr>
                @endforeach

            </tbody>

        </table>

    </div>

</div>

{{-- CREATE MODAL --}}
<div class="modal fade" id="createModal">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="modal-content">

                <div class="modal-header">
                    <h5>Nouvel article</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <input class="form-control mb-2" name="title" placeholder="Titre">

                    <textarea class="form-control mb-2" name="content" placeholder="Contenu"></textarea>

                    <input type="file" name="image" class="form-control mb-2">

                    <select name="category" class="form-control mb-2">
                        <option>Éducation</option>
                        <option>Santé</option>
                        <option>Économie</option>
                    </select>

                    <input type="date" name="published_at" class="form-control mb-2">

                    <input type="number" name="reading_time" class="form-control mb-2" placeholder="Temps de lecture">

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