@extends('frontend.layouts.app')

@section('title', $realisation->title)

@section('meta')
<meta name="description" content="{{ Str::limit($realisation->description,150) }}">
@endsection

@section('content')

<div class="container py-5">

<h1>{{ $realisation->title }}</h1>

<img src="{{ asset('storage/'.$realisation->image) }}"
     class="img-fluid"
     loading="lazy"
     alt="{{ $realisation->title }}">

<p class="mt-3">{{ $realisation->description }}</p>

</div>

@endsection