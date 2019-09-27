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

        $return_data = $this->return_data;

        //驗證資料合法
        if (!$this->validate(
            $name,
            $count,
            $price,
            $img,
            $comment
        )) {
            return $return_data->setErrCode(7);
        }

        //判斷登入
        if (!$this->user_controller->adminLoginCheck()) {
            return $return_data->setErrCode(1);
        }

        //插入資料庫
        if (!$this->sql_tool->sqlQueryPre(
            "INSERT INTO `product`(`img`, `name`, `count`, `price`, `comment`) VALUES (?,?,?,?,?);",
            ["ssiis", &$img, &$name, &$count, &$price, &$comment]
        )) {
            return $return_data->setErrCode(8);
        }

        $return_data->data = new stdClass;
        $return_data->data->html = file_get_contents("templates/product-manager-row.html");
        $return_data->data->product_id = $this->sql_tool->mysqli->insert_id;
        $return_data->data = json_encode($this->return_data->data);

        return json_encode($return_data);
    }

    public function update(int $id, array $data)
    {
        $name = htmlspecialchars($data["name"]);
        $img = htmlspecialchars($data["img"]);
        $comment = htmlspecialchars($data["comment"]);

        $count = $data["count"];
        $price = $data["price"];

        $return_data = $this->return_data;

        //判斷登入
        if (!$this->user_controller->adminLoginCheck()) {
            return $return_data->setErrCode(1);
        }

        //判斷存在
        $sql_tool = $this->sql_tool;
        $sql_tool->sqlQueryPre(
            "SELECT COUNT(*) FROM `product` WHERE `id` = ?;",
            ["i", &$id]
        );
        $result = $sql_tool->result;
        if (!$result || !$result->fetch_row()) {
            return $return_data->setErrCode(9);
        }

        //驗證資料合法
        if (!$this->validate(
            $name,
            $count,
            $price,
            $img,
            $comment
        )) {
            return $return_data->setErrCode(7);
        }

        //更新資料庫
        if (!$sql_tool->sqlQueryPre(
            "UPDATE `product` SET `img`=?,`name`=?,`count`=?,`price`=?,`comment`=? WHERE `id`=?;",
            ["ssiisi", &$img, &$name, &$count, &$price, &$comment, &$id]
        )) {
            return $return_data->setErrCode(10);
        }

        return json_encode($return_data);
    }

    public function delete(int $id)
    {
        $return_data = $this->return_data;

        //判斷登入
        if (!$this->user_controller->adminLoginCheck()) {
            return $return_data->setErrCode(1);
        }

        //判斷存在
        $sql_tool = $this->sql_tool;
        $sql_tool->sqlQueryPre(
            "SELECT COUNT(*) FROM `product` WHERE `id` = ?;",
            ["i", &$id]
        );
        $result = $sql_tool->result;
        if (!$result || !$result->fetch_row()) {
            return $return_data->setErrCode(9);
        }

        //刪除資料庫
        if (!$sql_tool->sqlQueryPre(
            "UPDATE `product` SET `delete_time`=NOW() WHERE `id`=?;",
            ["i", &$id]
        )) {
            return $return_data->setErrCode(11);
        }

        return json_encode($return_data);
    }

    public function productCheck($cart)
    {
        $cart = array_values((array) json_decode($cart));

        $sql_tool = $this->sql_tool;
        $not_exist_ids = [];
        $DEFAULT_DATETIME = DEFAULT_DATETIME;
        foreach ($cart as $item) {
            $sql_tool->sqlQueryPre(
                "SELECT `id` FROM `product` WHERE `id`=? && (`count`<=0 || `delete_time`!='$DEFAULT_DATETIME');",
                ["i", &$item->id]
            );
            if ($sql_tool->result && $sql_tool->result->fetch_row()) {
                array_push($not_exist_ids, $item->id);
            }
        }

        $return_data = $this->return_data;
        $return_data->data = json_encode($not_exist_ids);

        return json_encode($return_data);
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

        if ($count <= 0 || $count > 9999 || !preg_match("/^\d+$/", $count)) {
            return false;
        }

        if ($price <= 0 || $price > 99999 || !preg_match("/^\d+$/", $price)) {
            return false;
        }

        if (strlen($img) > 2861738) {
            return false;
        }

        $comment_len = strlen($comment);
        if ($comment_len <= 0 || $comment_len > 1000) {
            return false;
        }

        return true;
    }
}
