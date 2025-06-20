{{-- filepath: resources/views/artists/index.blade.php --}}
@extends('users.index')

@section('content')
    <div class="container py-4">
        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Artists</li>
            </ol>
        </nav>

        {{-- <h2 class="mb-4 text-center text-uppercase fw-bold">Artists</h2> --}}

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
            @foreach ($artists as $artist)
                <div class="col">
                    <a href="{{ route('artists.show', ['artist_name' => $artist->artist_name]) }}">
                        <div class="card h-100 text-center shadow-sm artist-card">
                            <img src="{{ asset('images/avt/' . ($artist->image_url ?? 'default.png')) }}"
                                alt="{{ $artist->artist_name }}" class="card-img-top"
                                style="aspect-ratio:1/1;object-fit:cover;">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase fw-bold">{{ $artist->artist_name }}</h5>
                                <p class="card-text text-muted small mb-0">{{ $artist->product_count }} SẢN PHẨM</p>
                            </div>
                        </div>
                    </a>

                </div>
            @endforeach
        </div>
    </div>
@endsection
