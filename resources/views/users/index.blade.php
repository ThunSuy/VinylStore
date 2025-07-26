<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vinyl Store</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/users/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('icomoon/icomoon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/users/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/users/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/users/login.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/users/profile.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/users/cart.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/users/purchase.css') }}">


</head>

<body data-bs-spy="scroll" data-bs-target="#header" tabindex="0">
    <div id="header-wrap">

        <div class="top-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="social-links">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/minhthuan.le.71619/?locale=vi_VN"><i
                                            class="icon icon-facebook"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="icon icon-twitter"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="icon icon-youtube-play"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="icon icon-behance-square"></i></a>
                                </li>
                            </ul>
                        </div><!--social-links-->
                    </div>
                    <div class="col-md-6">
                        <div class="right-element">


                            {{-- Search --}}
                            <div class="action-menu">
                                <div class="search-bar">
                                    <a href="#" class="search-button search-toggle " data-selector="#header-wrap">
                                        <i class="icon icon-search"></i>
                                    </a>
                                    <form role="search" method="get" class="search-box"
                                        action="{{ route('shop.index') }}">
                                        <input class="search-field text search-input" name="q"
                                            placeholder="Bạn muốn tìm gì .." type="search"
                                            value="{{ request('q') }}">
                                    </form>
                                </div>

                            </div>


                            {{-- Cart --}}
                            <a href="{{ url('/cart') }}" class="cart for-buy"><i
                                    class="icon icon-clipboard"></i><span>Giỏ hàng</span></a>


                            {{-- Account --}}
                            @if (auth()->check())
                                <div class="account-menu-wrapper">
                                    <div class="user-account for-buy">
                                        <img src="{{ auth()->user()->avatar_url }}?v={{ strtotime(auth()->user()->updated_at) }}"
                                            alt="avatar"
                                            style="width:27px;height:27px;border-radius:50%;object-fit:cover;margin-right:3px;">
                                        <span>{{ auth()->user()->full_name ?? auth()->user()->email }}</span>
                                    </div>

                                    <ul class="account-dropdown">
                                        <li>

                                            <a href="{{ url('/account/profile') }}"><i class="icon icon-user"></i>
                                                Hồ sơ
                                                của tôi</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/purchase') }}"><i class="icon icon-clipboard"></i>
                                                Đơn
                                                hàng</a>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                                                @csrf
                                                <button type="submit" class="account-dropdown-btn"><i
                                                        class="icon icon-arrow-right-circle"></i> Đăng xuất</button>
                                            </form>
                                        </li>

                                    </ul>
                                </div>
                            @else
                                <a href="{{ route('login') }}" class="user-account for-buy">
                                    <i class="icon icon-user"></i>
                                    <span>Đăng nhập</span>
                                </a>
                            @endif

                        </div><!--top-right-->
                    </div>

                </div>
            </div>
        </div><!--top-content-->

        <header id="header">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-2">
                        <div class="main-logo">
                            <a href="/index"><img class="img-fluid" src="{{ asset('images/main-logo.png') }}"
                                    alt="logo"></a>
                        </div>

                    </div>

                    <div class="col-md-10">

                        <nav id="navbar">
                            <div class="main-menu stellarnav">
                                <ul class="menu-list">

                                    {{-- item Home --}}
                                    <li class="{{ request()->is('/') ? 'active' : '' }}">
                                        <a href="{{ url('/') }}">Trang chủ</a>
                                    </li>

                                    <li
                                        class="menu-item {{ request()->is('shop') && request('sort') == 'newest' ? 'active' : '' }}">
                                        <a href="{{ route('shop.index', ['sort' => 'newest']) }}"
                                            class="nav-link">Mới nhất</a>
                                    </li>
                                    <li
                                        class="menu-item {{ request()->is('shop') && request('sort') != 'newest' ? 'active' : '' }}">
                                        <a href="{{ route('shop.index') }}" class="nav-link">Cửa hàng</a>
                                    </li>



                                    {{-- item Genres --}}
                                    <li
                                        class="menu-item has-sub {{ request()->is('genres') || request()->is('genres/*') ? 'active' : '' }}">
                                        <a href="{{ route('genres.index') }}" class="nav-link">Thể loại</a>
                                        <ul>
                                            <li class="{{ request()->is('genres') ? 'active' : '' }}">
                                                <a href="{{ route('genres.index') }}">ALL</a>
                                            </li>
                                            @foreach ($genres as $genre)
                                                <li
                                                    class="{{ request()->is('genres/' . $genre->slug) ? 'active' : '' }}">
                                                    <a href="{{ url('/genres/' . $genre->slug) }}">
                                                        {{ $genre->genre_name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>


                                    {{-- <li class="menu-item"><a href="#popular" class="nav-link">Popular</a></li> --}}


                                    {{-- item Artists --}}
                                    <li
                                        class="{{ request()->is('artists') || request()->is('artists/*') ? 'active' : '' }}">
                                        <a href="{{ route('artists.index') }}">Nghệ sĩ</a>
                                    </li>

                                    {{-- <li class="menu-item"><a href="#download-app" class="nav-link">Download App</a> --}}
                                    </li>
                                </ul>

                                <div class="hamburger">
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                </div>

                            </div>
                        </nav>

                    </div>

                </div>
            </div>
        </header>

    </div><!--header-wrap-->

    @yield('content')

    <footer id="footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4">

                    <div class="footer-item">
                        <div class="company-brand">
                            <img src="{{ asset('images/main-logo.png') }}" alt="logo" class="footer-logo">
                            <p>Vinyl Store – nơi âm nhạc trở lại nguyên bản. Chúng tôi mang đến những chiếc đĩa than
                                chất lượng, để bạn không chỉ nghe, mà còn cảm nhận trọn vẹn từng thanh âm mộc mạc, chân
                                thực như thuở ban đầu.</p>
                        </div>
                    </div>

                </div>

                <div class="col-md-2">

                    <div class="footer-menu">
                        <h5>About us</h5>
                        <ul class="menu-list">
                            <li class="menu-item">
                                <a href="">Tầm nhìn</a>
                            </li>
                            <li class="menu-item">
                                <a href="">Bài viết</a>
                            </li>
                            <li class="menu-item">
                                <a href="">Tổ chức</a>
                            </li>
                            <li class="menu-item">
                                <a href="">Điều khoản</a>
                            </li>
                            <li class="menu-item">
                                <a href="">Quyên tặng</a>
                            </li>
                        </ul>
                    </div>

                </div>

                <!-- filepath: resources/views/users/index.blade.php -->
                <div class="col-md-2">
                    <div class="footer-menu">
                        <h5>Pages</h5>
                        <ul class="menu-list">
                            <li class="menu-item">
                                <a href="{{ url('/') }}">Trang chủ</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('shop.index', ['sort' => 'newest']) }}">Mới nhất</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('shop.index') }}">Cửa hàng</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('genres.index') }}">Thể loại</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('artists.index') }}">Nghệ sĩ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="footer-menu">
                        <h5>My account</h5>
                        <ul class="menu-list">
                            <li class="menu-item">
                                <a href="{{ route('login') }}">Đăng nhập</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ url('/cart') }}">Giỏ hàng</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ auth()->check() ? url('/account/profile') : route('login') }}">Hồ sơ</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ auth()->check() ? url('/purchase') : route('login') }}">Đơn hàng</a>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- <div class="col-md-2">

                    <div class="footer-menu">
                        <h5>Pages</h5>
                        <ul class="menu-list">
                            <li class="menu-item">
                                <a href="#">Trang chủ</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Mới nhất</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Cửa hàng</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Thể loại</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Nghệ sĩ</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-md-2">

                    <div class="footer-menu">
                        <h5>My account</h5>
                        <ul class="menu-list">
                            <li class="menu-item">
                                <a href="#">Đăng nhập</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Giỏ hàng</a>
                            </li>

                            <li class="menu-item">
                                <a href="#">Đơn hàng</a>
                            </li>
                        </ul>
                    </div>

                </div> --}} <div class="col-md-2">

                    <div class="footer-menu">
                        <h5>Help</h5>
                        <ul class="menu-list">
                            <li class="menu-item">
                                <a href="">Trung tâm hỗ trợ</a>
                            </li>
                            <li class="menu-item">
                                <a href="">Báo cáo vấn đề</a>
                            </li>
                            <li class="menu-item">
                                <a href="">Đề xuất chỉnh sửa</a>
                            </li>
                            <li class="menu-item">
                                <a href="">Liên hệ chúng tôi</a>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
            <!-- / row -->

        </div>
    </footer>

    <div id="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="copyright">
                        <div class="row">

                            <div class="col-md-4">
                                <p>© 2022 All rights reserved. Free HTML Template by <a
                                        href="https://www.templatesjungle.com/" target="_blank">TemplatesJungle</a>
                                </p>
                            </div>

                            <div class="col-md-4">
                                <p class="text-danger">
                                    Sản phẩm này tạo ra nhằm mục đích học tập. Có vấn đề gì xin vui lòng liên hệ:
                                    <a href="mailto:leminhthuannn123@gmail.com"
                                        class="text-danger text-decoration-underline">leminhthuannn123@gmail.com</a>
                                </p>

                            </div>


                            <div class="col-md-4">
                                <div class="social-links align-right">
                                    <ul>
                                        <li>
                                            <a href="https://www.facebook.com/minhthuan.le.71619/?locale=vi_VN"><i
                                                    class="icon icon-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href=""><i class="icon icon-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href=""><i class="icon icon-youtube-play"></i></a>
                                        </li>
                                        <li>
                                            <a href=""><i class="icon icon-behance-square"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div><!--grid-->

                </div><!--footer-bottom-content-->
            </div>
        </div>
    </div>

    <button id="back-to-top"
        class="btn btn-dark rounded-circle shadow d-flex justify-content-center align-items-center"
        style="width: 45px; height: 45px; position: fixed; bottom: 20px; right: 20px; display: none; z-index: 999;"
        title="Lên đầu trang">
        <i class="bi bi-chevron-up"></i>
    </button>


    <script src="{{ asset('js/users/jquery-1.11.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/users/plugins.js') }}"></script>
    <script src="{{ asset('js/users/script.js') }}"></script>

</body>

</html>
