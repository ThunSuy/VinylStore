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
                <button class="login-btn login-facebook"><svg width="20" height="20" viewBox="0 0 32 32"
                        style="vertical-align:middle;margin-right:8px;">
                        <path fill="#1877F3"
                            d="M32 16.1C32 7.2 24.8 0 16 0S0 7.2 0 16.1c0 8 5.8 14.6 13.3 15.8v-11.2h-4v-4.6h4v-3.5c0-4 2.4-6.2 6-6.2 1.7 0 3.5.3 3.5.3v3.8h-2c-2 0-2.6 1.2-2.6 2.4v2.9h4.4l-.7 4.6h-3.7v11.2C26.2 30.7 32 24.1 32 16.1z" />
                        <path fill="#FFF"
                            d="M22.3 20.7l.7-4.6h-4.4v-2.9c0-1.2.6-2.4 2.6-2.4h2v-3.8s-1.8-.3-3.5-.3c-3.6 0-6 2.2-6 6.2v3.5h-4v4.6h4v11.2c.8.1 1.6.2 2.5.2s1.7-.1 2.5-.2V20.7h3.7z" />
                    </svg>Continue with Facebook</button>
                <button class="login-btn login-apple"> <svg width="20" height="20" viewBox="0 0 24 24"
                        style="vertical-align:middle;margin-right:8px;">
                        <path fill="#1DA1F2"
                            d="M22.46 5.924c-.793.352-1.645.59-2.538.697a4.48 4.48 0 0 0 1.965-2.475 8.94 8.94 0 0 1-2.828 1.082A4.48 4.48 0 0 0 16.11 4c-2.485 0-4.5 2.015-4.5 4.5 0 .353.04.698.117 1.028C7.728 9.36 4.1 7.6 1.671 5.149c-.387.664-.61 1.437-.61 2.262 0 1.56.794 2.936 2.003 3.744a4.48 4.48 0 0 1-2.037-.563v.057c0 2.18 1.55 4.002 3.604 4.417a4.5 4.5 0 0 1-2.03.077c.573 1.788 2.236 3.09 4.206 3.124A8.98 8.98 0 0 1 2 19.54a12.68 12.68 0 0 0 6.88 2.017c8.26 0 12.785-6.84 12.785-12.785 0-.195-.004-.39-.013-.583A9.14 9.14 0 0 0 24 4.59a8.97 8.97 0 0 1-2.54.697z" />
                    </svg>Continue with Twitter</button>
            </div>

            {{-- <form class="login-form">
                <label for="username" class="login-label">Email or username</label>
                <input type="text" id="username" class="login-input" placeholder="Email or username">
                <button type="submit" class="login-submit">Continue</button>
            </form> --}}

            <p class="login-signup">
                Với việc ấn vào đăng nhập, bạn đã đồng ý với<br> <a href="" class="login-link">Điều khoản của chúng
                    tôi</a>
            </p>
        </div>
    </div>
@endsection
