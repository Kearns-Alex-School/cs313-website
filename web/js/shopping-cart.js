function addToCart(index) {
    var price = document.getElementById('item-' + index + '-price').value;
    var qty   = document.getElementById('item-' + index + '-qty').value;
    var name  = document.getElementById('item-' + index + '-name').value;
    var removebutton = document.getElementById('item-' + index + '-remove');
    removebutton.classList.remove("disabled")

    let products = [];
    if(localStorage.getItem('products')){
        products = JSON.parse(localStorage.getItem('products'));
    }
    products.push({'id':index, name:name, qty:qty, price:price});
    localStorage.setItem('products', JSON.stringify(products));

    updateTotal(products);
}

function removeFromCart(index) {
    let storageProducts = JSON.parse(localStorage.getItem('products'));
    let products = storageProducts.filter(product => product.id !== index );
    localStorage.setItem('products', JSON.stringify(products));

    updateTotal(products);

    var removebutton = document.getElementById('item-' + index + '-remove');
    removebutton.classList.add("disabled")
    var qty = document.getElementById('item-' + index + '-qty');
    qty.value = 0;
}

function updateTotal(products) {
    var sum = 0.0;
    var arrayLength = products.length;
    for (var i = 0; i < arrayLength; i++) {
        console.log(products[i]);
        sum += products[i].price * products[i].qty;
    }

    document.getElementById('total-price').innerHTML = '$' + sum;
}

function clearCart() {
    localStorage.removeItem("products");
    document.getElementById('total-price').innerHTML = '$0.00';

    for (var i = 0; i < 10; i++) {
        var removebutton = document.getElementById('item-' + i + '-remove');
        removebutton.classList.add("disabled")
        var qty = document.getElementById('item-' + i + '-qty');
        qty.value = 0;
    }
}