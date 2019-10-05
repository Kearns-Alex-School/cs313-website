var checkout_btn;

document.addEventListener('readystatechange', event => {
    if (event.target.readyState === "complete") {
        init();
    }
});

function init() {
    checkout_btn = document.getElementById('checkout-btn');
    let products = [];

    if(localStorage.getItem('products')){
        products = JSON.parse(localStorage.getItem('products'));
    }

    updateTotal(products);
    updateTable(products);
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

    let products = [];
    updateTable(products);
}

function updateTable(products) {
    var text = 
    '<div class="table-responsive">' +
        '<table class="table table-striped table-hover table-items">' +
            '<thead>' +
                '<tr>' +
                    '<th width="20%">Name</th>' +
                    '<th width="10%">Price</th>' +
                    '<th width="20%">Qty</th>' +
                    '<th width="30%">Action</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>';

    
    
    text +=
            '</tbody>' +
        '</table>' +
    '</div>';

    document.getElementById('item-contents').innerHTML = text;
}