@extends('users.index')

@section('content')
    <div class="container py-4">
        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb fw-bold">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('genres.index') }}">Thể loại</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/genres/' . $album->genre_name) }}">{{ $album->genre_name }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $album->album_name }}</li>
            </ol>
        </nav>

        {{-- Product Info --}}
        <div class="row mb-4">

            {{-- Img Album --}}
            <div class="col-md-5 text-center">
                <img src="{{ asset('images/albums/' . ($album->cover_image_url ?? 'default.png')) }}"
                    alt="{{ $album->album_name }}" class="img-fluid rounded"
                    style="aspect-ratio:1/1;object-fit:cover;max-width:350px;">

            </div>
            <div class="col-md-7">
                {{-- --Artist Name-- --}}
                <div class="mb-1" style="font-size:1rem;">
                    <span class="fw-bold">Nghệ sĩ:</span>
                    <a href="{{ route('artists.show', ['artist_name' => $album->artist_name]) }}"
                        class="fw-bold text-decoration-underline">{{ $album->artist_name }}</a>
                </div>

                {{-- Album Name --}}
                <h2 class="fw-bold text-uppercase " style="font-size:1.7rem;">{{ $album->album_name }} – Đĩa Than</h2>

                {{-- Price --}}
                <div class="mb-3 item-price" style="font-size:1.5rem;">
                    @if ($album->discount_value)
                        <span class="text-muted text-decoration-line-through">{{ number_format($album->price, 0) }}đ</span>
                        <span class="fw-bold text-danger ms-2">
                            @if ($album->discount_type == 'percentage')
                                {{ number_format($album->price * (1 - $album->discount_value / 100), 0) }}đ
                            @else
                                {{ number_format($album->price - $album->discount_value, 0) }}đ
                            @endif
                        </span>
                        <span class="badge bg-warning text-dark ms-2">Giảm giá!</span>
                    @else
                        <span class="fw-bold">{{ number_format($album->price, 0) }}đ</span>
                    @endif
                </div>


                {{-- Quantity selector --}}
                <form class="d-flex align-items-center mb-3 quantity-form" style="max-width:170px;">
                    <button type="button" class="qty-btn" onclick="changeQty(-1)">-</button>
                    <input type="number" id="qty" name="qty" value="1" min="1"
                        class="qty-input text-center">
                    <button type="button" class="qty-btn" onclick="changeQty(1)">+</button>
                </form>

                {{-- Add to Cart Button --}}
                <button type="button" class="add-to-cart btn btn-dark w-50 text-uppercase fw-bold"
                    onclick="addToCartGuest({
                    album_id: {{ $album->album_id }},
                    album_name: '{{ $album->album_name }}',
                    price: {{ $album->price }},
                    cover_image_url: '{{ $album->cover_image_url ?? 'default.png' }}',
                    qty: parseInt(document.getElementById('qty').value)
                })">
                    Thêm vào giỏ hàng
                </button>


                <div class="mb-5">
                    <div class="fw-bold">Mô tả sản phẩm:</div>
                    <div>{{ $album->description }}</div>
                </div>
            </div>
        </div>

        {{-- Spotify Embed --}}
        <div class="mb-5">
            {{-- <iframe style="border-radius:12px"
                src="https://open.spotify.com/embed/album/{{ $album->spotify_album_id ?? '...' }}" width="100%"
                height="152" frameBorder="0" allowfullscreen=""
                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture"></iframe> --}}
            <iframe src="https://open.spotify.com/embed/album/{{ $album->spotify_album_id }}" width="100%" height="500"
                frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
        </div>

        {{-- Related Products --}}
        <h3 class="fw-bold text-uppercase mt-5 mb-4 pt-5">Sản phẩm tương tự</h3>
        <div class="row product-slider">
            @foreach ($related as $item)
                <div class="col-md-3">
                    <a href="{{ route('albums.show', ['album_id' => $item->album_id]) }}"
                        class="text-decoration-none text-dark">
                        <div class="product-item">
                            <figure class="product-style">
                                <img src="{{ asset('images/albums/' . ($item->cover_image_url ?? 'default.png')) }}"
                                    alt="{{ $item->album_name }}" class="product-item">
                                <button type="button" class="add-to-cart" data-product-tile="add-to-cart">
                                    Add to Cart
                                </button>
                                @if ($item->discount_value)
                                    <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-2">Giảm
                                        giá!</span>
                                @endif
                                {{-- @if ($item->stock === 0)
                    <span class="badge bg-danger position-absolute top-0 end-0 m-2">HẾT HÀNG</span>
                @endif --}}
                            </figure>
                            <figcaption>
                                <h3>{{ $item->artist_name }} – {{ $item->album_name }} – Đĩa Than</h3>
                                <span>{{ $item->artist_name }}</span>
                                <div class="item-price">
                                    @if ($item->discount_value)
                                        <span class="prev-price">${{ number_format($item->price, 0) }}đ</span>
                                        @if ($item->discount_type == 'percentage')
                                            {{ number_format($item->price * (1 - $item->discount_value / 100), 0) }}đ
                                        @else
                                            {{ number_format($item->price - $item->discount_value, 0) }}đ
                                        @endif
                                    @else
                                        {{ number_format($item->price, 0) }}đ
                                    @endif
                                </div>
                            </figcaption>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>

    <script>
        function changeQty(delta) {
            var qty = document.getElementById('qty');
            var val = parseInt(qty.value) + delta;
            if (val < 1) val = 1;
            qty.value = val;
        }
    </script>

    <script src="{{ asset('js/users/cart-guest.js') }}"></script>
@endsection
