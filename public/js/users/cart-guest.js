function addToCartGuest(product) {
    const cart = getGuestCart();

    // Ép kiểu an toàn
    product.qty = parseInt(product.qty) || 1;

    const found = cart.find(item => item.album_id === product.album_id);
    if (found) {
        found.qty += product.qty;
    } else {
        cart.push(product);
    }

    saveGuestCart(cart);
    customNotice('icon icon-clipboard', 'Đã thêm vào giỏ hàng!', 1);
}

function removeCartItem(album_id) {
    let cart = getGuestCart();
    cart = cart.filter(item => item.album_id !== album_id);
    saveGuestCart(cart, () => {
        window.location.reload();
    });
}



function getGuestCart() {
    const match = document.cookie.match(/(?:^|;\s*)cart=([^;]*)/);
    if (match) {
        try {
            const decoded = decodeURIComponent(match[1]);
            const parsed = JSON.parse(decoded);
            console.log('🛒 Cart từ cookie:', parsed);
            return parsed;
        } catch (e) {
            console.error("❌ Cookie hỏng – fallback sang localStorage:", e);
        }
    }

    // Fallback sang localStorage nếu cookie hỏng
    const local = localStorage.getItem('guest_cart');
    if (local) {
        try {
            const parsed = JSON.parse(local);
            console.log('🛒 Cart từ localStorage:', parsed);
            return parsed;
        } catch (e) {
            console.error("❌ Lỗi parse localStorage:", e);
        }
    }

    return [];
}

function saveGuestCart(cart, callback) {
    try {
        if (!Array.isArray(cart)) throw new Error('❌ Dữ liệu giỏ hàng không hợp lệ');

        const json = JSON.stringify(cart);
        const encoded = encodeURIComponent(json);

        // Kiểm tra chiều dài để tránh cookie quá lớn
        if (encoded.length > 4000) {
            console.warn("⚠️ Cookie quá dài, lưu sang localStorage");
            localStorage.setItem('guest_cart', json);
        } else {
            const isSecure = location.protocol === 'https:';
            const cookieString = `cart=${encoded}; path=/; max-age=604800; samesite=Lax${isSecure ? '; secure' : ''}`;
            document.cookie = cookieString;
            localStorage.removeItem('guest_cart'); // nếu trước đó dùng fallback
        }

        if (typeof callback === 'function') {
            setTimeout(callback, 50);
        }
    } catch (err) {
        console.error("❌ Lỗi khi lưu giỏ hàng:", err);
    }
}

function increaseGuest(albumId) {
    const cart = getGuestCart();
    const item = cart.find(i => i.album_id === albumId);
    if (item) {
        item.qty = parseInt(item.qty) || 1;
        item.qty += 1;
        saveGuestCart(cart, () => window.location.reload());
    }
}

function decreaseGuest(albumId) {
    const cart = getGuestCart();
    const index = cart.findIndex(i => i.album_id === albumId);
    if (index !== -1) {
        cart[index].qty = parseInt(cart[index].qty) || 1;
        if (cart[index].qty > 1) {
            cart[index].qty -= 1;
        } else {
            cart.splice(index, 1);
        }
        saveGuestCart(cart, () => window.location.reload());
    }
}
