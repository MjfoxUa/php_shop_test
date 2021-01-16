$(function() {
    $('#category-form__delete').on('submit', function(e){
        e.preventDefault();
        if( confirm('Are you sure you want to delete category?')){
            e.preventDefault();
            $.ajax({
                url: this.action,
                type: 'POST',
                contentType: false,
                processData: false,
                data: new FormData(this),
                dataType: 'json',
                success: function(data){
                    $('#result_form').removeClass().addClass('invalid');
                    $('#result_form').html(data.message);
                    setTimeout(function (){
                        $('#result_form').empty().removeClass();
                        }, 1500);
                }
            });
        }
    });
});