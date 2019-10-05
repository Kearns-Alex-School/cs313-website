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

function checkName(name, marker) {
    var thisName = document.getElementById(name);
    var thisMarker = document.getElementById(marker);

    // check the name for only alphabet
    var pass = thisName.value.search(/(.*\d.*)|(.*\s.*)/);

    if (pass == 0 || thisName.value.length == 0) {
        thisMarker.style.display = 'initial';
        thisMarker.innerHTML = "* Need to be fixed";
        return false;
    }
    else {
        thisMarker.style.display = 'none';
    }
        
    return true;
}

function checkAddress(address, marker) {
    var thisAddress = document.getElementById(address);
    var thisMarker = document.getElementById(marker);

    // check the name for only alphabet
    var pass = thisAddress.value.search(/^\d+\s([a-zA-Z]+|[a-zA-Z]+\s[a-zA-Z]+\.?)\s[a-zA-Z]+,\s(AL|AK|AZ|AR|CA|CO|CT|DE|FL|GA|HI|ID|IL|IN|IA|KS|KY|LA|ME|MD|MA|MI|MN|MS|MO|MT|NE|NV|NH|NJ|NM|NY|NC|ND|OH|OK|OR|PA|RI|SC|SD|TN|TX|UT|VT|VA|WA|WV|WI|WY)\s\d{5}$/);

    if (pass != 0 || thisAddress.value.length == 0) {
        thisMarker.style.display = 'initial';
        thisMarker.innerHTML = "* Need to be fixed";
        return false;
    }
    else {
        thisMarker.style.display = 'none';
    }
        
    return true;
}

function checkAll() {
    var passed = true;

    if (checkName('fname', 'fnamevalid') == false)
        passed = false;

    if(checkName('lname', 'lnamevalid') == false)
        passed = false;

    if(checkAddress('address', 'addressvalid') == false)
        passed = false;
    
    return passed;
}