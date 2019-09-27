jqReplaceClick(
    $(".detail-btn"),
    showDetail
);

function showDetail() {
    let order_id = $(this).parent().parent().attr("id");
    jqGet(
        "http://localhost/xn/client/order-detail",
        { "order-id": order_id },
        showOrderDetail
    );
}

function showOrderDetail(data) {
    data = JSON.parse(data);
    if (data.result) {
        try {
            order_details = JSON.parse(data.data);
        } catch (error) {
            alert("資料錯誤");
        }
        $(".modal-title").text("產品明細");

        let html = "";
        order_details.forEach(order_detail => {
            html += String.format("<tr><td>{0}</td><td>{1}</td><td>{2}</td></tr>", order_detail.name, order_detail.price, order_detail.count);
        });
        html = String.format("<table class='table table-hover'><thead><tr><th>產品名稱</th><th>購買時價格</th><th>購買數量</th></tr></thead><tbody>{0}</tbody></table>", html);
        $(".modal-body").html(html);

        jqReplaceClick(
            $("#modal-ok-btn"),
            function () {
                $(".modal").modal("hide");
            }
        );
        $("#modal-ok-btn").text("確定");
        $(".modal").modal().show();
    }
    else {
        alert(data.err_message ? data.err_message : "無訂單明細資料");
    }
}