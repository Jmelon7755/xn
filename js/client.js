jqReplaceClick(
    $(".navbar-brand"),
    function (e) {
        e.preventDefault();
        window.location.replace("http://localhost/xn/client");
    }
);

function refreshCart() {
    let cart = getCart();
    $(".badge").text(Object.keys(cart).length);
}

function getCart() {
    let cart = localStorage.getItem("cart");
    if (cart) {
        cart = JSON.parse(cart);
    }
    else {
        cart = {};
    }
    return cart;
}

function registerModal() {
    $(".modal-title").text("會員註冊");

    $modal_body = $(".modal-body");
    $modal_body.load("templates/register.html");

    let ok_btn = $("#modal-ok-btn");
    ok_btn.text("註冊");
    jqReplaceClick(ok_btn, function () {
        let Name = $("#name").val();
        let Account = $("#account").val();
        let Password = $("#password").val();
        let PasswordConfirm = $("#password-confirm").val();

        let validation = true;
        if (Name.length <= 0 || Name.length > 15) {
            $("#name-warning").text("字元長度不合法!");
            validation = false;
        }

        if (!Account.match(/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/) && !Account.match(/^09\d{8}$/)) {
            $("#account-warning").text("字元不合法，手機請以「09」開頭");
            validation = false;
        }

        if (!Password.match(/^\w{6,15}$/)) {
            $("#password-warning").text('密碼長度介於6~15，只能使用大小字母、數字以及底線');
            validation = false;
        }

        if (Password != PasswordConfirm) {
            $("#password-confirm-warning").text('與密碼設定不符');
            validation = false;
        }

        if (validation) {
            $.post(
                "http://localhost/xn/client/register",
                {
                    "name": Name,
                    "account": Account,
                    "password": Password
                },
                function (data) {
                    data = JSON.parse(data);
                    if (data.result) {
                        $modal_body.text("註冊成功，請登入購買");
                        ok_btn.text("確定");
                        jqReplaceClick(ok_btn, function () {
                            $('#modal').modal('hide');
                        });
                    } else {
                        switch (data.err_code) {
                            case "15":
                                alert(data.err_message);
                                break;
                            default:
                                alert("註冊失敗");
                                break;
                        }
                    }
                }
            ).fail(function () {
                alert("user register fail");
            });
        }
    });
}

function loginModal() {
    $(".modal-title").text("會員登入");

    $(".modal-body").load("templates/user-login.html");

    let ok_btn = $("#modal-ok-btn");
    ok_btn.text("登入");
    jqReplaceClick(ok_btn, function () {
        let Account = $("#account").val();
        let Password = $("#password").val();

        let validation = true;

        if (!Account.match(/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/) && !Account.match(/^09\d{8}$/)) {
            $("#account-warning").text("字元不合法，手機請以「09」開頭");
            validation = false;
        }

        if (!Password.match(/^\w{6,15}$/)) {
            $("#password-warning").text('密碼長度介於6~15，只能使用大小字母、數字以及底線');
            validation = false;
        }

        if (validation) {
            $.post(
                "http://localhost/xn/client/login",
                {
                    "account": Account,
                    "password": Password
                },
                function (data) {
                    data = JSON.parse(data);
                    if (data.result) {
                        location.reload();
                    } else {
                        switch (data) {
                            case "19":
                                $("#login-failed").text(data.err_message);
                                break;
                            default:
                                alert("未知錯誤");
                                break;
                        }
                    }
                }
            ).fail(function () {
                alert("user login fail");
            });
        }
    });
}

function logout(event) {
    event.preventDefault();
    $.post(
        "http://localhost/xn/client/logout",
        function (data) {
            data = JSON.parse(data);
            if (data.result) {
                location.replace("http://localhost/xn/client");
            } else {
                alert("登出失敗");
            }
        }
    ).fail(function () {
        alert("user logout fail");
    });
}

jqReplaceClick($("#register-a"), registerModal);
jqReplaceClick($("#user-login-a"), loginModal);
jqReplaceClick($("#user-logout-a"), logout);

jqReplaceClick($("#m-cart"), myCartBtnOnClick);

function myCartBtnOnClick(e) {
    e.preventDefault();

    jqPost(
        "http://localhost/xn/client/product-cart-check",
        { "cart": JSON.stringify(getCart()) },
        productCartCheckCallback
    );
}

function productCartCheckCallback(data) {
    data = JSON.parse(data);

    let cart = getCart();

    if (data.result) {
        let not_exist_ids = JSON.parse(data.data);
        not_exist_ids.forEach(id => {
            delete cart["id" + id];
        });
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    jqPost(
        "http://localhost/xn/client/product-cart",
        { "cart": JSON.stringify(cart) },
        productCartCallback
    );
}

function productCartCallback(data) {
    $("title").text("Cart");
    $("#index-main").html(data);
    $("#script").html(
        "<script src=\"http://localhost/xn/js/master.js\" defer></script>" +
        "<script src=\"http://localhost/xn/js/client.js\" defer></script>" +
        "<script src=\"http://localhost/xn/js/cart.js\" defer></script>"
    );
}

refreshCart();

jqReplaceClick($("#m-order"), mOrderOnClick);

function mOrderOnClick(e) {
    e.preventDefault();

    location.replace("http://localhost/xn/client/order");
}