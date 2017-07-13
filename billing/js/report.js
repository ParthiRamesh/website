function update_price() {
  var row = $(this).parents('.item-row');
  var price = row.find('.cost').val().replace("","") * row.find('.qty').val();
  price = roundNumber(price,2);
  isNaN(price) ? row.find('.price').html("N/A") : row.find('.price').html(price);
  document.getElementsByClassName("price").value=price;
//alert(document.getElementsByClassName("price").value);
update_total();
}

function update_total() {
  var total = 0;
  $('.price').each(function(i){
    price = $(this).html().replace("₹","");
    if (!isNaN(price)) total += Number(price);
  });

  total = roundNumber(total,2);

  $('#subtotal').html(total);
  $('#total').html(total);
  
  update_balance();
}