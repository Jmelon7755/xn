$("form").submit(function (event) {

    event.preventDefault();

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
            "http://localhost/xn/backend/login",
            {
                "account": Account,
                "password": Password
            },
            function (data) {
                if (data === "0") {
                    window.location.replace("http://localhost/xn/backend");
                }
                else {
                    switch (data) {
                        case "1":
                            alert("已登入");
                            window.location.replace("http://localhost/xn/backend");
                            break;
                        case "2":
                            $("#login-failed").text('帳號或密碼格式錯誤');
                            break;
                        case "3":
                            $("#login-failed").text('帳號或密碼錯誤');
                            break;
                        case "4":
                            $("#login-failed").text('非管理員帳號');
                            break;
                        default:
                            alert("未知錯誤");
                            break;
                    }
                }
            }
        ).fail(function () {
            alert("backend login fail");
        });
    }
});