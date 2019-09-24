jqReplaceClick($(".product-img-a"), productUnitOnClick);

function productUnitOnClick(e) {
    e.preventDefault();

    let id = $(this).prop("id");

    jqGet(
        "http://localhost/xn/client/product-info",
        { "id": id },
        function (data) {
            $("#stylesheet").append("<link rel=\"stylesheet\" href=\"http://localhost/xn/css/product-info.css\">");
            $("title").text("Product Info");
            $("#index-main").html(data);
            $("#script").append("<script src=\"http://localhost/xn/js/product-info.js\"></script>");
        }
    );
}