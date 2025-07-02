@extends('users.index')

@section('content')
    <div class="container py-4">
        <div class="">
            {{-- Breadcrumb --}}
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                @if (empty($sort) && empty($query))
                    <li class="breadcrumb-item active" aria-current="page">Cửa hàng</li>
                @else
                    <li class="breadcrumb-item"><a href="{{ route('shop.index') }}">Cửa hàng</a></li>
                    @if ($sort == 'newest')
                        <li class="breadcrumb-item active" aria-current="page">
                            Mới nhất
                            @if (!empty($query))
                                / Kết quả: "{{ $query }}"
                            @endif
                        </li>
                    @elseif (!empty($query))
                        <li class="breadcrumb-item active" aria-current="page">Kết quả: "{{ $query }}"</li>
                    @endif
                @endif
            </ol>

            <form method="get" class="d-flex align-items-start justify-content-end gap-2 mb-3">
                @if (request('q'))
                    <input type="hidden" name="q" value="{{ request('q') }}">
                @endif
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
                        {{-- <option value="popular" {{ $sort == 'popular' ? 'selected' : '' }}>Phổ biến nhất</option> --}}
                        <option value="price_asc" {{ $sort == 'price_asc' ? 'selected' : '' }}>Giá tăng dần</option>
                        <option value="price_desc" {{ $sort == 'price_desc' ? 'selected' : '' }}>Giá giảm dần</option>
                    </select>
                    <label for="sort">Sắp xếp</label>
                </div>

                <button type="submit" class="btn btn-primary"
                    style="margin:0!important; width:60px!important; height:38px!important; border-radius:2px;!important;">Lọc</button>
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

    {{-- <style>
        .custom-float {
            position: relative;
            width: 150px;
        }

        .custom-float input,
        .custom-float select {
            width: 100%;
            height: 38px;
            padding: 14px 12px 6px;
            font-size: 14px;
            border: 1px solid #a1a1a1;
            border-radius: 4px;
            outline: none;
            background-color: #f3f2ed;
            /* Màu nền input */
        }

        .custom-float label {
            position: absolute;
            top: 30%;
            left: 12px;
            transform: translateY(-50%);
            background-color: #f3f2ed;
            /* Match với input background */
            padding: 0 4px;
            color: #7b7b7b;
            font-size: 13px;
            pointer-events: none;
            transition: 0.2s ease;
            border-radius: 4px;

        }

        /* Khi focus hoặc đã nhập, label đẩy lên */
        .custom-float input:focus+label,
        .custom-float input:not(:placeholder-shown)+label,
        .custom-float select:focus+label,
        .custom-float select:valid+label {
            top: 0;
            transform: translateY(-50%) scale(0.85);
            color: #05172a;
            background-color: #f3f2ed;
        }

        .custom-float input:focus {
            background-color: transparent;
        }

        /* Optional: Loại bỏ viền khi select chưa chọn */
        .custom-float select:invalid {
            color: gray;
        }
    </style> --}}


@endsection
