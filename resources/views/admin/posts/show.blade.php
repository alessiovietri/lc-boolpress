@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                @include('partials.success')

                <h1>
                    {{ $post->title }}
                </h1>
                <h6>
                    Slug: {{ $post->slug }}
                </h6>

                <h3>
                    Categoria: {{ $post->category ? $post->category->name : 'Nessuna categoria' }}
                </h3>

                @if ($post->img)
                    <div>
                        <img src="{{ asset('storage/'.$post->img) }}" style="height: 300px;" alt="">
                    </div>
                @endif

                <p>
                    {!! nl2br($post->content) !!}
                </p>
            </div>
        </div>
    </div>
@endsection
