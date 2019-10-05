document.addEventListener('readystatechange', event => {
    if (event.target.readyState === "complete") {
        init();
    }
});

function init() {
    var text = '';
    var total = 0.0;

    var products = JSON.parse(localStorage.getItem('products'));
    var arrayLength = products.length;

    for (var i = 0; i < arrayLength; i++) {
        var price = Number(products[i].price);
        var qty = Number(products[i].qty);

        var subtotal = price * qty;
        text += '<tr><td width="20%">' + products[i].name + '</td><td width="10%">' + price.toFixed(2) + '</td><td width="20%">' + qty + '</td><td width="30%">' + subtotal.toFixed(2) + '</td></tr>';

        total += subtotal;
    }

    document.getElementById('table-contents').innerHTML = text;
    document.getElementById('total-price').innerHTML = '$' + total.toFixed(2);
}