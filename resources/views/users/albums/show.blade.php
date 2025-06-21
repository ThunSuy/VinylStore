@extends('users.index')

@section('content')
    <div class="container py-4">
        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb fw-bold">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('genres.index') }}">Genres</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/genres/' . $album->genre_name) }}">{{ $album->genre_name }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $album->album_name }}</li>
            </ol>
        </nav>

        {{-- Product Info --}}
        <div class="row mb-4">
            <div class="col-md-5 text-center">
                <img src="{{ asset('images/albums/' . ($album->cover_image_url ?? 'default.png')) }}"
                    alt="{{ $album->album_name }}" class="img-fluid rounded"
                    style="aspect-ratio:1/1;object-fit:cover;max-width:350px;">

            </div>
            <div class="col-md-7">
                <div class="mb-3">
                    <span class="fw-bold">Artist:</span>
                    <a href="{{ route('artists.show', ['artist_name' => $album->artist_name]) }}"
                        class="fw-bold text-decoration-underline">{{ $album->artist_name }}</a>
                </div>
                <h2 class="fw-bold text-uppercase">{{ $album->album_name }} – Đĩa Than</h2>
                <div class="mb-3 item-price">
                    @if ($album->discount_value)
                        <span class="text-muted text-decoration-line-through">${{ number_format($album->price, 2) }}</span>
                        <span class="fw-bold text-danger ms-2">
                            @if ($album->discount_type == 'percentage')
                                ${{ number_format($album->price * (1 - $album->discount_value / 100), 2) }}
                            @else
                                ${{ number_format($album->price - $album->discount_value, 2) }}
                            @endif
                        </span>
                        <span class="badge bg-warning text-dark ms-2">Giảm giá!</span>
                    @else
                        <span class="fw-bold">${{ number_format($album->price, 2) }}</span>
                    @endif
                </div>
                {{-- Quantity selector --}}

                <form class="d-flex align-items-stretch mb-3" style="max-width:160px;">
                    <button type="button" class="btn btn-outline-secondary w-100" style="width:50px; height:50px"
                        onclick="changeQty(-1)">-</button>

                    <input type="number" id="qty" name="qty" value="1" min="1"
                        class="form-control mx-2 text-center form-outline-secondary"
                        style="width:50px; margin:15px 4px; height:50px;">

                    <button type="button" class="btn btn-outline-secondary w-100" style="width:50px; height:50px"
                        onclick="changeQty(1)">+</button>
                </form>

                <button class="btn btn-dark w-50 text-uppercase fw-bold">
                    Add to Cart
                </button>
                <div class="mb-2">
                    <div class="fw-bold">Description:</div>
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
            <iframe src="https://open.spotify.com/embed/album/{{ $album->spotify_album_id }}" width="100%" height="380"
                frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
        </div>

        {{-- Related Products --}}
        <h3 class="fw-bold text-uppercase mb-3">SẢN PHẨM TƯƠNG TỰ</h3>
        <div class="row product-slider">
            @foreach ($related as $item)
                <div class="col-md-3">
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
                                    <span class="prev-price">${{ number_format($item->price, 2) }}</span>
                                    @if ($item->discount_type == 'percentage')
                                        ${{ number_format($item->price * (1 - $item->discount_value / 100), 2) }}
                                    @else
                                        ${{ number_format($item->price - $item->discount_value, 2) }}
                                    @endif
                                @else
                                    ${{ number_format($item->price, 2) }}
                                @endif
                            </div>
                        </figcaption>
                    </div>
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
@endsection
