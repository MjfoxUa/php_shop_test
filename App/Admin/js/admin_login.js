$(function() {
    $('#admin_login').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            url: this.action,
            type: 'POST',
            contentType: false,
            processData: false,
            data: new FormData(this),
            dataType: 'json',
            success: function(data){
                if(!data.status){
                    $('#result_form').removeClass();
                    $('#result_form').addClass('invalid-login');
                        $('#result_form').html(data.message);
                        setTimeout(function (){
                            window.location.reload()
                        }, 2500);
                } else {
                    $('#result_form').removeClass();
                    $('#result_form').addClass('success-login');
                    $('#result_form').html(data.message);
                    setTimeout(function (){
                        window.location = "/shop/admin/index/panel/"
                    }, 2500);
                }
            }
        });
    });
});