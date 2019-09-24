<?php
class ProductController extends Controller
{
    public function create(array $data)
    {
        $name = htmlspecialchars($data["name"]);
        $img = htmlspecialchars($data["img"]);
        $comment = htmlspecialchars($data["comment"]);

        $count = $data["count"];
        $price = $data["price"];

        $errno = 0;

        //判斷登入
        if (!$this->user_controller->adminLoginCheck()) {
            $errno = 1;
        }

        //驗證資料合法
        if (!$this->validate(
            $name,
            $count,
            $price,
            $img,
            $comment
        )) {
            $errno = 2;
        }

        //插入資料庫
        $this->sql_tool->sqlQueryPre(
            "INSERT INTO `product`(`img`, `name`, `count`, `price`, `comment`) VALUES (?,?,?,?,?);",
            ["ssiis", &$img, &$name, &$count, &$price, &$comment]
        );

        $data = new stdClass();
        $data->html = file_get_contents("templates/product-manager-row.html");
        $data->errno = $errno;
        $data->product_id = $this->sql_tool->mysqli->insert_id;

        return json_encode($data);
    }

    public function update(int $id, array $data)
    {
        $name = htmlspecialchars($data["name"]);
        $img = htmlspecialchars($data["img"]);
        $comment = htmlspecialchars($data["comment"]);

        $count = $data["count"];
        $price = $data["price"];

        //判斷登入
        if (!$this->user_controller->adminLoginCheck()) {
            return 1;
        }

        //判斷存在
        $sql_tool = $this->sql_tool;
        $sql_tool->sqlQueryPre(
            "SELECT COUNT(*) FROM `product` WHERE `id` = ?;",
            ["i", &$id]
        );
        $result = $sql_tool->result;
        if (!$result || !$result->fetch_row()) {
            return 2;
        }

        //驗證資料合法
        if (!$this->validate(
            $name,
            $count,
            $price,
            $img,
            $comment
        )) {
            return 3;
        }

        //更新資料庫
        $sql_tool->sqlQueryPre(
            "UPDATE `product` SET `img`=?,`name`=?,`count`=?,`price`=?,`comment`=? WHERE `id`=?;",
            ["ssiisi", &$img, &$name, &$count, &$price, &$comment, &$id]
        );

        return 0;
    }

    public function delete(int $id)
    {
        //判斷登入
        if (!$this->user_controller->adminLoginCheck()) {
            return 1;
        }

        //判斷存在
        $sql_tool = $this->sql_tool;
        $sql_tool->sqlQueryPre(
            "SELECT COUNT(*) FROM `product` WHERE `id` = ?;",
            ["i", &$id]
        );
        $result = $sql_tool->result;
        if (!$result || !$result->fetch_row()) {
            return 2;
        }

        //刪除資料庫
        $sql_tool->sqlQueryPre(
            "UPDATE `product` SET `delete_time`=NOW() WHERE `id`=?;",
            ["i", &$id]
        );

        return 0;
    }

    private function validate(
        $name,
        $count,
        $price,
        $img,
        $comment
    ) {
        $name_len = strlen($name);
        if ($name_len <= 0 || $name_len > 50) {
            return false;
        }

        if ($count <= 0 || $count > 9999) {
            return false;
        }

        if ($price <= 0 || $price > 99999) {
            return false;
        }

        if (strlen($img) > 87381) {
            return false;
        }

        $comment_len = strlen($comment);
        if ($comment_len <= 0 || $comment_len > 1000) {
            return false;
        }

        return true;
    }
}
