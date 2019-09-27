function validate() {
    let name = $("#product-name").val();
    let count = $("#product-count").val();
    let price = $("#product-price").val();
    let img = "";
    let comment = $("#product-comment").val();

    let validation = true;

    if (name.length <= 0 || name.length > 30) {
        $("#product-name-warning").text("字串長度不合法");
        validation = false;
    }

    if (count <= 0 || count > 9999) {
        $("#product-count-warning").text("請輸入正確數量");
        validation = false;
    }

    if (price <= 0 || price > 99999) {
        $("#product-price-warning").text("請輸入正確價錢");
        validation = false;
    }

    let files = $("#product-img").prop("files");
    if (files && files.length > 0) {
        img = $("#modal-img").prop("src");
    }

    if (comment.length <= 0 || comment.length > 1000) {
        $("#product-comment-warning").text("字串長度不合法");
        validation = false;
    }

    let data = {};
    data.name = name;
    data.count = count;
    data.price = price;
    data.img = img;
    data.comment = comment;
    data.validation = validation;

    return data;
}

jqReplaceClick($("#add-btn"), addBtnClick);

function addBtnClick() {
    //設定標題
    $(".modal-title").text("新增產品");

    //load（非同步） 模板
    $(".modal-body").load("http://localhost/xn/templates/edit-product.html", loadTplCallBack);
}

function loadTplCallBack() {
    //圖片選取後的事件
    jqReplaceChange($("#product-img"), e => imgChange(e, "#modal-img"));

    let $modal_ok_btn = $("#modal-ok-btn");
    //更改OK按鈕的名字
    $modal_ok_btn.text("新增");
    //OK按鈕事件
    jqReplaceClick($modal_ok_btn, createProductPost);

    // show modal
    $("#modal").modal().show();
}

function createProductPost() {
    let validatedData = validate();

    if (validatedData.validation) {
        jqPost(
            "http://localhost/xn/backend/create-product",
            {
                "data": validatedData
            },
            data => createProductCallBack(
                data,
                validatedData
            )
        );
    }
}

function createProductCallBack(
    data,
    validatedData
) {
    data = JSON.parse(data);
    if (data.result) {
        let product = JSON.parse(data.data);
        if (!validatedData.img) {
            validatedData.img = "http://localhost/xn/resource/img/595prodImg20180823033204_1.jpg";
        }
        $("tbody").append(String.format(
            product.html,
            product.product_id,
            validatedData.img,
            validatedData.name,
            validatedData.count,
            validatedData.price,
            validatedData.comment
        ));
        jqReplaceClick($(".edit-btn"), editProduct);
        jqReplaceClick($(".delete-btn"), deleteProduct);
        $('#modal').modal('hide');
    } else {
        alert(data.err_message ? data.err_message : "創建產品失敗");
    }
}

jqReplaceClick($(".edit-btn"), editProduct);

function editProduct(e) {
    e.preventDefault();

    //設定標題
    $(".modal-title").text("編輯產品");

    let id = $(this).parent().parent().attr("id");

    //load（非同步） 模板
    $(".modal-body").load("http://localhost/xn/templates/edit-product.html", () => loadEditProductTplCallBack(id));
}

function loadEditProductTplCallBack(id) {
    let img = $("#" + id + "-img").attr("src");
    let name = $("#" + id + "-name").text();
    let count = $("#" + id + "-count").text();
    let price = $("#" + id + "-price").text();
    let comment = $("#" + id + "-comment").text();

    $("#product-name").val(name);
    $("#product-count").val(count);
    $("#product-price").val(price);
    $("#product-comment").val(comment);
    $("#modal-img").attr("src", img);

    //圖片選取後的事件
    jqReplaceChange($("#product-img"), e => imgChange(e, "#modal-img"));

    let $modal_ok_btn = $("#modal-ok-btn");
    //更改OK按鈕的名字
    $modal_ok_btn.text("更新");
    //OK按鈕事件
    jqReplaceClick($modal_ok_btn, () => updateProductPost(id));

    // show modal
    $("#modal").modal().show();
}

function updateProductPost(id) {
    $valiadatedData = validate();
    if ($valiadatedData.validation) {
        jqPost(
            "http://localhost/xn/backend/update-product",
            {
                "id": id,
                "data": $valiadatedData
            },
            data => updateProductCallback(id, data)
        );
    }
}

function updateProductCallback(id, data) {
    data = JSON.parse(data);
    if (data.result) {
        let img = $("#modal-img").attr("src");
        let name = $("#product-name").val();
        let count = $("#product-count").val();
        let price = $("#product-price").val();
        let comment = $("#product-comment").val();

        $("#" + id + "-img").attr("src", img);
        $("#" + id + "-name").text(name);
        $("#" + id + "-count").text(count);
        $("#" + id + "-price").text(price);
        $("#" + id + "-comment").text(comment);

        $("#modal").modal("hide");
    } else {
        alert(data.err_message ? data.err_message : "更新產品資料失敗");
    }
}

jqReplaceClick($(".delete-btn"), deleteProduct);

function deleteProduct(e) {
    e.preventDefault();

    let id = $(this).parent().parent().attr("id");

    confirmModal("警告", "確定要刪除該筆產品資料?", "刪除", () => deleteProductPost(id));
}

function deleteProductPost(id) {
    jqPost(
        "http://localhost/xn/backend/delete-product",
        { "id": id },
        data => deleteProductCallback(id, data)
    );

    $("#modal").modal("hide");
}

function deleteProductCallback(id, data) {
    data = JSON.parse(data);
    if (data.result) {
        $("#" + id).remove();
    } else {
        alert(data.err_message ? data.err_message : "刪除失敗")
    }
}