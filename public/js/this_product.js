$(document).ready(function(){
    var increase_quantity = $('#increase_quantity');
    var decrease_quantity = $('#decrease_quantity');
    var quantity = $('#quantity');
    var qty = $("#qty");


    qty.val(quantity.text());

    increase_quantity.click(function(){
        new_q = parseInt(quantity.text()) + 1;
        quantity.text(new_q);
        qty.val(quantity.text());
    });

    decrease_quantity.click(function(){
        q = quantity.text();
        if(q == 1){
            $.notify('The least product you can order is 1', 'info');
        }else{
            new_q = quantity.text() - 1;
            quantity.text(new_q);
            qty.val(quantity.text());
        }
    });
});