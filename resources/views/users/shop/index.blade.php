@extends('users.index')

@section('content')
    <div class="container py-4">
        <div class="">
            {{-- Breadcrumb --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                    @if (empty($sort) && empty($query))
                        <li class="breadcrumb-item active" aria-current="page">Cửa hàng</li>
                    @else
                        <li class="breadcrumb-item"><a href="{{ route('shop.index') }}">Cửa hàng</a></li>
                        @if ($sort == 'newest')
                            <li class="breadcrumb-item active" aria-current="page">Mới nhất</li>
                        @elseif (!empty($query))
                            <li class="breadcrumb-item active" aria-current="page">Kết quả: "{{ $query }}"</li>
                        @endif
                    @endif
                </ol>
            </nav>

            <form method="get" class="d-flex align-items-center gap-3 mb-3">
                <div class="price-group mb-0">
                    <div class="price-field">
                        <label for="price1">Giá từ</label>
                        <input type="number" id="price1" name="price1" placeholder="VNĐ"
                            value="{{ request('price1') }}">
                    </div>
                    <div class="price-field">
                        <label for="price2">Giá đến</label>
                        <input type="number" id="price2" name="price2" placeholder="VNĐ"
                            value="{{ request('price2') }}">
                    </div>
                </div>
                <select name="sort" class="form-select" style="width:200px!important" onchange="this.form.submit()">
                    <option value="">Sắp xếp</option>
                    <option value="newest" {{ $sort == 'newest' ? 'selected' : '' }}>Mới nhất</option>
                    <option value="price_asc" {{ $sort == 'price_asc' ? 'selected' : '' }}>Giá tăng dần</option>
                    <option value="price_desc" {{ $sort == 'price_desc' ? 'selected' : '' }}>Giá giảm dần</option>
                </select>
                <button type="submit" class="btn btn-primary ms-2">Lọc</button>
            </form>
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
                                <h3>{{ $album->album_name }}</h3>
                                <span>{{ $album->artist_name }}</span>
                                <div class="item-price">
                                    @if ($album->discount_value)
                                        <span class="prev-price">{{ number_format($album->price, 0) }}đ</span>
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

        {{-- Pagination --}}
        <div class="d-flex flex-column align-items-center">
            {{ $albums->withQueryString()->links('users.pagination.only-links') }}
            <div class="text-muted small mb-2">
                Showing {{ $albums->firstItem() }} to {{ $albums->lastItem() }} of {{ $albums->total() }} results
            </div>
        </div>
    </div>
@endsection
