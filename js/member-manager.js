function checkFreezeBtnShow() {
    let $show = false;
    $(".row-select-checkbox").each(function () {
        if ($(this).prop("checked")) {
            $show = true;
            return false;
        }
    });
    if ($show) {
        $("#all-freeze-btn").attr("disabled", false);
    }
    else {
        $("#all-freeze-btn").attr("disabled", true);
    }
}

function getRowUserID(jqObj) {
    return jqObj.parent().parent().prop("id");
}

function freezeFuncCallback(event, user_id, confirmText, freeze, failMessage) {
    event.preventDefault();

    confirmModal(
        "警告",
        confirmText,
        "確定",
        function () {
            jqPost(
                "http://localhost/xn/backend/set-freeze-user",
                {
                    "user-id": user_id,
                    "freeze": freeze
                },
                function (data) {
                    data = JSON.parse(data);
                    if (data.result) {
                        location.reload();
                    } else {
                        alert(failMessage);
                    }
                }
            );
        }
    );
}

checkFreezeBtnShow();

if ($(".row-select-checkbox").length > 0) {
    $("#all-select-div").show();
    $(".checkbox-col").show();
}
else {
    $("#all-select-div").show();
    $(".checkbox-col").hide();
}

jqReplaceClick(
    $("#all-freeze-btn"),
    function () {
        let userIDs = [];
        $(".row-select-checkbox").each(function () {
            if (!$(this).prop("checked")) {
                return;
            }

            userIDs.push(getRowUserID($(this)));
        });

        confirmModal(
            "警告",
            "確定要凍結選取的會員嗎?",
            "批量凍結",
            function () {
                jqPost(
                    "http://localhost/xn/backend/freeze-users",
                    {
                        "user-ids": userIDs
                    },
                    function (data) {
                        data = JSON.parse(data);
                        if (data.result) {
                            location.reload();
                        } else {
                            alert("凍結失敗");
                        }
                    }
                );
            }
        );
    }
);

jqReplaceClick(
    $("#all-select-checkbox"),
    function () {
        let all_select = $("#all-select-checkbox").prop("checked");
        $(".row-select-checkbox").prop("checked", all_select);
        checkFreezeBtnShow();
    }
);

jqReplaceClick(
    $(".row-select-checkbox"),
    function () {
        checkFreezeBtnShow();
    }
);

jqReplaceClick(
    $(".unlock-a"),
    function (event) {
        freezeFuncCallback(event, getRowUserID($(this)), "確定要解凍該會員嗎?", 0, "解凍失敗");
    }
);

jqReplaceClick(
    $(".lock-a"),
    function (event) {
        freezeFuncCallback(event, getRowUserID($(this)), "確定要凍結該會員嗎?", 1, "凍結失敗");
    }
);

jqReplaceClick(
    $(".upgrade-admin-a"),
    function (event) {
        event.preventDefault();

        let userID = getRowUserID($(this))

        confirmModal(
            "警告",
            "確定要升級該會員為一般管理員嗎?",
            "升級",
            function () {
                jqPost(
                    "http://localhost/xn/backend/upgrade-admin",
                    {
                        "user-id": userID
                    },
                    function (data) {
                        data = JSON.parse(data);
                        if (data.result) {
                            location.reload();
                        } else {
                            alert("升級失敗");
                        }
                    }
                );
            }
        );
    }
);
