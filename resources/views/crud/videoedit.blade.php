@extends('template.template')

@section('content')

    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('videos.update', $video->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input class="form-control" type="file" name="img" value="{{ $video->img }}">
          </div>
          <div class="mb-3">
              <label class="form-label">Durée</label>
              <input type="text" class="form-control" type="text" name="duration" value="{{ $video->duration }}">
          </div>
          <div class="mb-3">
              <label class="form-label">Titre</label>
              <input type="text" class="form-control" type="text" name="title" value="{{ $video->title }}">
          </div>
          <div class="mb-3">
              <label class="form-label">Description</label>
              <textarea class="form-control" type="text" name="description" value="{{ $video->description }}"></textarea>
          </div>
          <div class="mb-3">
              <label class="form-label">URL</label>
              <input type="text" class="form-control" type="file" name="url" value="{{ $video->url }}">
          </div>
        <button class="mt-2 mb-2" type="submit">Update</button>

        </form>

    </div>

@endsection
