@extends('template.template')

@section('content')

<div class="container d-flex justify-content-center">

    <h1>Vidéo</h1>
    <button class="m-2 rounded bg-primary">
        <a href="{{ route('videos.create') }}"><p class="text-dark text-decoration-none">Ajouter</p></a>
    </button>

</div>

<div class="container">

    <table class="table">

        <thead >
            <tr>
                <th scope="col">#</th>
                <th scope="col">image</th>
                <th scope="col">durée</th>
                <th scope="col">titre</th>
                <th scope="col">description</th>
                <th scope="col">url</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <tbody>

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        @foreach($video as $item)

            <tr>
                <th scope="row">{{ ($item->id) }}</th>
                <td><img style="width: 40px" src="{{ asset('image/' . $item->img) }}" alt=""></td>
                <td>{{ ($item->duration) }}</td>
                <td>{{ ($item->title) }}</td>
                <td>{{ ($item->description) }}</td>
                <td>{{ ($item->url) }}</td>
                <td>
                    <div class="d-flex">
                        <form action="{{ route('videos.destroy', $item->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="rounded m-3 bg-danger" type="submit">Delete</button>
                        </form>

                        <button class="rounded m-3 bg-warning"><a class="text-decoration-none text-dark" href="{{ route('videos.show', $item->id)}}">Show</a></button>

                        <button class="rounded m-3 bg-success"><a class="text-decoration-none text-dark" href="{{ route('videos.edit', $item->id)}}">Update</a></button>
                    </div>
                </td>
            </tr>

        @endforeach

        </tbody>

    </table>

    </div>

@endsection