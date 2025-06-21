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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/users/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('icomoon/icomoon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/users/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/users/style.css') }}">

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
                                    <a href="#"><i class="icon icon-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon icon-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon icon-youtube-play"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon icon-behance-square"></i></a>
                                </li>
                            </ul>
                        </div><!--social-links-->
                    </div>
                    <div class="col-md-6">
                        <div class="right-element">


                            <a href="#" class="cart for-buy"><i class="icon icon-clipboard"></i><span>Cart:(0
                                    $)</span></a>
                            <a href="#" class="user-account for-buy"><i
                                    class="icon icon-user"></i><span>Account</span></a>
                            <div class="action-menu">
                                <div class="search-bar">
                                    <a href="#" class="search-button search-toggle" data-selector="#header-wrap">
                                        <i class="icon icon-search"></i>
                                    </a>
                                    <form role="search" method="get" class="search-box">
                                        <input class="search-field text search-input" placeholder="Search"
                                            type="search">
                                    </form>
                                </div>

                            </div>

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
                            <a href="/index"><img src="{{ asset('images/main-logo.png') }}" alt="logo"></a>
                        </div>

                    </div>

                    <div class="col-md-10">

                        <nav id="navbar">
                            <div class="main-menu stellarnav">
                                <ul class="menu-list">
                                    {{-- <li class="menu-item active"><a href="/index">Home</a></li> --}}
                                    <li class="{{ request()->is('/') ? 'active' : '' }}">
                                        <a href="{{ url('/') }}">Home</a>
                                    </li>

                                    <li
                                        class="menu-item has-sub {{ request()->is('genres') || request()->is('genres/*') ? 'active' : '' }}">
                                        <a href="{{ route('genres.index') }}" class="nav-link">Genres</a>
                                        <ul>
                                            <li class="{{ request()->is('genres') ? 'active' : '' }}"><a
                                                    href="{{ route('genres.index') }}">ALL</a></li>
                                            @foreach ($genres as $genre)
                                                <li
                                                    class="{{ request()->is('genres/' . ($genre->slug ?? $genre->genre_id)) ? 'active' : '' }}">
                                                    <a
                                                        href="{{ url('/genres/' . ($genre->slug ?? $genre->genre_id)) }}">
                                                        {{ $genre->genre_name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    {{-- <li class="menu-item has-sub">
                                        <a href="{{ route('genres.index') }}" class="nav-link">Genres</a>

                                        <ul>
                                            <li class="active"><a href="">ALL</a></li>
                                            @foreach ($genres as $genre)
                                                <li>
                                                    <a
                                                        href="{{ url('/genres/' . ($genre->slug ?? $genre->genre_id)) }}">
                                                        {{ $genre->genre_name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>

                                    </li> --}}
                                    <li class="menu-item"><a href="#featured" class="nav-link">Featured</a></li>
                                    <li class="menu-item"><a href="#popular" class="nav-link">Popular</a></li>
                                    <li
                                        class="{{ request()->is('artists') || request()->is('artists/*') ? 'active' : '' }}">
                                        <a href="{{ route('artists.index') }}">Artists</a>
                                    </li>
                                    <li class="menu-item"><a href="#latest-blog" class="nav-link">Articles</a></li>
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
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sagittis sed ptibus liberolectus
                                nonet psryroin. Amet sed lorem posuere sit iaculis amet, ac urna. Adipiscing fames
                                semper erat ac in suspendisse iaculis.</p>
                        </div>
                    </div>

                </div>

                <div class="col-md-2">

                    <div class="footer-menu">
                        <h5>About Us</h5>
                        <ul class="menu-list">
                            <li class="menu-item">
                                <a href="#">vision</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">articles </a>
                            </li>
                            <li class="menu-item">
                                <a href="#">careers</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">service terms</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">donate</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-md-2">

                    <div class="footer-menu">
                        <h5>Discover</h5>
                        <ul class="menu-list">
                            <li class="menu-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Books</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Authors</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Subjects</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Advanced Search</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-md-2">

                    <div class="footer-menu">
                        <h5>My account</h5>
                        <ul class="menu-list">
                            <li class="menu-item">
                                <a href="#">Sign In</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">View Cart</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">My Wishtlist</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Track My Order</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-md-2">

                    <div class="footer-menu">
                        <h5>Help</h5>
                        <ul class="menu-list">
                            <li class="menu-item">
                                <a href="#">Help center</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Report a problem</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Suggesting edits</a>
                            </li>
                            <li class="menu-item">
                                <a href="#">Contact us</a>
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

                            <div class="col-md-6">
                                <p>© 2022 All rights reserved. Free HTML Template by <a
                                        href="https://www.templatesjungle.com/" target="_blank">TemplatesJungle</a>
                                </p>
                            </div>

                            <div class="col-md-6">
                                <div class="social-links align-right">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="icon icon-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icon icon-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icon icon-youtube-play"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="icon icon-behance-square"></i></a>
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

    <script src="{{ asset('js/users/jquery-1.11.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/users/plugins.js') }}"></script>
    <script src="{{ asset('js/users/script.js') }}"></script>

</body>

</html>
