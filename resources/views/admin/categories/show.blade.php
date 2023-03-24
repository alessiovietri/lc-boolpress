@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                @include('partials.success')

                <h1>
                    {{ $category->name }}
                </h1>
                <h6>
                    Slug: {{ $category->slug }}
                </h6>

                <h2>
                    Articoli associati ({{ $category->posts()->count() }})
                </h2>
                @if ($category->posts()->count() > 0)
                    <ul>
                        @foreach ($category->posts as $post)
                        <li>
                            <a href="{{ route('admin.posts.show', $post->id) }}">
                                {{ $post->title }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                @else
                    <h3>
                        Nessun articolo associato
                    </h3>
                @endif
            </div>
        </div>
    </div>
@endsection
