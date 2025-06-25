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
    alert('Đã thêm vào giỏ hàng!');
}

function removeCartItem(album_id) {
    let cart = [];
    if (document.cookie.split('; ').find(row => row.startsWith('cart='))) {
        cart = JSON.parse(decodeURIComponent(document.cookie.replace(/(?:(?:^|.*;\s*)cart\s*\=\s*([^;]*).*$)|^.*$/, "$1"))) || [];
    }
    cart = cart.filter(item => item.album_id !== album_id);
    document.cookie = "cart=" + encodeURIComponent(JSON.stringify(cart)) + ";path=/;max-age=604800";
    location.reload();
}