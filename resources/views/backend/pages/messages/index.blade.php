@extends('backend.layouts.master')

@section('title')
Messages
@endsection

@section('content')

@component('backend.components.breadcrumb')
@slot('li_1') Communication @endslot
@slot('title') Messages reçus @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">

        <div class="card">

            <div class="card-header">
                <h5 class="mb-0">Liste des messages</h5>
            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered align-middle">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Objet</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($messages as $key => $msg)
                            <tr>

                                <td>{{ $key + 1 }}</td>

                                <td>{{ $msg->name }}</td>

                                <td>{{ $msg->email }}</td>

                                <td>{{ $msg->subject }}</td>

                                <td style="max-width:250px;">
                                    {{ \Illuminate\Support\Str::limit($msg->message, 80) }}
                                </td>

                                <td>{{ $msg->created_at->format('d/m/Y H:i') }}</td>

                                <td>

                                    <form action="{{ route('messages.destroy', $msg->id) }}"
                                        method="POST">
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

        </div>

    </div>
</div>

@endsection