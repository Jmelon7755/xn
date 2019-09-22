jqReplaceClick(
    $("#logout-a"),
    function (event) {
        event.preventDefault();

        confirmModal(
            "警告",
            "確定要登出嗎?",
            "登出",
            function () {
                jqPost(
                    "http://localhost/xn/backend/logout",
                    {},
                    function (data) {
                        if (data === "0") {
                            location.reload();
                        }
                        else {
                            switch (data) {
                                case "1":
                                    alert("未登入");
                                    window.location.replace("http://localhost/xn/backend");
                                    break;
                                default:
                                    alert("未知錯誤");
                                    break;
                            }
                        }
                    }
                );
            }
        );
    }
);