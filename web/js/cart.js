var checkout_btn;

document.addEventListener('readystatechange', event => {
    if (event.target.readyState === "complete") {
        //init();
    }
});

function init() {
    checkout_btn = document.getElementById('checkout-btn');

    if(localStorage.getItem('products')){
        products = JSON.parse(localStorage.getItem('products'));
        updateTotal(products);

        var arrayLength = products.length;
        for (var i = 0; i < arrayLength; i++) {
            var qty = document.getElementById('item-' + products[i].id + '-qty');
            qty.value = products[i].qty;

            var removebutton = document.getElementById('item-' + products[i].id + '-remove');
            removebutton.classList.remove("disabled");
            removebutton.disabled = false;
        }
    }
}

function updateCart(index) {
    var qty = document.getElementById('item-' + index + '-qty');
    
    if (qty.value < 1) {
        alert("Please enter a positive number to add to your cart");
        qty.value = 0;
        return;
    }

    let products = [];
    if(localStorage.getItem('products')){
        products = JSON.parse(localStorage.getItem('products'));
    }

    var arrayLength = products.length;

    for (var i = 0; i < arrayLength; i++) {
        if (products[i].id != index) {
            continue;
        }
        
        products[i].qty = qty.value;
        break;
    }
    localStorage.setItem('products', JSON.stringify(products));

    updateTotal(products);
}

function removeFromCart(index) {
    let storageProducts = JSON.parse(localStorage.getItem('products'));
    let products = storageProducts.filter(product => product.id !== index);
    localStorage.setItem('products', JSON.stringify(products));

    updateTotal(products);
}

function updateTotal(products) {
    var sum = 0.0;
    var arrayLength = products.length;
    for (var i = 0; i < arrayLength; i++) {
        console.log(products[i]);
        sum += products[i].price * products[i].qty;
    }

    if (arrayLength == 0) {
        checkout_btn.disabled = true;
        checkout_btn.classList.add("disabled");
    }
    document.getElementById('total-price').innerHTML = '$' + sum.toFixed(2);
}

function clearCart() {
    localStorage.removeItem('products');

    checkout_btn.disabled = true;
    checkout_btn.classList.add("disabled");
    document.getElementById('total-price').innerHTML = '$' + sum.toFixed(2);

    updateTable();
}