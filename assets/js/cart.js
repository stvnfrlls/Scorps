function displayCartData() {
    const cartTableBody = $("#cart");
    const cartSubTotal = $("#cart-total");
    cartTableBody.empty();

    const cartData = JSON.parse(localStorage.getItem("cart")) || [];
    let total = 0;

    cartData.forEach((item) => {
        const row = $("<tr>");
        row.append($("<td>").text(item.productName));
        row.append($("<td>").text(item.price));
        row.append($("<td>").text(item.counter));
        row.append($("<td>").text(item.subtotal));

        const removeColumn = $("<td>");
        const removeButton = $("<button>")
            .addClass("btn btn-fail")
            .text("Remove")
            .data("productId", item.productId);
        removeColumn.append(removeButton);
        row.append(removeColumn);

        total += item.subtotal;

        cartTableBody.append(row);
    });

    $(".btn-fail").on("click", function () {
        const productId = $(this).data("productId");
        removeCartItem(productId);

        displayCartData();
    });

    cartSubTotal.text(total.toFixed(2));
}

function addToCart(productId, itemQty, productName, price) {
    if (userId === '' || userId === null) {
        Swal.fire({
            title: "You need to login first!",
            icon: "warning",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Proceed"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "auth/login.php";
            } else {
                window.location.href = "auth/login.php";
            }
        });
        return;
    }

    const cartData = JSON.parse(localStorage.getItem("cart")) || [];

    const existingItemIndex = cartData.findIndex(item => item.productId === productId);

    itemQty = parseFloat(itemQty);
    itemQty = (isNaN(itemQty) || itemQty <= 0) ? 1 : itemQty;

    if (existingItemIndex !== -1) {
        cartData[existingItemIndex].counter += itemQty;
        cartData[existingItemIndex].subtotal = cartData[existingItemIndex].counter * parseFloat(price);

        Swal.fire("Added to cart!");
    } else {
        const cartItem = {
            userId: userId,
            productId: productId,
            productName: productName,
            price: price,
            counter: itemQty,
            subtotal: itemQty * parseFloat(price),
        };
        cartData.push(cartItem);
        Swal.fire("Added to cart!");
    }

    localStorage.setItem("cart", JSON.stringify(cartData));
}


function checkoutItem() {
    var cartDataString = localStorage.getItem('cart');

    if (cartDataString) {
        var cartDataArray = JSON.parse(cartDataString);

        localStorage.removeItem('cart');

        localStorage.setItem('checkout', JSON.stringify(cartDataArray));

        window.location.href = "checkout.php";
    }
}

function directBuy(productId, itemQty, productName, price) {
    if (userId === '' || userId === null) {
        Swal.fire({
            title: "You need to login first!",
            icon: "warning",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Proceed"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "auth/login.php";
            } else {
                window.location.href = "auth/login.php";
            }
        });
        return;
    }

    var checkoutItem = {
        userId: userId,
        productId: productId,
        productName: productName,
        price: price,
        counter: itemQty,
        subtotal: itemQty * parseFloat(price),
    };

    var checkoutArray = JSON.parse(localStorage.getItem("checkout")) || [];

    checkoutArray.push(checkoutItem);

    localStorage.setItem("checkout", JSON.stringify(checkoutArray));

    window.location.href = "checkout.php";
}

function removeCartItem(productId) {
    let cartData = JSON.parse(localStorage.getItem("cart")) || [];

    const existingItemIndex = cartData.findIndex(item => item.productId === productId);

    if (existingItemIndex !== -1) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'Do you really want to remove this product?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, remove it!'
        }).then((result) => {
            if (result.isConfirmed) {
                if (cartData[existingItemIndex].counter > 1) {
                    cartData[existingItemIndex].counter -= 1;
                    cartData[existingItemIndex].subtotal = cartData[existingItemIndex].counter * parseFloat(cartData[existingItemIndex].price);
                } else {
                    cartData = cartData.filter(item => item.productId !== productId);
                }

                localStorage.setItem("cart", JSON.stringify(cartData));
                displayCartData();

                Swal.fire(
                    'Removed!',
                    'The product has been removed from your cart.',
                    'success'
                );
            }
        });
    }
}
