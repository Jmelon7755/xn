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
                        data = JSON.parse(data);
                        if (data.result) {
                            location.reload();
                        }
                        else {
                            alert("登出失敗");
                        }
                    }
                );
            }
        );
    }
);