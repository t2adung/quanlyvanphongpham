
require('./bootstrap');

$(function () {
    $('#orderModal').on('show.bs.modal', function (event) {
        var order_products = ""; 
        var disable_submit = true;
        $.each($("input[name='quantities[]']"), function(){
            var quantity_value = $(this).val();
            if (quantity_value != '' && parseInt(quantity_value) > 0) {
                order_products += "<div class='row' >" + $(this).parent().parent().html() + "</div>";
            }
        })
        if (order_products == '') {
            order_products = '<div class="form-group">Vui lòng đăng ký tối thiểu 1 sẩn phẩm</div>';
            $(this).find("input[name='btnCreateOrder']").hide();
        } 
        $(this).find('.textMonth').html($('input[name="inputMonth"]:selected').val());
        $(this).find('.textYear').html($('input[name="inputYear"]:selected').val());
        $(this).find('.modal-body').html(order_products);
        /*var product_ids = ;
        var quantities = $("input[name='quantities[]']").map(function(){
            return $(this).val();
        }).get();*/
    })
});