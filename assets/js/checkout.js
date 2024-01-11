function displayCartData() {
    const cartTableBody = $("#cart");
    const cartSubTotal = $("#cartTotal");
    cartTableBody.empty();

    const cartData = JSON.parse(localStorage.getItem("checkout")) || [];
    let total = 0;

    cartData.forEach((item) => {
        const row = $("<tr>");
        row.append($("<td>").text(item.productName));
        row.append($("<td>").text(item.price));
        row.append($("<td>").text(item.counter));
        row.append($("<td>").text('₱ ' + item.subtotal.toFixed(2)));

        total += item.subtotal;

        cartTableBody.append(row);
    });

    cartSubTotal.text('₱ ' + total.toFixed(2));
}

function revertToCart() {
    var checkoutDataString = localStorage.getItem('checkout');

    if (checkoutDataString) {
        var checkoutDataArray = JSON.parse(checkoutDataString);
        var cartDataString = localStorage.getItem('cart');
        var cartDataArray;

        if (cartDataString) {
            cartDataArray = JSON.parse(cartDataString);

            checkoutDataArray.forEach(newCartItem => {
                var existingItemIndex = cartDataArray.findIndex(item => item.productId === newCartItem.productId);

                if (existingItemIndex !== -1) {
                    var newCounter = parseFloat(newCartItem.counter);

                    cartDataArray[existingItemIndex].counter += newCounter;
                    cartDataArray[existingItemIndex].subtotal = cartDataArray[existingItemIndex].counter * parseFloat(newCartItem.price);
                } else {
                    newCartItem.counter = parseFloat(newCartItem.counter);
                    newCartItem.subtotal = parseFloat(newCartItem.price) * newCartItem.counter;
                    cartDataArray.push(newCartItem);
                }
            });

            localStorage.setItem('cart', JSON.stringify(cartDataArray));
            localStorage.removeItem('checkout');
            console.log('Cart updated:', cartDataArray);
        }
        window.location.href = "cart.php";
    }
}


function checkout() {
    var first_name = document.getElementById('first_name').value;
    var last_name = document.getElementById('last_name').value;
    var address = document.getElementById('address').value;
    var barangay = document.getElementById('barangay').value;
    var city = document.getElementById('city').value;
    var province = document.getElementById('province').value;
    var postal = document.getElementById('postal_code').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;

    var fields = ['first_name', 'last_name', 'address', 'barangay', 'city', 'province', 'postal_code', 'email', 'phone'];

    for (var i = 0; i < fields.length; i++) {
        var inputElement = document.getElementById(fields[i]);
        var value = document.getElementById(fields[i]).value.trim();
        if (value === '') {
            alert('Please enter a value for ' + fields[i].replace('_', ' '));
            inputElement.style.border = '2px solid red';
            break;
        } else {
            inputElement.style.border = '';
        }
    }

    var cartData = JSON.parse(localStorage.getItem("cart"));

    var formData = {
        fname: first_name,
        lname: last_name,
        address: address,
        barangay: barangay,
        city: city,
        province: province,
        postal: postal,
        email: email,
        phone: phone,
        cartData: cartData
    };

    $.ajax({
        type: 'POST',
        url: '../config/request/checkoutProduct.php',
        dataType: 'json',
        data: JSON.stringify(formData),
        success: function (response) {
            if (response.success) {
                localStorage.clear();
                window.location.href = response.redirect;
            } else {
                alert(response.errors);
            }
        },

        error: function (xhr, status, error) {
            console.error('Error:', status, error);
        }
    });
}