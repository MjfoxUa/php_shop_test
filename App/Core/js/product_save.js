$(function() {
    $('#product_form').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: this.action,
            type: 'POST',
            contentType: false,
            processData: false,
            data: new FormData(this),
            dataType: 'json',
            success: function(data){
                if(!!data){
                    if(!data.status){
                        $('#result_form').removeClass();
                        $('#result_form').addClass('product-form_errors');
                        data.errors.forEach(function(element) {
                            $('#result_form').html(data.errors);
                        });
                    }else {
                        $('#result_form').removeClass();
                        $('#result_form').addClass('product-form_message-save');
                        $('#result_form').html(data.message);
                    }
                }
            }
        });
    });
});