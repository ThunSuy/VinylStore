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

        <!-- Main Layout -->
        <div class="cart-main">
            <!-- Left: Billing Form -->
            <div class="cart-left" style="width: 60%;">
                <form action="/checkout/submit" method="POST" class="checkout-form">
                    <h3><strong>THÔNG TIN THANH TOÁN</strong></h3>
                    <p style="margin:0px;color:black"><strong>Địa chỉ *</strong></p>
                    <div class="form-row">
                        <input type="text" name="shipping_address" placeholder="Địa chỉ *" required />
                        <input type="text" name="address_extra" placeholder="Căn hộ, đơn vị (không bắt buộc)" />
                    </div>

                    <p style="margin:0px;color:black"><strong>Số điện thoại *</strong></p>
                    <input type="text" name="company_name" placeholder="Số điện thoại *" />

                    <p style="margin:0px;color:black"><strong>Tên công ty (tuỳ chọn)</strong></p>
                    <input type="text" name="company_name" placeholder="Tên công ty (tuỳ chọn)" />

                    <p style="margin:0px;color:black"><strong>Mã bưu điện (tuỳ chọn)</strong></p>
                    <input type="text" name="postal_code" placeholder="Mã bưu điện (tuỳ chọn)" />


                    <p style="margin:0px;color:black"><strong>Ghi chú đơn hàng (tuỳ chọn)</strong></p>
                    <textarea name="notes" placeholder="Ghi chú đơn hàng (tuỳ chọn)"></textarea>
                </form>
            </div>



            <!-- Right: Order Summary -->
            <div class="cart-right" style="width: 40%;">
                <div class="cart-summary">
                    <h3><strong>ĐƠN HÀNG CỦA BẠN</strong></h3>
                    <div class="summary-item">
                        <span>SẢN PHẨM</span>
                        <span>TẠM TÍNH</span>
                    </div>
                    <div class="summary-item">
                        <span>Linda McCartney - Wide Prairie × 1</span>
                        <span>850.000 ₫</span>
                    </div>
                    <div class="summary-item">
                        <span>Tạm tính</span>
                        <span>850.000 ₫</span>
                    </div>
                    <div class="summary-item">
                        <span>Giao hàng tiêu chuẩn</span>
                        <span>30.000 ₫</span>
                    </div>
                    <div class="summary-item total">
                        <strong>Tổng</strong>
                        <strong>880.000 ₫</strong>
                    </div>

                    <!-- Payment Method -->
                    <div class="payment-methods">
                        <label><input type="radio" name="payment_method_id" value="1" checked /> Chuyển khoản ngân
                            hàng
                            (Quét mã QR)</label>
                        <p class="payment-note">Thanh toán qua VietQR. Tự động xác nhận bởi SePay.</p>
                        <label><input type="radio" name="payment_method_id" value="2" /> Trả tiền mặt khi nhận
                            hàng</label>
                    </div>

                    <!-- Submit -->
                    <button class="cart-btn cart-btn-full">ĐẶT HÀNG</button>
                </div>
            </div>

        </div>
    </div>
@endsection
