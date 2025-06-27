@extends('users.index')

@section('content')
    <div class="container py-5">
        <div class="text-center">
            @if (session('success'))
                <h2 class="text-success mb-3">🎉 {{ session('success') }}</h2>
            @elseif(session('error'))
                <h2 class="text-danger mb-3">❌ {{ session('error') }}</h2>
            @endif
            <a href="{{ url('/') }}" class="cart-btn cart-btn-full">Về trang chủ</a>
            <a href="{{ url('/shop') }}" class="cart-btn cart-btn-full">Tiếp tục mua sắm</a>
        </div>
    </div>
@endsection
