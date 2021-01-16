$(function() {
    $('#category-form').on('submit', function(e){
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
                        $('#result_form').addClass('invalid');
                        data.errors.forEach(function(element) {
                        $('#result_form').html(data.errors);
                        setTimeout(function (){
                            $('#result_form').empty().removeClass().reload();
                        }, 1500);
                        });
                    }else {
                        $('#result_form').removeClass();
                        $('#result_form').addClass('success');
                        $('#result_form').html(data.message);
                        setTimeout(function () {
                            $('#result_form').empty().removeClass();
                        }, 1500);
                    }
                }
            }
        });
    });
});