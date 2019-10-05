document.addEventListener('readystatechange', event => {
    if (event.target.readyState === "complete") {
        init();
    }
});

function init() {
    var products = JSON.parse(localStorage.getItem('products'));
    var text = 
    '<ul>';

    var arrayLength = products.length;
    for (var i = 0; i < arrayLength; i++) {
        text += 
        '<li>' + products[i].qty + ' ' + products[i].name '</li>';
    }

    text += 
    '</ul>';

    document.getElementById('recipt').innerHTML = text;

    localStorage.removeItem('products');
}