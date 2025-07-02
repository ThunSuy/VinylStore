@extends('users.index')
@include('components.toast')

@section('content')
    <div class="cart-container">
        <div id="message-container" style="position: fixed; top: 20px; right: 20px; z-index: 9999;"></div>

        <!-- Breadcrumb -->
        <div class="cart-breadcrumb-container">
            <div class="cart-breadcrumb">
                <span class="cart-breadcrumb-item cart-active">GIỎ HÀNG</span>
                <span class="cart-breadcrumb-arrow">›</span>
                <span class="cart-breadcrumb-item">CHI TIẾT THANH TOÁN</span>
                <span class="cart-breadcrumb-arrow">›</span>
                <span class="cart-breadcrumb-item">HOÀN THÀNH ĐƠN HÀNG</span>
            </div>
        </div>

        <!-- Main Cart Layout -->
        <div class="cart-main">
            <!-- Cart Table -->
            <div class="cart-left">
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>SẢN PHẨM</th>
                            <th>GIÁ</th>
                            <th>SỐ LƯỢNG</th>
                            <th>TẠM TÍNH</th>
                            <th></th>

                        </tr>
                    </thead>

                    <tbody>
                        @forelse($cart as $item)
                            <tr>
                                <td>
                                    <div class="cart-product-info">
                                        <a
                                            href="{{ route('albums.show', ['album_id' => $item->album_id ?? $item['album_id']]) }}">
                                            <img src="{{ asset('images/albums/' . ($item->cover_image_url ?? $item['cover_image_url'])) }}"
                                                alt="logo">
                                        </a>
                                        <span>{{ $item->album_name ?? $item['album_name'] }}</span>
                                    </div>
                                </td>
                                <td>{{ number_format($item->price ?? $item['price'], 0) }} ₫</td>
                                <td>


                                    <div class="cart-quantity" data-album-id="{{ $item->album_id ?? $item['album_id'] }}">
                                        @if (auth()->check())
                                            <button class="qty-decrease">-</button>
                                            <input type="number" value="{{ $item->qty }}" style="height: 42px"
                                                disabled />
                                            <button class="qty-increase">+</button>
                                        @else
                                            {{-- Chưa đăng nhập – xử lý qua localStorage + cookie --}}
                                            <button onclick="decreaseGuest({{ $item['album_id'] }})">-</button>
                                            <input type="number" id="qty-{{ $item['album_id'] }}" style="height: 42px"
                                                value="{{ $item['qty'] }}" disabled />
                                            <button onclick="increaseGuest({{ $item['album_id'] }})">+</button>
                                        @endif
                                    </div>

                                </td>
                                <td style="color: black" class="item-subtotal">
                                    {{ number_format(($item->price ?? $item['price']) * ($item->qty ?? $item['qty']), 0) }}
                                    ₫</td>
                                <td>
                                    @if (auth()->check())
                                        <form method="POST"
                                            action="{{ route('cart.delete', ['album_id' => $item->album_id]) }}"
                                            style="display:inline;" id="delete-cart-{{ $item->album_id }}">
                                            @csrf
                                            @method('DELETE')
                                            <i class="icon icon-cancel text-danger" style="cursor:pointer;" title="Xóa"
                                                onclick="document.getElementById('delete-cart-{{ $item->album_id }}').submit();"></i>
                                        </form>
                                    @else
                                        <i class="icon icon-cancel text-danger"
                                            onclick="removeCartItem({{ $item['album_id'] }})" title="Xóa"></i>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Giỏ hàng trống</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>

                <div class="cart-buttons">
                    <button class="cart-btn cart-btn-outline" onclick="history.back()">← TRỞ VỀ TRANG TRƯỚC ĐÓ</button>
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="cart-right">
                <div class="cart-summary">
                    <h3>TỔNG CỘNG GIỎ HÀNG</h3>
                    <div class="cart-summary-item">
                        <span>Tạm tính</span>
                        <span style="color: black" id="cart-subtotal">0 ₫</span>
                    </div>

                    <div class="cart-shipping">
                        <h3><br />Phương thức giao hàng</h3>
                        <label style="margin: 0">
                            <input type="radio" name="shipping_method" value="30000" checked style="margin: 0" />
                            Giao hàng tiêu chuẩn: 30.000 ₫
                        </label>
                        <small>Từ 5 - 10 ngày</small>
                        <br />
                        <br />
                        <label style="margin: 0">
                            <input type="radio" name="shipping_method" value="0" style="margin: 0" />
                            Giao hàng miễn phí
                        </label>
                        <small>Từ 15 - 20 ngày</small>
                    </div>

                    <div class="cart-summary-item cart-total">
                        <span>Tổng</span>
                        <span style="color: black">0 ₫</span>
                    </div>
                    <button class="cart-btn cart-btn-full" id="checkout-btn">TIẾN HÀNH THANH TOÁN</button>
                    {{-- <div class="cart-discount">
                        <p style="margin-bottom:20px">🔖 Mã ưu đãi</p>
                        <input type="text" placeholder="Nhập mã giảm giá" />
                        <button class="cart-btn cart-btn-outline">Áp dụng</button>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/users/cart-guest.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const url = new URL(window.location.href);
            if (url.searchParams.get('r') === '1') {
                location.href = url.pathname; // reload sạch query
            }
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.qty-increase').forEach(btn => {
                btn.addEventListener('click', () => {
                    updateQty(btn, 'increase');
                });
            });

            document.querySelectorAll('.qty-decrease').forEach(btn => {
                btn.addEventListener('click', () => {
                    updateQty(btn, 'decrease');
                });
            });

            function updateQty(button, type) {
                const parent = button.closest('.cart-quantity');
                const albumId = parent.getAttribute('data-album-id');
                const input = parent.querySelector('input');

                fetch(`{{ route('cart.ajaxUpdate') }}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            album_id: albumId,
                            type: type
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.removed) {
                            // Xóa dòng HTML
                            parent.closest('tr').remove();
                        } else if (data.new_qty !== undefined) {
                            input.value = data.new_qty;
                            // Cập nhật tạm tính nếu muốn:
                            const priceCell = parent.closest('tr').querySelectorAll('td')[1];
                            const price = parseInt(priceCell.textContent.replace(/[^\d]/g, ''));
                            const subtotalCell = parent.closest('tr').querySelectorAll('td')[3];
                            subtotalCell.textContent = (price * data.new_qty).toLocaleString() + ' ₫';
                        }
                        window.calculateSubtotalAndTotal();

                    })
                    .catch(err => {
                        console.error('Lỗi:', err);
                    });
            }
        });
    </script>

    <script>
        document.getElementById('checkout-btn').addEventListener('click', function(e) {
            e.preventDefault();
            @if (auth()->check())
                // Đã đăng nhập: chuyển sang trang checkout
                const shipping = document.querySelector('input[name="shipping_method"]:checked').value;
                window.location.href = "{{ url('/checkout') }}" + "?shipping=" + shipping;
            @else
                // Chưa đăng nhập: alert và chuyển sang trang đăng nhập
                alert('Vui lòng đăng nhập để tiến hành thanh toán!');
                window.location.href = "{{ route('login') }}";
            @endif
        });

        function updateCheckoutVisibility() {
            const rows = document.querySelectorAll('.cart-table tbody tr');
            const checkoutBtn = document.getElementById('checkout-btn');
            const isEmpty = rows.length === 1 && rows[0].textContent.includes('Giỏ hàng trống');

            if (checkoutBtn) {
                checkoutBtn.style.display = isEmpty ? 'none' : 'block';
            }
        }

        // Gọi khi load
        document.addEventListener('DOMContentLoaded', () => {
            updateCheckoutVisibility();

            // Sau khi nhấn tăng/giảm số lượng
            document.querySelectorAll('.qty-increase, .qty-decrease').forEach(btn => {
                btn.addEventListener('click', () => {
                    setTimeout(updateCheckoutVisibility, 200); // Delay để chờ DOM cập nhật
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const SHIPPING_FEE = 30000; // Giao hàng tiêu chuẩn

            function parsePrice(priceString) {
                return parseInt(priceString.replace(/[^\d]/g, '')) || 0;
            }

            function formatPrice(num) {
                return num.toLocaleString('vi-VN') + ' ₫';
            }

            function calculateSubtotalAndTotal() {
                let subtotal = 0;

                document.querySelectorAll('.item-subtotal').forEach(cell => {
                    subtotal += parsePrice(cell.textContent);
                });

                // Lấy phí ship từ radio
                const selectedShipping = document.querySelector('input[name="shipping_method"]:checked');
                const shippingFee = selectedShipping ? parseInt(selectedShipping.value) : 0;

                const total = subtotal + shippingFee;

                // Hiển thị
                document.getElementById('cart-subtotal').textContent = formatPrice(subtotal);
                const totalCell = document.querySelector('.cart-total span:last-child');
                if (totalCell) totalCell.textContent = formatPrice(total);
            }
            window.calculateSubtotalAndTotal = calculateSubtotalAndTotal;


            // Gọi khi load
            window.calculateSubtotalAndTotal();

            // Gọi lại khi có cập nhật từ nút + -
            document.querySelectorAll('.qty-increase, .qty-decrease').forEach(btn => {
                btn.addEventListener('click', () => {
                    setTimeout(window.calculateSubtotalAndTotal(),
                        100); // delay nhỏ để đợi fetch cập nhật DOM
                });
            });

            // Khi đổi phương thức giao hàng, tính lại tổng
            document.querySelectorAll('input[name="shipping_method"]').forEach(radio => {
                radio.addEventListener('change', window.calculateSubtotalAndTotal());
            });

        });
    </script>
@endsection
