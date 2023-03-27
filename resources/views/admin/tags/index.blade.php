@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                <h1>
                    Tutti tag
                </h1>

                <a href="{{ route('admin.tags.create') }}" class="btn btn-success">
                    Aggiungi tag
                </a>
            </div>
        </div>

        @include('partials.success')

        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Slug</th>
                            <th scope="col"># articoli</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <th scope="row">{{ $tag->id }}</th>
                                <td>{{ $tag->name }}</td>
                                <td>{{ $tag->slug }}</td>
                                {{-- SELECT COUNT(*) FROM posts where category_id = $tag->id --}}
                                <td>{{ $tag->posts()->count() }}</td>
                                <td>
                                    <a href="{{ route('admin.tags.show', $tag->id) }}" class="btn btn-primary">
                                        Dettagli
                                    </a>
                                    <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-warning">
                                        Aggiorna
                                    </a>
                                    <form
                                        class="d-inline-block"
                                        action="{{ route('admin.tags.destroy', $tag->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Sei sicuro di voler eliminare questo tag?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">
                                            Elimina
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
@endsection
