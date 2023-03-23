@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                <h1>
                    Crea Post
                </h1>
            </div>
        </div>

        @include('partials.errors')

        <div class="row mb-4">
            <div class="col">
                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">
                            Titolo<span class="text-danger">*</span>
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            id="title"
                            name="title"
                            required
                            maxlength="128"
                            value="{{ old('title') }}"
                            placeholder="Inserisci il titolo...">
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">
                            Contenuto<span class="text-danger">*</span>
                        </label>
                        <textarea
                            class="form-control"
                            rows="10"
                            id="content"
                            name="content"
                            required
                            maxlength="4096"
                            placeholder="Inserisci il contenuto...">{{ old('content') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">
                            Immagine in evidenza
                        </label>
                        <input
                            type="file"
                            class="form-control"
                            id="img"
                            name="img"
                            accept="image/*"
                            placeholder="Inserisci l'immagine in evidenza...">
                    </div>

                    <div>
                        <p>
                            N.B. i campi contrassegnati con <span class="text-danger">*</span> sono obbligatori
                        </p>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success">
                            Aggiungi
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
