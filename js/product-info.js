jqReplaceClick($("#buy-btn"), buyBtnOnClick);

function buyBtnOnClick() {
    let id = $(this).val();
    let count = $("#product-count").val();

    let cart = getCart();
    cart["id" + id] = {"id":id, "count":count};
    localStorage.setItem("cart", JSON.stringify(cart));
    $(".badge").text(Object.keys(cart).length);
    alert("已放入購物車");
}