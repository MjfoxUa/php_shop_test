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
                    $('#result_form').removeClass().addClass('delete-result');
                    $('.delete-result').html(data.message);
                    setTimeout(function (){window.location = "/shop/catalog/category/add/"}, 2500);
                }
            });
        }
    });
});