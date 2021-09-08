@extends('template.template')

@section('content')

    <div class="container">

        <p>ID : {{ ($commentaire->id) }}</p>
        <p>Image : {{ ($commentaire->nom) }}</p>
        <p>Durée : {{ ($commentaire->prenom) }}</p>
        <p>Date : {{ ($commentaire->DateDePublication) }}</p>
        <p>Description : {{ ($commentaire->contenu) }}</p>

    </div>

@endsection