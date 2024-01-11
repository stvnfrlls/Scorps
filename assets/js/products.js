function getUrlParameters() {
    var params = {};
    var queryString = window.location.search.substring(1);
    var vars = queryString.split("&");

    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        params[pair[0]] = decodeURIComponent(pair[1]);
    }

    return params;
}
function getProductDetails(productId) {
    $.ajax({
        type: "POST",
        url: "../config/request/getProductDetails.php",
        dataType: "json",
        data: {
            productId: productId
        },
        success: function (response) {
            var productDetails = response.data;

            document.getElementById('productImage').setAttribute('src', '../' + productDetails[0].product_img);
            document.getElementById('productName').innerHTML = productDetails[0].product_name;
            document.getElementById('productPrice').innerHTML = productDetails[0].price;
            document.getElementById('inStock').innerHTML = productDetails[0].in_stock;

            var buttonContainer = document.getElementById('buttonContainer');
            var addToCartButton = document.createElement('button');
            addToCartButton.type = 'button';
            addToCartButton.className = 'primary-btn border-0';
            addToCartButton.innerHTML = 'Add to Cart';
            addToCartButton.onclick = function () {
                var itemQty = document.getElementById('itemQty').value;
                addToCart(productDetails[0].product_id, itemQty, productDetails[0].product_name, productDetails[0].price);
            };

            var buyNowButton = document.createElement('button');
            buyNowButton.type = 'button';
            buyNowButton.className = 'primary-btn border-0';
            buyNowButton.innerHTML = 'Buy Now';
            buyNowButton.onclick = function () {
                var itemQty = document.getElementById('itemQty').value;
                directBuy(productDetails[0].product_id, itemQty, productDetails[0].product_name, productDetails[0].price);
            };

            buttonContainer.innerHTML = '';
            buttonContainer.appendChild(addToCartButton);
            buttonContainer.appendChild(buyNowButton);
        },
        error: function (xhr, status, error) {
            console.log("Error:", xhr, status, error);
        },
    });

}