@extends('users.index')

@section('content')
    <div class="purchase-container">
        <div class="purchase-search-bar">
            <form action="{{ route('purchase.search') }}" method="GET"
                style="display: flex;margin:0!important; width:100%!important;">
                <button type="submit" style="margin: 0; height:42px"><i class="icon icon-search"></i></button>
                <input type="text" name="keyword" style="margin: 0; height:42px"
                    placeholder="Bạn có thể tìm kiếm ID đơn hàng hoặc Tên Sản phẩm" value="{{ request('keyword') }}">
            </form>
        </div>


        @foreach ($orders as $order)
            <div class="order-box">
                <div class="store-info">
                    <div class="store-info-left">
                        <span class="tag">OD{{ str_pad($order->order_id, 5, '0', STR_PAD_LEFT) }}</span>
                        <span class="store-name">{{ \Carbon\Carbon::parse($order->order_date)->format('d/m/Y H:i') }}</span>
                    </div>
                    <div>
                        @if ($order->order_status === 'cancelled')
                            <span class="status-cancelled">Đã hủy</span>
                        @else
                            @php
                                switch ($order->order_status) {
                                    case 'pending':
                                        $left = 'Đang xử lý';
                                        $right = 'Chưa hoàn thành';
                                        break;
                                    case 'paid':
                                        $left = 'Đã thanh toán';
                                        $right = 'Chưa hoàn thành';
                                        break;
                                    case 'shipped':
                                        $left = 'Đang vận chuyển';
                                        $right = 'Chưa hoàn thành';
                                        break;
                                    case 'completed':
                                        $left = 'Đã giao';
                                        $right = 'Đã hoàn thành';
                                        break;
                                    default:
                                        $left = 'Không xác định';
                                        $right = '';
                                }
                            @endphp
                            <span class="status-success">{{ $left }}</span> |
                            <span class="status">{{ $right }}</span>
                        @endif
                    </div>

                </div>

                @foreach ($orderItems->where('order_id', $order->order_id) as $item)
                    <div class="order-item">
                        <img src="{{ asset('images/albums/' . $item->cover_image_url) }}" alt="Sản phẩm">
                        <div class="item-info">
                            <p>{{ $item->album_name }}</p>
                            <p class="muted">x{{ $item->quantity }}</p>
                        </div>
                        <div class="price">₫{{ number_format($item->unit_price, 0, ',', '.') }}</div>
                    </div>
                @endforeach

                <div class="order-footer">
                    <div class="actions">
                        <a href="{{ route('orders.detail', ['id' => $order->order_id]) }}">
                            <button type="button" class="cart-btn cart-btn-outline">Xem chi tiết đơn hàng</button>
                        </a>
                    </div>
                    <div>
                        <span class="price-total">₫{{ number_format($order->total_amount, 0, ',', '.') }}</span>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
@endsection
