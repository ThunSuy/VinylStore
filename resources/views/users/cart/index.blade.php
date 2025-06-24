@extends('users.index')

@section('content')
    <div class="cart-container">
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="cart-product-info">
                                    <img src="{{ asset('images/main-logo.png') }}" alt="logo">
                                    <span>VA - Radiohead In Jazz</span>
                                </div>
                            </td>
                            <td>150.000 ₫</td>
                            <td>
                                <div class="cart-quantity">
                                    <button>-</button>
                                    <input type="number" value="1" />
                                    <button>+</button>
                                </div>
                            </td>
                            <td style="color: black">1.150.000 ₫</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="cart-product-info">
                                    <img src="{{ asset('images/main-logo.png') }}" alt="logo">
                                    <span>Linda McCartney - Wide Prairie (Milk White and Blue Limited Edition)</span>
                                </div>
                            </td>
                            <td>850.000 ₫</td>
                            <td>
                                <div class="cart-quantity">
                                    <button>-</button>
                                    <input type="number" value="2" />
                                    <button>+</button>
                                </div>
                            </td>
                            <td style="color: black">1.700.000 ₫</td>
                        </tr>
                    </tbody>
                </table>

                <div class="cart-buttons">
                    {{-- <a href="#" class="cart-btn cart-btn-outline">← TIẾP TỤC XEM SẢN PHẨM</a> --}}
                    <button class="cart-btn cart-btn-outline" onclick="history.back()">← TIẾP TỤC XEM SẢN PHẨM</button>
                    {{-- <button class="cart-btn">CẬP NHẬT GIỎ HÀNG</button> --}}
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="cart-right">
                <div class="cart-summary">
                    <h3>TỔNG CỘNG GIỎ HÀNG</h3>
                    <div class="cart-summary-item">
                        <span>Tạm tính</span>
                        <span style="color: black">2.850.000 ₫</span>
                    </div>
                    <div class="cart-shipping">
                        <p>Giao hàng</p>
                        <label><input type="radio" checked /> Giao hàng tiêu chuẩn: 30.000 ₫</label><br />
                        <label><input type="radio" /> Giao hàng miễn phí</label><br />
                        <small>Vận chuyển đến hcm, Ho Chi Minh 1234. <a href="#">Đổi địa chỉ</a></small>
                    </div>
                    <div class="cart-summary-item cart-total">
                        <span>Tổng</span>
                        <span style="color: black">2.880.000 ₫</span>
                    </div>
                    <button class="cart-btn cart-btn-full">TIẾN HÀNH THANH TOÁN</button>

                    <div class="cart-discount">
                        <p>🔖 Mã ưu đãi</p>
                        <input type="text" placeholder="Nhập mã giảm giá" />
                        <button class="cart-btn cart-btn-outline">Áp dụng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
