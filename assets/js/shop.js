$(window).on('load', function () {
    var $container = $('#portfolio-container').imagesLoaded(function () {
        $container.isotope({
            itemSelector: '.portfolio-item',
            layoutMode: 'cellsByRow'
        });
    });

    getProducts();

    $('#portfolio-flters').on('click', 'li', function () {
        var filterValue = $(this).attr('data-filter');

        $container.isotope({ filter: filterValue });
        $('#portfolio-flters li').removeClass('filter-active');
        $(this).addClass('filter-active');
    });

    function getProducts() {
        $.ajax({
            type: "GET",
            url: "config/request/getProduct.php",
            dataType: "json",
            success: function (response) {
                addProductsToIsotope(response.products);
            },
            error: function (error) {
                console.log("Error:", error);
            },
        });
    }

    function addProductsToIsotope(products) {
        products.forEach(function (product) {
            var isCoffeeBased = /mocha|latte|cappuccino|caramel/i.test(product.product_name);
            var isBestSeller = Math.random() < 0.3;
            var itemQty = 1;

            var productItem = document.createElement('div');
            productItem.className = 'col-lg-4 col-md-6 portfolio-item';

            if (isCoffeeBased) {
                productItem.className += ' filter-alpha';
            }

            if (isBestSeller) {
                productItem.className += ' filter-best';
            }

            productItem.innerHTML = `
                <div class="card mb-4 product-wap rounded-0 filter">
                  <div class="card rounded-0">
                    <img class="card-img rounded-0 img-fluid" src="${product.product_img}">
                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                      <ul class="list-unstyled">
                        <li><a class="btn text-black mt-2" href="shop/product.php?product_id=${product.product_id}"><i class="bi bi-eye"></i></a></li>
                        <li><button type="button" onclick="addToCart('${product.product_id}', '${itemQty}','${product.product_name}', '${product.price}')" class="btn text-black mt-2"><i class="bi bi-cart2"></i></button></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body">
                    <a href="shop/product.php?product_id=${product.product_id}" class="h3 text-decoration-none">${product.product_name}</a>
                    <p class="text-center mb-0">₱${product.price}</p>
                  </div>
                </div>
              `;

            $container.append(productItem).isotope('appended', productItem);
        });
    }
});