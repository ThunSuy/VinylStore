@extends('users.index')

@section('content')
    <div class="container py-4">
        {{-- Tiêu đề và Filter --}}

        <div class="d-flex justify-content-between align-items-center">
            <nav aria-label="breadcrumb" class="">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('artists.index') }}">Artists</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $artist->artist_name }}
                    </li>
                </ol>
            </nav>
            <form method="get">
                <select name="sort" class="form-select" style="width:auto;display:inline-block;"
                    onchange="this.form.submit()">
                    <option value="">Sắp xếp</option>
                    <option value="newest" {{ $sort == 'newest' ? 'selected' : '' }}>Mới nhất</option>
                    <option value="popular" {{ $sort == 'popular' ? 'selected' : '' }}>Theo độ phổ biến</option>
                    <option value="rating" {{ $sort == 'rating' ? 'selected' : '' }}>Theo đánh giá</option>
                    <option value="price_asc" {{ $sort == 'price_asc' ? 'selected' : '' }}>Giá tăng dần</option>
                    <option value="price_desc" {{ $sort == 'price_desc' ? 'selected' : '' }}>Giá giảm dần</option>
                </select>
            </form>
        </div>

        {{-- Mô tả nghệ sĩ --}}
        <div class="mb-2">
            <h2 class="fw-bold text-uppercase text-center">{{ $artist->artist_name }}</h2>
            <div class="text-center text-muted">{{ $description }}</div>
        </div>

        {{-- Danh sách sản phẩm --}}
        {{-- filepath: resources/views/artists/show.blade.php --}}
        <div class="row">
            @foreach ($albums as $album)
                <div class="col-md-3">
                    <div class="product-item">
                        <figure class="product-style">
                            <img src="{{ asset('images/albums/' . ($album->cover_image_url ?? 'default.png')) }}"
                                alt="{{ $album->album_name }}" class="product-item">
                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button>
                            @if ($album->discount_value)
                                <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-2"
                                    style="z-index:2;">Giảm giá!</span>
                            @endif
                        </figure>
                        <figcaption>
                            <h3>{{ $artist->artist_name }} – {{ $album->album_name }} – Đĩa Than</h3>
                            <span>{{ $artist->artist_name }}</span>
                            <div class="item-price">
                                @if ($album->discount_value)
                                    <span class="prev-price">${{ number_format($album->price, 2) }}</span>
                                    @if ($album->discount_type == 'percentage')
                                        ${{ number_format($album->price * (1 - $album->discount_value / 100), 2) }}
                                    @else
                                        ${{ number_format($album->price - $album->discount_value, 2) }}
                                    @endif
                                @else
                                    ${{ number_format($album->price, 2) }}
                                @endif
                            </div>
                        </figcaption>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
            @foreach ($albums as $album)
                <div class="col">
                    <div class="card h-100 product-card position-relative">
                        <div class="position-relative">
                            <img src="{{ asset('images/album/' . ($album->cover_image_url ?? 'default.png')) }}"
                                class="card-img-top" alt="{{ $album->album_name }}"
                                style="aspect-ratio:1/1;object-fit:cover;">
                            @if ($album->discount_value)
                                <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-2"
                                    style="z-index:2;">Giảm giá!</span>
                            @endif
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold" style="font-size:1rem;">
                                {{ $artist->artist_name }} – {{ $album->album_name }} – Đĩa Than
                            </h5>
                            <div class="mb-2">
                                @if ($album->discount_value)
                                    <span
                                        class="text-muted text-decoration-line-through">${{ number_format($album->price, 2) }}</span>
                                    <span class="fw-bold text-danger ms-2">
                                        @if ($album->discount_type == 'percentage')
                                            ${{ number_format($album->price * (1 - $album->discount_value / 100), 2) }}
                                        @else
                                            ${{ number_format($album->price - $album->discount_value, 2) }}
                                        @endif
                                    </span>
                                @else
                                    <span class="fw-bold">${{ number_format($album->price, 2) }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> --}}
    </div>
@endsection
