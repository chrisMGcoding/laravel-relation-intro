@extends('template.template')

@section('content')

    <div class="container">

        <p>ID : {{ ($video->id) }}</p>
        <p>Image : {{ ($video->img) }}</p>
        <p>Durée : {{ ($video->duration) }}</p>
        <p>Titre : {{ ($video->title) }}</p>
        <p>Description : {{ ($video->description) }}</p>
        <p>URL : {{ ($video->url) }}</p>

    </div>

@endsection