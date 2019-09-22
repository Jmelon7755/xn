String.format = function () {
    var s = arguments[0];
    for (var i = 0; i < arguments.length - 1; i++) {
        var reg = new RegExp("\\{" + i + "\\}", "gm");
        s = s.replace(reg, arguments[i + 1]);
    }
    return s;
}

function jqReplaceClick(jqobj, clickFunc) {
    jqobj.unbind("click");
    jqobj.click(clickFunc);
}

function jqReplaceChange(jqobj, changeFunc) {
    jqobj.unbind("change");
    jqobj.change(changeFunc);
}

function confirmModal(title, text, ok_name, onOK) {
    $(".modal-title").text(title);

    $(".modal-body").html("<p>" + text + "</p>");

    var ok_btn = $("#modal-ok-btn");
    ok_btn.text(ok_name);
    jqReplaceClick(ok_btn, onOK);

    $('#modal').modal().show();
}

function jqPost(url, data, callBack) {
    $.post(url, data, callBack).fail(function () {
        alert("post fail");
    });
}

function imgChange(e, selector)
{
    let fr = new FileReader();

    fr.onload = function (e) {
        $(selector).attr("src", e.target.result);
    };

    fr.readAsDataURL(e.target.files[0]);
}