@extends('users.index')

@section('content')
    <div class="cart-container">
        <!-- Breadcrumb -->
        <div class="cart-breadcrumb-container p-4">
            <div class="cart-breadcrumb">
                <span class="cart-breadcrumb-item">GIỎ HÀNG</span>
                <span class="cart-breadcrumb-arrow">›</span>
                <span class="cart-breadcrumb-item cart-active">CHI TIẾT THANH TOÁN</span>
                <span class="cart-breadcrumb-arrow">›</span>
                <span class="cart-breadcrumb-item">HOÀN THÀNH ĐƠN HÀNG</span>
            </div>
        </div>

        <!-- Main Layout -->
        <form action="{{ route('checkout.submit') }}" method="POST" class="checkout-form" style="padding:0; margin:0"
            novalidate>
            @csrf
            <div class="d-flex flex-column flex-lg-row cart-main gap-4 ">
                <!-- Left: Billing Form -->
                <div class="cart-left w-100 w-lg-70">
                    <h3><strong>THÔNG TIN THANH TOÁN</strong></h3>
                    <p style="margin:0px;color:black"><strong>Địa chỉ *</strong></p>
                    <div class="form-row">
                        <input type="text" name="shipping_address" placeholder="Địa chỉ *"
                            value="{{ old('shipping_address', $user->address ?? '') }}" />


                        <input type="text" name="address_extra" placeholder="Căn hộ, đơn vị (không bắt buộc)" />
                    </div>
                    @error('shipping_address')
                        <div style="color:red; font-size:14px; margin-top:0px;">{{ $message }}</div>
                    @enderror

                    <p style="margin:0px;color:black"><strong>Số điện thoại *</strong></p>
                    <input type="text" name="phone" placeholder="Số điện thoại *"
                        value="{{ old('phone', $user->phone ?? '') }}" />

                    @error('phone')
                        <div style="color:red; font-size:14px; margin-top:0px;">{{ $message }}</div>
                    @enderror

                    <p style="margin:0px;color:black"><strong>Ghi chú đơn hàng (tuỳ chọn)</strong></p>
                    <textarea name="notes" placeholder="Ghi chú đơn hàng (tuỳ chọn)"></textarea>
                </div>

                <!-- Right: Order Summary -->
                <div class="cart-right w-100 w-lg-30">
                    <div class="cart-summary">
                        <h3><strong>ĐƠN HÀNG CỦA BẠN</strong></h3>
                        <div class="summary-item">
                            <span style="color:black">SẢN PHẨM</span>
                            <span style="color:black">TẠM TÍNH</span>
                        </div>
                        @foreach ($cart as $item)
                            <div class="summary-item">
                                <div>
                                    <a href="{{ route('albums.show', ['album_id' => $item->album_id]) }}">
                                        <img src="{{ asset('images/albums/' . $item->cover_image_url) }}" alt="logo">
                                    </a>
                                    <span>{{ $item->album_name }} × {{ $item->quantity }}</span>
                                </div>

                                <span>{{ number_format($item->price * $item->quantity, 0, ',', '.') }} ₫</span>
                            </div>
                        @endforeach

                        @php
                            $subtotal = $cart->sum(function ($item) {
                                return $item->price * $item->quantity;
                            });
                            $shipping = request('shipping', 30000);
                            $total = $subtotal + $shipping;
                        @endphp
                        <div class="summary-item">
                            <span>Tạm tính</span>
                            <span>{{ number_format($subtotal, 0, ',', '.') }} ₫</span>
                        </div>
                        <div class="summary-item">
                            <span>Giao hàng tiêu chuẩn</span>
                            <span>{{ number_format($shipping, 0, ',', '.') }} ₫</span>
                        </div>

                        <div class="summary-item total">
                            <strong style="color:black">Tổng</strong>
                            <strong style="color:black">{{ number_format($total, 0, ',', '.') }} ₫</strong>
                        </div>

                        <!-- Payment Method -->
                        <div class="payment-methods">
                            <label class="payment-option">
                                <input type="radio" name="payment_method_id" value="1" checked />
                                <span>Thanh toán qua VNPAY</span>
                            </label>
                            <label class="payment-option">
                                <input type="radio" name="payment_method_id" value="2" />
                                <span>Thanh toán bằng tiền mặt</span>
                            </label>
                        </div>

                        <input type="hidden" name="shipping_fee" value="{{ $shipping }}">

                        <!-- Submit -->
                        <button class="cart-btn cart-btn-full">ĐẶT HÀNG</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="cart-buttons">
            <a href="{{ url('/cart') }}">
                <button class="cart-btn cart-btn-outline">← TRỞ VỀ TRANG TRƯỚC ĐÓ</button>

            </a>
        </div>
    </div>
@endsection
