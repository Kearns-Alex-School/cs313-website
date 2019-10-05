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
        var subtotal = products.price * products.qty;
        text += 
        '<tr><td width="20%">' + products.name + '</td><td width="10%">' + products.price.toFixed(2) + '</td><td width="20%">' + products.qty + '</td><td width="30%">' + subtotal.toFixed(2) + '</td></tr>';

        total += subtotal;
    }

    document.getElementById('table-contents').innerHTML = text;
}