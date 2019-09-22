jqReplaceClick($("#add-btn"), addBtnClick);

function addBtnClick()
{
    //設定標題
    $(".modal-title").text("新增產品");

    //load（非同步） 模板
    $(".modal-body").load("http://localhost/xn/templates/add-product.html", loadTplCallBack);
}

function loadTplCallBack()
{
    //圖片選取後的事件
    jqReplaceChange($("#product-img"), e => imgChange(e, "img"));

    let $modal_ok_btn = $("#modal-ok-btn");
    //更改OK按鈕的名字
    $modal_ok_btn.text("新增");
    //OK按鈕事件
    jqReplaceClick($modal_ok_btn, modalOKClick);

    // show modal
    $("#modal").modal().show();
}

function modalOKClick()
{
    let name = $("#product-name").val();
    let count = $("#product-count").val();
    let price = $("#product-price").val();
    let img = "";
    let comment = $("#product-comment").val();

    $validation = true;

    if (name.length <= 0 || name.length > 30) {
        $("#product-name-warning").text("字串長度不合法");
        $validation = false;
    }

    if (count <= 0 || count > 9999) {
        $("#product-count-warning").text("請輸入正確數量");
        $validation = false;
    }

    if (price <= 0 || price > 99999) {
        $("#product-price-warning").text("請輸入正確價錢");
        $validation = false;
    }

    let files = $("#product-img").prop("files");
    if (files && files.length > 0) {
        img = $("img").prop("src");
    }

    if (comment.length <= 0 || comment.length > 1000) {
        $("#product-comment-warning").text("字串長度不合法");
        $validation = false;
    }

    if ($validation) {
        jqPost(
            "http://localhost/xn/backend/create-product",
            {
                "name": name,
                "count": count,
                "price": price,
                "img": img,
                "comment": comment,
            },
            // () => createProductCallBack()
        );
    }
}

function createProductCallBack(data)
{
    if (data === "0") {
        let product = data.product;
        $("tbody").append(string.format(
            data.html,
            product.id,
            product.img,
            product.name,
            product.count,
            product.price,
            product.comment,
        ));
    } else {
        switch (data) {
            case "1":
                alert("未登入");
                break;
            case "2":
                alert("表單資料不合法");
                break;
            default:
                alert("未知錯誤: " + data);
                break;
        }
    }
}