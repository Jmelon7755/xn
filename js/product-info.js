jqReplaceClick($("#buy_btn"), buyBtnOnClick);

function buyBtnOnClick() {
    let id = "id" + $(this).val();
    let count = $("#buy_count").val();

    let cart = getCart();
    cart[id] = count;
    $.cookie("cart", JSON.stringify(cart));
    $(".badge").text(Object.keys(cart).length);
    alert("已放入購物車");
}