jqReplaceClick(
    $(".delete-btn"),
    deleteItemInCart
);

refreshConfirmBuyBtn(getCart());

function deleteItemInCart()
{
    let cart = getCart();
    let id = $(this).attr("value");
    delete cart["id" + id];
    localStorage.setItem('cart', JSON.stringify(cart));
    $("#" + id).remove();
    refreshConfirmBuyBtn(cart);
}

function refreshConfirmBuyBtn(cart)
{
    let cartCount = Object.keys(cart).length;
    $(".badge").text(cartCount);
    if(cartCount <= 0){
        $("#confirm-buy-btn").hide();
    }
}