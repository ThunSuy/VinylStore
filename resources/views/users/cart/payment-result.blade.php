@extends('users.index')

@section('content')
    <!-- From Uiverse.io by Yaya12085 -->
    <div class="cart-container">
        <!-- Breadcrumb -->
        <div class="cart-breadcrumb-container p-4">
            <div class="cart-breadcrumb">
                <span class="cart-breadcrumb-item">GIỎ HÀNG</span>
                <span class="cart-breadcrumb-arrow">›</span>
                <span class="cart-breadcrumb-item">CHI TIẾT THANH TOÁN</span>
                <span class="cart-breadcrumb-arrow">›</span>
                <span class="cart-breadcrumb-item cart-active">HOÀN THÀNH ĐƠN HÀNG</span>
            </div>
        </div>
        <div class="card-result">
            {{-- <button class="dismiss-result" type="button">×</button> --}}

            <div class="header-result">
                @if (session('success'))
                    {{-- <h2 class="text-success mb-3">🎉 {{ session('success') }}</h2> --}}
                    <div class="image-result">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M20 7L9.00004 18L3.99994 13" stroke="#000000" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </svg>
                    </div>
                    <div class="content-result">
                        <span class="title-result">{{ session('success') }}</span>
                        <p class="message-result">Cảm ơn bạn đã tin tưởng và đặt hàng của chúng tôi, chúng ta sẽ cố gắng
                            hoàn
                            thành
                            và gửi đơn bạn đi sớm nhất.
                        </p>
                    </div>
                    <div class="actions-result">
                        <div class="actions-result">
                            <button class="history-result" type="button"
                                onclick="window.location.href='{{ url('/purchase') }}'">Xem đơn hàng</button>
                            <button class="track-result" type="button"
                                onclick="window.location.href='{{ url('/') }}'">Về
                                trang chủ</button>
                        </div>
                    </div>
                @elseif(session('error'))
                    <div class="image-result-err">

                        <svg width="64px" height="64px" viewBox="-0.5 0 25 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg" stroke="#9e0000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M3 21.32L21 3.32001" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M3 3.32001L21 21.32" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </g>
                        </svg>
                    </div>
                    <div class="content-result">
                        <span class="title-result-err">{{ session('error') }}</span>
                        <p class="message-result">Đơn hàng của bạn đã bị hủy.
                        </p>
                    </div>
                    <div class="actions-result">
                        <div class="actions-result">
                            <button class="history-result" type="button"
                                onclick="window.location.href='{{ url('/') }}'">Về
                                trang chủ</button>
                            <button class="track-result" type="button"
                                onclick="window.location.href='{{ url('/cart') }}'">Đặt
                                lại</button>

                        </div>
                    </div>
                @endif


            </div>
        </div>
    </div>


    <style>
        /* From Uiverse.io by Yaya12085 */
        .card-result {

            overflow: hidden;
            position: relative;
            text-align: left;
            border-radius: 0.5rem;
            margin: 50px auto;
            max-width: 490px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            background-color: #fff;
        }

        .dismiss-result {
            position: absolute;
            right: 10px;
            top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem 1rem;
            background-color: #fff;
            color: black;
            border: 2px solid #D1D5DB;
            font-size: 1rem;
            font-weight: 300;
            width: 30px;
            height: 30px;
            border-radius: 7px;
            transition: .3s ease;
        }

        .dismiss-result:hover {
            background-color: #ee0d0d;
            border: 2px solid #ee0d0d;
            color: #fff;
        }

        .header-result {
            padding: 1.25rem 1rem 1rem 1rem;
        }

        .image-result {
            display: flex;
            margin-left: auto;
            margin-right: auto;
            background-color: #e2feee;
            flex-shrink: 0;
            justify-content: center;
            align-items: center;
            width: 3rem;
            height: 3rem;
            border-radius: 9999px;
            animation: animate .6s linear alternate-reverse infinite;
            transition: .6s ease;
        }

        .image-result-err {
            display: flex;
            margin-left: auto;
            margin-right: auto;
            background-color: #d95454;
            flex-shrink: 0;
            justify-content: center;
            align-items: center;
            width: 3rem;
            height: 3rem;
            border-radius: 9999px;
            animation: animate .6s linear alternate-reverse infinite;
            transition: .6s ease;
        }

        .image-result svg {
            color: #0afa2a;
            width: 2rem;
            height: 2rem;
        }

        .image-result-err svg {
            color: #0afa2a;
            width: 2rem;
            height: 2rem;
        }

        .content-result {
            margin-top: 0.75rem;
            text-align: center;
        }

        .title-result {
            color: #066e29;
            font-size: 1rem;
            font-weight: 600;
            line-height: 1.5rem;
        }

        .title-result-err {
            color: rgb(120, 0, 0);
            font-size: 1rem;
            font-weight: 600;
            line-height: 1.5rem;
        }

        .message-result {
            margin-top: 0.5rem;
            color: #595b5f;
            font-size: 0.875rem;
            line-height: 1.25rem;
        }

        .actions-result {
            margin: 0.75rem 1rem;
        }

        .history-result {
            display: inline-flex;
            /* padding: 0.5rem 1rem; */
            background-color: #1aa06d;
            color: #ffffff;
            font-size: 1rem;
            line-height: 1.5rem;
            font-weight: 500;
            justify-content: center;
            align-items: center;
            width: 100%;
            border-radius: 0.375rem;
            border: none;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .track-result {
            display: inline-flex;
            margin-top: 0.75rem;
            /* padding: 0.5rem 1rem; */
            align-items: center;
            color: #242525;
            font-size: 1rem;
            line-height: 1.5rem;
            font-weight: 500;
            justify-content: center;
            width: 100%;
            border-radius: 0.375rem;
            border: 1px solid #D1D5DB;
            background-color: #fff;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        @keyframes animate {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.09);
            }
        }
    </style>
@endsection
