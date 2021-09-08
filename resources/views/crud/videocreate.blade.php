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



    <form action="{{ route('videos.store') }}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="mb-3">
          <label class="form-label">Image</label>
          <input class="form-control" type="file" name="img" value="{{ old('img') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Duration</label>
            <input type="text" class="form-control" type="text" name="duration" value="{{ old('duration') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Titre</label>
            <input type="text" class="form-control" type="text" name="title" value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" value="{{ old('description') }}"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">URL</label>
            <input type="text" class="form-control" name="url" value="{{ old('url') }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

</div>

@endsection