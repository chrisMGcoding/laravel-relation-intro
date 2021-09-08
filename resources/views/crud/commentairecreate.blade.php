@extends('template.template')

@section('content')

<div class="container">

    <h1 class="text-center my-3">Créer Article</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <form action="{{ route('commentaires.store') }}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="mb-3">
          <label class="form-label">Nom</label>
          <input class="form-control" type="text" name="nom" value="{{ old('nom') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Duration</label>
            <input type="text" class="form-control" type="text" name="prenom" value="{{ old('prenom') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="text" class="form-control" type="text" name="DateDePublication" value="{{ old('DateDePublication') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">contenu</label>
            <textarea class="form-control" name="contenu" value="{{ old('contenu') }}"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Video</label>
            <input type="text" class="form-control" name="video_id" value="{{ old('video_id') }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

</div>

@endsection