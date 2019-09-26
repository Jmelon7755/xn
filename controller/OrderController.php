<?php
class OrderController extends Controller
{
    public function Create($cart)
    {
        $user_controller = $this->user_controller;

        //判斷登入
        if (!$user_controller->loginCheck()) {
            return 1;
        }

        $items = [];

        //判斷數量
        try {
            $cart_json = json_decode($cart);
            $cart_array = array_values((array) $cart_json);
            foreach ($cart_array as $item) {
                if (!($obj = $this->checkCount($item))) {
                    return 2;
                }

                $item->name = $obj->name;
                $item->price = $obj->price;

                $items[] = $item;
            }
        } catch (\Throwable $th) {
            return 3;
        }

        $sql_tool = $this->sql_tool;

        //扣除貨物
        foreach ($items as $item) {
            if (!$sql_tool->sqlQueryPre(
                "UPDATE `product` SET `count`=`count`-? WHERE `id`=?",
                ["ii", &$item->count, &$item->id]
            )) {
                return 4;
            }
        }

        $items = json_encode($items);

        //記訂單
        if (!$sql_tool->sqlQueryPre(
            "INSERT INTO `product_order`(`user_id`, `content`, `create_time`) VALUES (?, ?, NOW());",
            ["is", &$user_controller->user->id, &$items]
        )) {
            return 4;
        }

        return 0;
    }

    public function detail($order_id)
    {
        $user_controller = $this->user_controller;

        //判斷登入
        if (!$user_controller->loginCheck()) {
            return "1";
        }

        //取出明細
        $sql_tool = $this->sql_tool;
        if (!$sql_tool->sqlQueryPre(
            "SELECT `content` FROM `product_order` WHERE `id`=?;",
            ["i", &$order_id]
        )) {
            return "2";
        }

        $result = $sql_tool->result;
        if (!$result || !($row = $result->fetch_row())) {
            return "3";
        }

        return $row[0];
    }

    private function checkCount($item)
    {
        if (!preg_match("/^\d+$/", $item->count)) {
            return null;
        }

        $DEFAULT_DATETIME = DEFAULT_DATETIME;

        $sql_tool = $this->sql_tool;
        $sql_tool->sqlQueryPre(
            "SELECT `name`, `price` FROM `product` WHERE `id`=? && `count`>=? && `delete_time`='$DEFAULT_DATETIME';",
            ["ii", &$item->id, &$item->count]
        );

        $result = $sql_tool->result;
        if (!$result || !($obj = $result->fetch_object())) {
            return null;
        }

        return $obj;
    }
}
