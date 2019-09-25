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

    var ok_btn = $("#modal-ok-btn");
    ok_btn.text("註冊");
    jqReplaceClick(ok_btn, function () {
        var Name = $("#name").val();
        var Account = $("#account").val();
        var Password = $("#password").val();
        var PasswordConfirm = $("#password-confirm").val();

        var validation = true;
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
                    if (data === "0") {
                        $modal_body.text("註冊成功，請登入購買");
                        ok_btn.text("確定");
                        jqReplaceClick(ok_btn, function () {
                            $('#modal').modal('hide');
                        });
                    } else {
                        switch (data) {
                            case "1":
                                $("#register-failed").text('欄位輸入不合法');
                                break;
                            case "2":
                                $("#register-failed").text('已存在相同帳號');
                                break;
                            case "3":
                                alert("註冊失敗");
                                break;
                            default:
                                alert("未知錯誤");
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

    var ok_btn = $("#modal-ok-btn");
    ok_btn.text("登入");
    jqReplaceClick(ok_btn, function () {
        var Account = $("#account").val();
        var Password = $("#password").val();

        var validation = true;

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
                    if (data === "0") {
                        location.reload();
                    } else {
                        switch (data) {
                            case "1":
                                $("#login-failed").text('已登入');
                                break;
                            case "2":
                                $("#login-failed").text('帳號或密碼格式錯誤');
                                break;
                            case "3":
                                $("#login-failed").text('帳號或密碼錯誤');
                                break;
                            case "4":
                                $("#login-failed").text('帳號已被凍結');
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
            if (data === "0") {
                location.reload();
            }
            else if (data === "1") {
                alert("登出失敗");
            }
            else
                alert("未知錯誤");
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

    location.replace("http://localhost/xn/client/product-cart-html");

    $.post(
        "http://localhost/xn/client/product-cart",
        { "data": JSON.stringify(getCart()) },
        function (data) {
            if (data.errno === "0") {
                let unit_html = data.unit_html;
                let units = JSON.parse(units);

                units.forEach(unit => {
                    let img = unit.img ? unit.img : "http://localhost/xn/resource/img/595prodImg20180823033204_1.jpg";
                    $("#cart-units").append(String.format(
                        unit_html,
                        unit.id,
                        img,
                        unit.name,
                        unit.price,
                        unit.count,
                    ));
                });
            } else {
                switch (data.errno) {
                    case "1":

                        break;
                    case "2":

                        break;
                    case "3":

                        break;
                    default:
                        break;
                }
            }
        }
    );
}

refreshCart();