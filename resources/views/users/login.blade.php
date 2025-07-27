@extends('users.index')

@section('content')
    <div class="login-container">
        <div class="login-box">
            {{-- <img src="https://upload.wikimedia.org/wikipedia/commons/1/19/Spotify_logo_without_text.svg" class="login-logo"
                alt="Spotify Logo"> --}}
            <h2 class="login-title">ĐĂNG NHẬP TÀI KHOẢN</h2>

            <div class="login-social">
                <button class="login-btn login-google" onclick="window.location='{{ route('login.google') }}'">
                    <svg width="20" height="20" viewBox="0 0 48 48" style="vertical-align:middle;margin-right:8px;">
                        <g>
                            <path fill="#EA4335"
                                d="M24 9.5c3.54 0 6.71 1.22 9.21 3.23l6.9-6.9C35.64 1.98 30.17 0 24 0 14.82 0 6.73 5.82 2.69 14.09l8.06 6.26C12.6 13.99 17.83 9.5 24 9.5z" />
                            <path fill="#4285F4"
                                d="M46.1 24.55c0-1.64-.15-3.22-.43-4.74H24v9.01h12.41c-.54 2.91-2.18 5.38-4.65 7.04l7.19 5.6C43.97 37.41 46.1 31.5 46.1 24.55z" />
                            <path fill="#FBBC05"
                                d="M10.75 28.35c-1.02-2.99-1.02-6.21 0-9.2l-8.06-6.26C.67 17.41 0 20.62 0 24s.67 6.59 1.89 9.11l8.86-6.76z" />
                            <path fill="#34A853"
                                d="M24 48c6.17 0 11.64-2.04 15.52-5.54l-7.19-5.6c-2.01 1.35-4.59 2.15-8.33 2.15-6.17 0-11.39-4.49-13.25-10.5l-8.86 6.76C6.73 42.18 14.82 48 24 48z" />
                            <path fill="none" d="M0 0h48v48H0z" />
                        </g>
                    </svg>Continue with Google</button>

            </div>

            <p class="login-signup">Hoặc</p>
            <form class="login-form">
                <label for="username" class="login-label">Nhập email của bạn</label>
                <input type="text" id="username" class="login-input" placeholder="Nhập Email của bạn">
                <button type="submit" class="login-submit">Nhận Passcode</button>
            </form>

            <p class="login-signup">
                Với việc ấn vào đăng nhập, bạn đã đồng ý với<br> <a href="" class="login-link">Điều khoản của chúng
                    tôi</a>
            </p>
        </div>
    </div>
@endsection
