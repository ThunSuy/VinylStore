@extends('users.index')

@section('content')
    <section id="billboard">

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <button class="prev slick-arrow">
                        <i class="icon icon-arrow-left"></i>
                    </button>

                    {{-- Slider --}}
                    <div class="main-slider pattern-overlay">
                        @foreach ($albums as $album)
                            <div class="slider-item">
                                <div class="banner-content">
                                    <h2 class="banner-title" style="font-size:2.8rem;">{{ $album->album_name }}</h2>
                                    <h3 class="item-price">{{ $album->artist_name }}</h3>
                                    <p>{{ $album->description }}</p>
                                    <div class="btn-wrap">
                                        <a href="{{ route('albums.show', ['album_id' => $album->album_id]) }}"
                                            class="btn btn-outline-accent btn-accent-arrow">
                                            Xem thêm<i class="icon icon-ns-arrow-right"></i>
                                        </a>
                                    </div>
                                </div><!--banner-content-->
                                <a href="{{ route('albums.show', ['album_id' => $album->album_id]) }}"><img
                                        src="{{ asset('images/albums/' . ($album->cover_image_url ?? 'default.png')) }}"
                                        alt="banner" class="banner-image" style="width: 500px;height: auto;"></a>


                            </div><!--slider-item-->
                        @endforeach
                    </div><!--slider-->

                    <button class="next slick-arrow">
                        <i class="icon icon-arrow-right"></i>
                    </button>

                </div>
            </div>
        </div>

    </section>

    <section id="client-holder" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="inner-content">
                    <div class="logo-wrap">
                        <div class="row text-center">
                            <div class="col-3">
                                <a href="#"><img src="images/ui/cd.png" alt="client" class="img-fluid"></a>
                            </div>
                            <div class="col-3">
                                <a href="#"><img src="images/ui/guitar.png" alt="client" class="img-fluid"></a>
                            </div>
                            <div class="col-3">
                                <a href="#"><img src="images/ui/vinyl_1.png" alt="client" class="img-fluid"></a>
                            </div>
                            <div class="col-3">
                                <a href="#"><img src="images/ui/dvd-player.png" alt="client" class="img-fluid"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="featured" class="py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header align-center">
                        <div class="title">
                            <span>Some quality genres</span>
                        </div>
                        <h2 class="section-title">Thể loại gợi ý</h2>
                    </div>

                    <div class="product-list" data-aos="fade-up">
                        <div class="row">
                            @foreach ($featuredGenres as $genre)
                                <div class="col-md-3 col-6">
                                    <div class="product-item text-center">
                                        <figure class="product-style">
                                            <a href="{{ url('/genres/' . $genre->slug) }}">
                                                <img src="{{ asset('images/genre/' . ($genre->image_path ?? 'default.png')) }}"
                                                    alt="{{ $genre->genre_name }}" class="product-item"
                                                    style="aspect-ratio:1/1;object-fit:cover;">
                                            </a>
                                        </figure>
                                        <figcaption>
                                            <h3>{{ $genre->genre_name }}</h3>
                                            {{-- <div class="item-price">{{ $genre->description }}</div> --}}
                                        </figcaption>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div><!--grid-->

                </div><!--inner-content-->
            </div>
        </div>
    </section>

    {{-- <section id="featured" class="py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header align-center">
                        <div class="title">
                            <span>Some quality items</span>
                        </div>
                        <h2 class="section-title">Featured Disc</h2>
                    </div>

                    <div class="product-list" data-aos="fade-up">
                        <div class="row">

                            <div class="col-md-3">
                                <div class="product-item">
                                    <figure class="product-style">
                                        <img src="images/product-item1.jpg" alt="Books" class="product-item">
                                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                                            Cart</button>
                                    </figure>
                                    <figcaption>
                                        <h3>Simple way of piece life</h3>
                                        <span>Armor Ramsey</span>
                                        <div class="item-price">$ 40.00</div>
                                    </figcaption>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="product-item">
                                    <figure class="product-style">
                                        <img src="images/product-item2.jpg" alt="Books" class="product-item">
                                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                                            Cart</button>
                                    </figure>
                                    <figcaption>
                                        <h3>Great travel at desert</h3>
                                        <span>Sanchit Howdy</span>
                                        <div class="item-price">$ 38.00</div>
                                    </figcaption>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="product-item">
                                    <figure class="product-style">
                                        <img src="images/product-item3.jpg" alt="Books" class="product-item">
                                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                                            Cart</button>
                                    </figure>
                                    <figcaption>
                                        <h3>The lady beauty Scarlett</h3>
                                        <span>Arthur Doyle</span>
                                        <div class="item-price">$ 45.00</div>
                                    </figcaption>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="product-item">
                                    <figure class="product-style">
                                        <img src="images/product-item4.jpg" alt="Books" class="product-item">
                                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                                            Cart</button>
                                    </figure>
                                    <figcaption>
                                        <h3>Once upon a time</h3>
                                        <span>Klien Marry</span>
                                        <div class="item-price">$ 35.00</div>
                                    </figcaption>
                                </div>
                            </div>

                        </div><!--ft-books-slider-->
                    </div><!--grid-->


                </div><!--inner-content-->
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="btn-wrap align-right">
                        <a href="#featured" class="btn-accent-arrow">View all products <i
                                class="icon icon-ns-arrow-right"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </section> --}}

    <section id="best-selling" class="leaf-pattern-overlay">
        <div class="corner-pattern-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-6 mx-auto">
                            <figure class="products-thumb">
                                <img src="{{ asset('images/albums/' . ($bestSeller->cover_image_url ?? 'default.png')) }}"
                                    alt="{{ $bestSeller->album_name }}" class="single-image">
                            </figure>
                        </div>
                        <div class="col-md-6 ">
                            <div class="product-entry ">
                                <h2 class="section-title divider">Best Selling Album</h2>
                                <div class="products-content">
                                    <div class="author-name">By {{ $bestSeller->artist_name }}</div>
                                    <h3 class="item-title">{{ $bestSeller->album_name }}</h3>
                                    <p>Là album được nhiều khách hàng ưa chuộng và có doanh số
                                        cao nhất trong cửa hàng hoặc trên nền tảng bán hàng.</p>
                                    <div class="item-price">{{ number_format($bestSeller->price, 0) }}đ</div>
                                    {{-- <div class="sold-count">Đã bán: {{ $bestSeller->total_sold }}</div> --}}
                                    <div class="btn-wrap">
                                        <a href="{{ route('albums.show', ['album_id' => $bestSeller->album_id]) }}"
                                            class="btn-accent-arrow">
                                            Xem chi tiết <i class="icon icon-ns-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- / row -->
                </div>
            </div>
        </div>
    </section>


    <section id="quotation" class="align-center pb-5 mb-5 mt-5">
        <div class="inner-content">
            <h2 class="section-title divider">Trích dẫn trong ngày</h2>
            <blockquote data-aos="fade-up">
                <q>Âm thanh từ đĩa than không hoàn hảo, nhưng chính sự thô mộc ấy lại khiến ta thấy thật gần gũi và chân
                    thật.</q>
                <div class="author-name">Dr. Seuss</div>
            </blockquote>
        </div>
    </section>


    <section id="special-offer" class="bookshelf pb-5 mb-5">
        <div class="section-header align-center">
            <div class="title">
                <span>Grab your opportunity</span>
            </div>
            <h2 class="section-title">Sản phẩm mới</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="inner-content">
                    <div class="product-list" data-aos="fade-up">
                        <div class="grid product-grid">
                            @foreach ($latestAlbums as $album)
                                <a href="{{ route('albums.show', ['album_id' => $album->album_id]) }}">
                                    <div class="product-item">
                                        <figure class="product-style">

                                            <img src="{{ asset('images/albums/' . ($album->cover_image_url ?? 'default.png')) }}"
                                                alt="{{ $album->album_name }}" class="product-item">

                                            {{-- Nếu muốn có nút thêm vào giỏ hàng, bỏ comment dòng dưới --}}
                                            <button type="button" class="add-to-cart"
                                                data-product-tile="add-to-cart">Thêm
                                                vào giỏ hàng</button>
                                        </figure>
                                        <figcaption>
                                            <h3>{{ $album->album_name }}</h3>
                                            <span>{{ $album->artist_name }}</span>
                                            <div class="item-price">{{ number_format($album->price, 0) }}đ</div>
                                            {{-- Nếu muốn hiển thị ngày phát hành --}}
                                            {{-- <div class="release-date text-muted" style="font-size: 0.9em;">
                                        {{ \Carbon\Carbon::parse($album->release_date)->format('d/m/Y') }}
                                    </div> --}}
                                        </figcaption>
                                    </div>
                                </a>
                            @endforeach

                        </div>
                    </div><!--grid-->
                    <div class="btn-wrap text-end">
                        <a href="{{ route('shop.index', ['sort' => 'newest']) }}"
                            class="btn btn-outline-accent btn-accent-arrow">
                            Xem thêm<i class="icon icon-ns-arrow-right"></i>
                        </a>
                    </div>
                </div><!--inner-content-->
            </div>
        </div>
    </section>
    {{-- <section id="special-offer" class="bookshelf pb-5 mb-5">

        <div class="section-header align-center">
            <div class="title">
                <span>Grab your opportunity</span>
            </div>
            <h2 class="section-title">Books with offer</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="inner-content">
                    <div class="product-list" data-aos="fade-up">
                        <div class="grid product-grid">
                            <div class="product-item">
                                <figure class="product-style">
                                    <img src="images/product-item5.jpg" alt="Books" class="product-item">
                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                                        Cart</button>
                                </figure>
                                <figcaption>
                                    <h3>Simple way of piece life</h3>
                                    <span>Armor Ramsey</span>
                                    <div class="item-price">
                                        <span class="prev-price">$ 50.00</span>$ 40.00
                                    </div>
                            </div>
                            </figcaption>

                            <div class="product-item">
                                <figure class="product-style">
                                    <img src="images/product-item6.jpg" alt="Books" class="product-item">
                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                                        Cart</button>
                                </figure>
                                <figcaption>
                                    <h3>Great travel at desert</h3>
                                    <span>Sanchit Howdy</span>
                                    <div class="item-price">
                                        <span class="prev-price">$ 30.00</span>$ 38.00
                                    </div>
                            </div>
                            </figcaption>

                            <div class="product-item">
                                <figure class="product-style">
                                    <img src="images/product-item7.jpg" alt="Books" class="product-item">
                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                                        Cart</button>
                                </figure>
                                <figcaption>
                                    <h3>The lady beauty Scarlett</h3>
                                    <span>Arthur Doyle</span>
                                    <div class="item-price">
                                        <span class="prev-price">$ 35.00</span>$ 45.00
                                    </div>
                            </div>
                            </figcaption>

                            <div class="product-item">
                                <figure class="product-style">
                                    <img src="images/product-item8.jpg" alt="Books" class="product-item">
                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                                        Cart</button>
                                </figure>
                                <figcaption>
                                    <h3>Once upon a time</h3>
                                    <span>Klien Marry</span>
                                    <div class="item-price">
                                        <span class="prev-price">$ 25.00</span>$ 35.00
                                    </div>
                            </div>
                            </figcaption>

                            <div class="product-item">
                                <figure class="product-style">
                                    <img src="images/product-item2.jpg" alt="Books" class="product-item">
                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                                        Cart</button>
                                </figure>
                                <figcaption>
                                    <h3>Simple way of piece life</h3>
                                    <span>Armor Ramsey</span>
                                    <div class="item-price">$ 40.00</div>
                                </figcaption>
                            </div>
                        </div><!--grid-->
                    </div>
                </div><!--inner-content-->
            </div>
        </div>
    </section> --}}

    {{-- <section id="subscribe">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-8">
                    <div class="row">

                        <div class="col-md-6">

                            <div class="title-element">
                                <h2 class="section-title divider">Subscribe to our newsletter</h2>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="subscribe-content" data-aos="fade-up">
                                <p>Sed eu feugiat amet, libero ipsum enim pharetra hac dolor sit amet, consectetur. Elit
                                    adipiscing enim pharetra hac.</p>
                                <form id="form">
                                    <input type="text" name="email" placeholder="Enter your email addresss here">
                                    <button class="btn-subscribe">
                                        <span>send</span>
                                        <i class="icon icon-send"></i>
                                    </button>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section> --}}

    {{-- <section id="latest-blog" class="py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header align-center">
                        <div class="title">
                            <span>Read our articles</span>
                        </div>
                        <h2 class="section-title">Latest Articles</h2>
                    </div>

                    <div class="row">

                        <div class="col-md-4">

                            <article class="column" data-aos="fade-up">

                                <figure>
                                    <a href="#" class="image-hvr-effect">
                                        <img src="images/post-img1.jpg" alt="post" class="post-image">
                                    </a>
                                </figure>

                                <div class="post-item">

                                    <h3><a href="#">Reading books always makes the moments happy</a></h3>

                                    <div class="links-element">
                                        <div class="categories">inspiration</div>
                                        <div class="social-links">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="icon icon-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon icon-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon icon-behance-square"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!--links-element-->

                                </div>
                            </article>

                        </div>
                        <div class="col-md-4">

                            <article class="column" data-aos="fade-up" data-aos-delay="200">
                                <figure>
                                    <a href="#" class="image-hvr-effect">
                                        <img src="images/post-img2.jpg" alt="post" class="post-image">
                                    </a>
                                </figure>
                                <div class="post-item">

                                    <h3><a href="#">Reading books always makes the moments happy</a></h3>

                                    <div class="links-element">
                                        <div class="categories">inspiration</div>
                                        <div class="social-links">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="icon icon-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon icon-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon icon-behance-square"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!--links-element-->

                                </div>
                            </article>

                        </div>
                        <div class="col-md-4">

                            <article class="column" data-aos="fade-up" data-aos-delay="400">
                                <figure>
                                    <a href="#" class="image-hvr-effect">
                                        <img src="images/post-img3.jpg" alt="post" class="post-image">
                                    </a>
                                </figure>
                                <div class="post-item">

                                    <h3><a href="#">Reading books always makes the moments happy</a></h3>

                                    <div class="links-element">
                                        <div class="categories">inspiration</div>
                                        <div class="social-links">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="icon icon-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon icon-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="icon icon-behance-square"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!--links-element-->

                                </div>
                            </article>

                        </div>

                    </div>

                    <div class="row">

                        <div class="btn-wrap align-center">
                            <a href="#" class="btn btn-outline-accent btn-accent-arrow" tabindex="0">Read All
                                Articles<i class="icon icon-ns-arrow-right"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section> --}}
@endsection
