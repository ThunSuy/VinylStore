@extends('users.index')

@section('content')
    <div class="container py-4">

        <div class="">

            {{-- Breadcrumb --}}
            <nav aria-label="breadcrumb" class="mb-3">
                <ol class="breadcrumb fw-bold">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('artists.index') }}">Nghệ sĩ</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $artist->artist_name }}
                    </li>
                </ol>
            </nav>

            {{-- Sort Dropdown --}}

            <form method="get" class="d-flex align-items-start justify-content-end gap-2 mb-3">
                <div class="custom-float">
                    <input type="number" id="price1" name="price1" class="form-control" placeholder=" "
                        value="{{ request('price1') }}">
                    <label for="price1">Giá từ</label>
                </div>

                <div class="custom-float">
                    <input type="number" id="price2" name="price2" class="form-control" placeholder=" "
                        value="{{ request('price2') }}">
                    <label for="price2">Giá đến</label>
                </div>

                <div class="custom-float">
                    <select name="sort" class="form-select" onchange="this.form.submit()">
                        <option value="">Sắp xếp</option>
                        <option value="newest" {{ $sort == 'newest' ? 'selected' : '' }}>Mới nhất</option>
                        <option value="price_asc" {{ $sort == 'price_asc' ? 'selected' : '' }}>Giá tăng dần</option>
                        <option value="price_desc" {{ $sort == 'price_desc' ? 'selected' : '' }}>Giá giảm dần</option>
                    </select>
                    <label for="sort">Sắp xếp</label>
                </div>

                <button type="submit" class="btn btn-primary"
                    style="margin:0!important; width:60px!important; height:38px!important; border-radius:2px;!important;">Lọc</button>
            </form>
            {{-- <form method="get">
                <select name="sort" class="form-select" style="width:auto;display:inline-block;"
                    onchange="this.form.submit()">
                    <option value="">Sắp xếp</option>
                    <option value="newest" {{ $sort == 'newest' ? 'selected' : '' }}>Mới nhất</option>
                    <option value="popular" {{ $sort == 'popular' ? 'selected' : '' }}>Theo độ phổ biến</option>
                    <option value="rating" {{ $sort == 'rating' ? 'selected' : '' }}>Theo đánh giá</option>
                    <option value="price_asc" {{ $sort == 'price_asc' ? 'selected' : '' }}>Giá tăng dần</option>
                    <option value="price_desc" {{ $sort == 'price_desc' ? 'selected' : '' }}>Giá giảm dần</option>
                </select>
            </form> --}}
        </div>

        {{-- Aritst Description --}}
        <div class="mb-2">
            <h2 class="fw-bold text-uppercase text-center">{{ $artist->artist_name }}</h2>
            <div class="text-center text-muted">{{ $description }}</div>
        </div>

        {{-- Albums List --}}
        <div class="row">
            @foreach ($albums as $album)
                <div class="col-md-3">
                    <a href="{{ route('albums.show', ['album_id' => $album->album_id]) }}"
                        class="text-decoration-none text-dark">
                        <div class="product-item">

                            {{-- Image --}}
                            <figure class="product-style">
                                <img src="{{ asset('images/albums/' . ($album->cover_image_url ?? 'default.png')) }}"
                                    alt="{{ $album->album_name }}" class="product-item">
                                <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Thêm vào giỏ
                                    hàng</button>
                                @if ($album->discount_value)
                                    <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-2"
                                        style="z-index:2;">Giảm giá!</span>
                                @endif
                            </figure>

                            {{-- AlbumName - AritstName - Price --}}
                            <figcaption>
                                <h3 style="font-size:1.4rem;">{{ $album->album_name }}</h3>
                                <span>{{ $artist->artist_name }}</span>
                                <div class="item-price">
                                    @if ($album->discount_value)
                                        <span class="prev-price">${{ number_format($album->price, 0) }}</span>
                                        @if ($album->discount_type == 'percentage')
                                            {{ number_format($album->price * (1 - $album->discount_value / 100), 0) }}đ
                                        @else
                                            {{ number_format($album->price - $album->discount_value, 0) }}đ
                                        @endif
                                    @else
                                        {{ number_format($album->price, 0) }}đ
                                    @endif
                                </div>
                            </figcaption>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

    </div>
@endsection
