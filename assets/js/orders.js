function getOrderDetails(orderId) {
    $.ajax({
        type: 'POST',
        url: '../config/request/getOrderDetails.php',
        dataType: 'json',
        data: {
            orderId: orderId
        },
        success: function (response) {
            var orderDetails = response.data;
            let total_amount = 0;

            const parcelStatus = orderDetails[orderId].order_status;
            const textStatus = $('#text-status');

            if (parcelStatus === 'ORDERPLACED') {
                textStatus.text('Your order has been successfully placed. We\'re preparing your items for shipment.');
            } else if (parcelStatus === 'PROCESSING') {
                textStatus.text('Your order is being processed. Please wait as we prepare your items for shipping.');
            } else if (parcelStatus === 'SHIPPED') {
                textStatus.text('Great news! Your parcel has been shipped. You can track its journey using the provided tracking number.');
            } else if (parcelStatus === 'OUTFORDELIVERY') {
                textStatus.text('Your parcel is out for delivery. It should arrive at your doorstep soon.');
            } else if (parcelStatus === 'DELIVERED') {
                textStatus.text('Congratulations! Your parcel has been delivered. If you have any issues, please contact our customer support.');
            } else if (parcelStatus === 'FAILEDDELIVERYATTEMPT') {
                textStatus.text('We attempted to deliver your parcel, but no one was available. Please reschedule or contact our customer support.');
            } else if (parcelStatus === 'INTRANSIT') {
                textStatus.text('Your parcel is currently in transit. Please allow some time for it to reach the next destination.');
            } else if (parcelStatus === 'DELAYED') {
                textStatus.text('We apologize for the delay. Your parcel is experiencing unexpected delays. Our team is working to get it back on track.');
            } else {
                textStatus.text('Thank you. Your order has been received.');
            }

            $('#order-number').text(orderDetails[orderId].order_id);
            $('#date-ordered').text(new Date(orderDetails[orderId].created_at).toLocaleString());
            $('#payment-method').text(orderDetails[orderId].payment_method);

            $('#address').text(orderDetails[orderId].address);
            $('#barangay').text(orderDetails[orderId].barangay);
            $('#city').text(orderDetails[orderId].city);
            $('#postal-code').text(orderDetails[orderId].postal);

            orderDetails[orderId]['cartData'].forEach((item) => {
                const row = $("<tr>");
                row.append($("<td colspan='2'>").text(item.product_name));
                row.append($("<td>").text(item.quantity));
                row.append($("<td>").text(item.total));

                const subTotal = parseFloat(item.total);
                total_amount += subTotal;

                $('#orders').append(row);
            });

            $('#total-amount').text(total_amount.toFixed(2));
            $('#order-total-amount').text(total_amount.toFixed(2));
        },
        error: function (xhr, status, error) {
            console.error('Error:', status, error);
        }
    });
}