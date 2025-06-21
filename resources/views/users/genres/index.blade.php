@extends('users.index')

@section('content')
    <div class="container py-4 mb-4">
        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Genres</li>
            </ol>
        </nav>

        {{-- <h2 class="mb-4 text-center text-uppercase fw-bold">Genres</h2> --}}

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
            @foreach ($genres as $genre)
                <div class="col">
                    <div class="card h-100 text-center shadow-sm genre-card">
                        <img src="{{ asset('images/genre/' . ($genre->image_path ?? 'default.png')) }}"
                            alt="{{ $genre->genre_name }}" class="card-img-top" style="aspect-ratio:1/1;object-fit:cover;">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase fw-bold">{{ $genre->genre_name }}</h5>
                            {{-- <p class="card-text text-muted small mb-0">{{ $genre->product_count }} SẢN PHẨM</p> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
