jqReplaceClick(
    $(".detail-btn"),
    showDetail
);

function showDetail() {
    let order_id = $(this).parent().parent().attr("id");
    alert(order_id);
    jqGet(
        "http://localhost/xn/client/order-detail",
        { "order_id": order_id },
        showOrderDetail
    );
}

function showOrderDetail(data) {
    $(".modal-title").text("產品明細");
    $(".modal-body").html(data);
    jqReplaceClick(
        $("#modal-ok-btn"),
        function () {
            $(".modal").modal("hide");
        }
    );
    $("#modal-ok-btn").text("確定");
    $(".modal").modal().show();
}