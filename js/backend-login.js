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
                data = JSON.parse(data);

                if (data.result) {
                    window.location.replace("http://localhost/xn/backend");
                } else {
                    if (data.err_code === 14) {
                        $("#login-failed").text(data.err_message);
                    }
                    else {
                        alert("登入失敗");
                    }
                }
            }
        ).fail(function () {
            alert("backend login fail");
        });
    }
});