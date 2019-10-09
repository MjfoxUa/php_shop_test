$('#product_delete').click( function(e){
    if( confirm('Are you sure you want to delete the product?')){
        let productId = document.getElementById('product_delete');
        e.preventDefault();
        $.ajax({
            url: "/shop/catalog/product/delete/id/"+productId.dataset.productId,
            type: 'POST',
            contentType: false,
            processData: false,
            data: this,
            dataType: 'json',
            success: function(data){
                $('#delete').removeClass().addClass('delete-result');
                $('.delete-result').html(data.message);
                setTimeout(function (){window.location = "http://localhost/shop/"}, 3000);
            }
        });
    }
});