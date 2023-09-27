if (!product_det) product_det = ["Name", "Description", "Price"];

const elm_details = document.querySelector("#details");
const elm_options = document.querySelector("#options");
const elm_quantity = document.querySelector("#quantity");
const elm_price = document.querySelector("#price");

var selectedSize = 1;
function selectSize(size) {
    elm_options.children[selectedSize].classList.remove("slct");
    elm_options.children[size].classList.add("slct");
    elm_price.innerHTML = parseInt(product_det[2 + size].split("-")[1]) * quantity_val;
    selectedSize = size;
}

var quantity_val = 1;
function quantity(ch) {
    if (ch == 1) {
        if (quantity_val < 100) quantity_val++;
        elm_quantity.children[1].innerHTML = quantity_val;
    } else {
        if (quantity_val > 1) quantity_val--;
        elm_quantity.children[1].innerHTML = quantity_val;
    }
    if (pizza) {
        elm_price.innerHTML = parseInt(product_det[2 + selectedSize].split("-")[1]) * quantity_val;
    } else {
        elm_price.innerHTML = parseInt(product_det[2]) * quantity_val;
    }
}

elm_details.children[0].innerHTML = product_det[0];
elm_details.children[1].innerHTML = product_det[1];

if (pizza) {
    elm_options.classList.add("visible");
    elm_options.children[selectedSize].classList.add("slct");
    elm_price.innerHTML = product_det[3].split("-")[1];
} else {
    elm_price.innerHTML = parseInt(product_det[2]);
}

function addToCart() {
    var order;
    if (window.localStorage.cart) {
        var order = JSON.parse(window.localStorage.cart);
    } else {
        order = {};
    }

    var curr_order = [product_det[0], quantity_val, parseInt(elm_price.innerHTML)];
    if (pizza) curr_order.push(elm_options.children[selectedSize].innerHTML);

    order[Object.keys(order).length] = curr_order;

    window.localStorage.cart = JSON.stringify(order);
    // console.log(order);
    window.location.href =
        window.location.origin + window.location.pathname.slice(0, window.location.pathname.length - 11) + "cart.html";
}
