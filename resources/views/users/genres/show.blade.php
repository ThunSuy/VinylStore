@extends('users.index')

@section('content')
    <div class="container py-4">
        {{-- Breadcrumb --}}
        <div class="d-flex justify-content-between align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('genres.index') }}">Genres</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $genre->genre_name }}</li>
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

        {{-- Mô tả thể loại --}}
        {{-- <div class="mb-2">
            <h2 class="fw-bold text-uppercase text-center">{{ $genre->genre_name }}</h2>
            @if (!empty($genre->description))
                <div class="text-center text-muted">{{ $genre->description }}</div>
            @endif
        </div> --}}

        {{-- Danh sách sản phẩm --}}
        <div class="row">
            @foreach ($albums as $album)
                <div class="col-md-3">
                    <a href="{{ route('albums.show', ['album_id' => $album->album_id]) }}"
                        class="text-decoration-none text-dark">


                        <div class="product-item">
                            <figure class="product-style">
                                <img src="{{ asset('images/albums/' . ($album->cover_image_url ?? 'default.png')) }}"
                                    alt="{{ $album->album_name }}" class="product-item">
                                <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                                    Cart</button>
                                @if ($album->discount_value)
                                    <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-2"
                                        style="z-index:2;">Giảm giá!</span>
                                @endif
                            </figure>
                            <figcaption>
                                {{-- <h3>{{ $album->album_name }} – Đĩa Than</h3> --}}
                                <h3>{{ $album->artist_name }} – {{ $album->album_name }} – Đĩa Than</h3>
                                <span>{{ $genre->genre_name }}</span>
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

                    </a>
                </div>
            @endforeach


            {{-- <-- Pagination --> --}}
            <div class="d-flex flex-column align-items-center">
                {{-- Pagination chỉ chứa nút --}}
                {{ $albums->withQueryString()->links('users.pagination.only-links') }}

                {{-- Dòng text "Showing..." --}}
                <div class="text-muted small mb-2">
                    Showing {{ $albums->firstItem() }} to {{ $albums->lastItem() }} of {{ $albums->total() }} results
                </div>
            </div>


        </div>
    </div>
@endsection
