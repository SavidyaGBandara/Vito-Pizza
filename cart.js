const elm_cart = document.querySelector("#cart");
var cart = JSON.parse(window.localStorage.cart);

function removeItem(elm) {
    elm.parentElement.parentElement.removeChild(elm.parentElement);
    delete cart[parseInt(elm.parentElement.dataset.ind)];
    var cart2 = {};
    Object.keys(cart).forEach((item, ind) => {
        cart2[ind] = cart[item];
    });
    cart = cart2;
    window.localStorage.cart = JSON.stringify(cart2);
}

if (Object.keys(cart).length) {
    for (var key in cart) {
        let item = cart[key];
        elm_cart.innerHTML += `<tr data-ind="${key}">
        <td>${item[3] ? item[0] + ` (${item[3]})` : item[0]}</td>
        <td>x ${item[1]}</td><td>${item[2]}</td>
        <td onclick="removeItem(this)">Remove</td></tr>`;
    }
} else {
    elm_cart.innerHTML = "<h1>Empty</h1>";
}
