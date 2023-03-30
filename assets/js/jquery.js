
$(document).ready(function() {

var fadeTime = 300;
var taxRate = 0.05;


$('.pass-quantity input').change(function() {
  updateQuantity(this);
});

$('.remove-item button').click(function() {
  removeItem(this);
});

function recalculateCart() {
  var subtotal = 0;

  $('.item').each(function() {
    subtotal += parseFloat($(this).children('.product-line-price').text());
  });

  var tax = subtotal * taxRate;
  var total = subtotal + tax;

  $('.totals-value').fadeOut(fadeTime, function() {
    $('#cart-subtotal').html(subtotal.toFixed(2));
    $('#cart-tax').html(tax.toFixed(2));
    $('.cart-total').html(total.toFixed(2));
    if (total == 0) {
      $('.checkout').fadeOut(fadeTime);
    } else {
      $('.checkout').fadeIn(fadeTime);
    }
    $('.totals-value').fadeIn(fadeTime);
  });
}
function updateQuantity(quantityInput) {
  var productRow = $(quantityInput).parent().parent();
  var price = parseFloat(productRow.children('.product-price').text());
  var quantity = $(quantityInput).val();
  var linePrice = price * quantity;

  productRow.children('.product-line-price').each(function() {
    $(this).fadeOut(fadeTime, function() {
      $(this).text(linePrice.toFixed(2));
      recalculateCart();
      $(this).fadeIn(fadeTime);
    });
  });
}

function removeItem(removeButton) {
  var productRow = $(removeButton).parent().parent();
  productRow.slideUp(fadeTime, function() {
    productRow.remove();
    recalculateCart();

  });
}

});

