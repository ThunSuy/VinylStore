// public/js/users/cart-guest.js
function addToCartGuest(product) {
    let cart = [];
    if (document.cookie.split('; ').find(row => row.startsWith('cart='))) {
        cart = JSON.parse(decodeURIComponent(document.cookie.replace(/(?:(?:^|.*;\s*)cart\s*\=\s*([^;]*).*$)|^.*$/, "$1"))) || [];
    }
    let found = cart.find(item => item.album_id === product.album_id);
    if (found) {
        found.qty += product.qty;
    } else {
        cart.push(product);
    }
    document.cookie = "cart=" + encodeURIComponent(JSON.stringify(cart)) + ";path=/;max-age=604800";
    // alert('Đã thêm vào giỏ hàng!');
    customNotice('icon icon-clipboard', 'Đã thêm vào giỏ hàng!', 4);
}

function removeCartItem(album_id) {
    let cart = [];
    if (document.cookie.split('; ').find(row => row.startsWith('cart='))) {
        cart = JSON.parse(decodeURIComponent(document.cookie.replace(/(?:(?:^|.*;\s*)cart\s*\=\s*([^;]*).*$)|^.*$/, "$1"))) || [];
    }
    cart = cart.filter(item => item.album_id !== album_id);
    document.cookie = "cart=" + encodeURIComponent(JSON.stringify(cart)) + ";path=/;max-age=604800";
    location.reload();
    customNotice('icon icon-clipboard', 'Đã xóa khỏi giỏ hàng!', 4);
}

function getGuestCart() {
    return JSON.parse(localStorage.getItem('cart')) || [];
}

function saveGuestCart(cart) {
    localStorage.setItem('cart', JSON.stringify(cart));
    document.cookie = 'cart=' + JSON.stringify(cart) + ';path=/';
    location.reload(); // reload để cập nhật view
}

function increaseGuest(albumId) {
    let cart = getGuestCart();
    const index = cart.findIndex(item => item.album_id === albumId);
    if (index !== -1) {
        cart[index].qty += 1;
    }
    saveGuestCart(cart);
}

function decreaseGuest(albumId) {
    let cart = getGuestCart();
    const index = cart.findIndex(item => item.album_id === albumId);
    if (index !== -1) {
        if (cart[index].qty > 1) {
            cart[index].qty -= 1;
        } else {
            cart.splice(index, 1); // xóa luôn nếu còn 1
        }
    }
    saveGuestCart(cart);
}

function removeCartItem(albumId) {
    let cart = getGuestCart();
    cart = cart.filter(item => item.album_id !== albumId);
    saveGuestCart(cart);
}
