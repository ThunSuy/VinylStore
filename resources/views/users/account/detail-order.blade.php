@extends('users.index')

@section('content')
    <div class="cart-container">
        <div class="cart-main" style="margin:0 auto;display: flex; justify-content: center;">
            <!-- Left: Order Info -->
            <div class="cart-left" style="width: 40%;">
                <h3><strong>THÔNG TIN ĐƠN HÀNG</strong></h3>

                <p><strong>Mã đơn hàng:</strong> OD{{ str_pad($order->order_id, 5, '0', STR_PAD_LEFT) }}</p>
                <p><strong>Thời gian đặt:</strong> {{ \Carbon\Carbon::parse($order->order_date)->format('d/m/Y H:i') }}</p>
                <p><strong>Địa chỉ giao hàng:</strong> {{ $order->shipping_address }}</p>
                <p><strong>Số điện thoại:</strong> {{ $user->phone }}</p>
                @if ($order->notes)
                    <p><strong>Ghi chú:</strong> {{ $order->notes }}</p>
                @endif
                <p><strong>Phương thức thanh toán:</strong>
                    {{ $order->payment_method_id == 1 ? 'VNPAY' : 'Tiền mặt' }}
                </p>
                <p><strong>Trạng thái:</strong>
                    @if ($order->order_status === 'cancelled')
                        <span class="status-cancelled">Đã hủy</span>
                    @else
                        @php
                            switch ($order->order_status) {
                                case 'pending':
                                    $status = 'Đang xử lý';
                                    break;
                                case 'paid':
                                    $status = 'Đã thanh toán';
                                    break;
                                case 'shipped':
                                    $status = 'Đang vận chuyển';
                                    break;
                                case 'completed':
                                    $status = 'Đã giao';
                                    break;
                                default:
                                    $status = 'Không xác định';
                            }
                        @endphp
                        <span class="status">{{ $status }}</span>
                    @endif
                </p>
            </div>

            <!-- Right: Order Items -->
            <div class="cart-right" style="width: 50%;">
                <div class="cart-summary">
                    <h3><strong>SẢN PHẨM</strong></h3>

                    @foreach ($orderItems as $item)
                        <div class="summary-item">
                            <div>
                                <img src="{{ asset('images/albums/' . $item->cover_image_url) }}" alt="logo">
                                <span>{{ $item->album_name }} × {{ $item->quantity }}</span>
                            </div>
                            <span>{{ number_format($item->unit_price, 0, ',', '.') }} ₫</span>
                        </div>
                    @endforeach

                    <div class="summary-item">
                        <span>Tạm tính</span>
                        <span>{{ number_format($subtotal, 0, ',', '.') }} ₫</span>
                    </div>
                    <div class="summary-item">
                        <span>Phí vận chuyển</span>
                        <span>{{ number_format($order->shipping_fee, 0, ',', '.') }} ₫</span>
                    </div>
                    <div class="summary-item total">
                        <strong>Tổng</strong>
                        <strong>{{ number_format($order->total_amount, 0, ',', '.') }} ₫</strong>
                    </div>
                </div>
            </div>
        </div>

        <div class="cart-buttons">
            <a href="{{ url('/purchase') }}">
                <button class="cart-btn cart-btn-outline">← TRỞ VỀ TRANG TRƯỚC ĐÓ</button>
            </a>
        </div>
    </div>
@endsection
