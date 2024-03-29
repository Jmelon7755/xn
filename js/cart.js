jqReplaceClick(
    $(".delete-btn"),
    deleteItemInCart
);

refreshConfirmBuyBtn(getCart());

function deleteItemInCart() {
    let cart = getCart();
    let id = $(this).attr("value");
    delete cart["id" + id];
    localStorage.setItem('cart', JSON.stringify(cart));
    $("#" + id).remove();
    refreshConfirmBuyBtn(cart);
}

function refreshConfirmBuyBtn(cart) {
    let cartCount = Object.keys(cart).length;
    $(".badge").text(cartCount);
    if (cartCount <= 0) {
        $("#confirm-buy-btn").hide();
    }
}

jqReplaceClick($("#confirm-buy-btn"), confirmBuy);

function confirmBuy() {
    confirmModal("警告", "確定要購買菜籃中的農產品?", "購買", function () {
        jqPost(
            "http://localhost/xn/client/product-purchase",
            { "cart": JSON.stringify(getCart()) },
            productPurchaseCallback
        );
    });
}

function productPurchaseCallback(data) {
    data = JSON.parse(data);
    if (data.result) {
        localStorage.removeItem("cart");
        alert("購買成功，請查看訂單");
        location.replace("http://localhost/xn/client");
    } else {
        switch (data.err_code) {
            case 1:
                loginModal();
                break;
            default:
                alert("購買失敗");
                break;
        }
    }
}