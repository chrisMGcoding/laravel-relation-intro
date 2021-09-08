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

        <form action="{{ route('commentaires.update', $commentaire->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input class="form-control" type="text" name="nom" value="{{ $commentaire->nom }}">
          </div>
          <div class="mb-3">
              <label class="form-label">Prénom</label>
              <input type="text" class="form-control" type="text" name="prenom" value="{{ $commentaire->prenom }}">
          </div>
          <div class="mb-3">
              <label class="form-label">Date :</label>
              <input type="text" class="form-control" type="text" name="DateDePublication" value="{{ $commentaire->DateDePublication }}">
          </div>
          <div class="mb-3">
              <label class="form-label">Contenu</label>
              <textarea class="form-control" type="text" name="contenu" value="{{ $commentaire->contenu }}"></textarea>
          </div>
          
        <button class="mt-2 mb-2" type="submit">Update</button>

        </form>