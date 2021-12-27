
require('./bootstrap');

$(function () {
    $('#orderModal').on('show.bs.modal', function (event) {
        var order_products = ""; 
        var disable_submit = true;
        var index = 1;
        $(this).find('.modal-body').html('');
        $.each($("input[name='quantities[]']"), function(){
            var product_qty = $(this).val();
            if (product_qty != '' && parseInt(product_qty) > 0) {
                var parent_row = $(this).parent().parent();
                var product_name = $(parent_row).find("input[name='product_name']").val();
                var product_id = $(parent_row).find("input[name='product_ids[]']").val();
                order_products += '<div class="row">';
                order_products += '<div class="col-md-5"><input type="text" readonly class="form-control-plaintext" value="' + product_name + '"></div>';
                order_products += '<div class="col-md-4">';
                order_products += '<input type="hidden" name="product_ids[]" value="' + product_id + '">';
                order_products += '<input type="number" class="form-control-plaintext" name="quantities[]" readonly value="' + product_qty + '">';
                order_products += '</div>';
                order_products += '</div>';
                index ++;
            }
        })
        if (order_products == '') {
            order_products = '<div class="form-group">Vui lòng đăng ký tối thiểu 1 sẩn phẩm</div>';
            $(this).find("input[name='btnCreateOrder']").hide();
        } else {
            $(this).find("input[name='btnCreateOrder']").show();
        } 
        var month = $('#inputMonth :selected').val();
        var year = $('#inputYear :selected').val();
        $(this).find('input[name="month"]').val(month);
        $(this).find('input[name="year"]').val(year);
        $(this).find('span.textMonth').text(month);
        $(this).find('span.textYear').text(year);
        $(this).find('.modal-body').html(order_products);
        /*var product_ids = ;
        var quantities = $("input[name='quantities[]']").map(function(){
            return $(this).val();
        }).get();*/
    })
});