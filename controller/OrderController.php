<?php
class OrderController extends Controller
{
    public function Create($cart)
    {
        $user_controller = $this->user_controller;

        $return_data = $this->return_data;

        //判斷登入
        if (!$user_controller->loginCheck()) {
            return $return_data->serErrMessage(1, "尚未登入");
        }

        $items = [];

        //判斷數量
        try {
            $cart_json = json_decode($cart);
            $cart_array = array_values((array) $cart_json);
            foreach ($cart_array as $item) {
                if (!($obj = $this->checkCount($item))) {
                    return $return_data->serErrMessage(2, "商品資料已更新");
                }

                $item->name = $obj->name;
                $item->price = $obj->price;

                $items[] = $item;
            }
        } catch (\Throwable $th) {
            return $return_data->setErrCode(3);
        }

        $sql_tool = $this->sql_tool;

        //扣除貨物
        foreach ($items as $item) {
            if (!$sql_tool->sqlQueryPre(
                "UPDATE `product` SET `count`=`count`-? WHERE `id`=?",
                ["ii", &$item->count, &$item->id]
            )) {
                return $return_data->setErrCode(4);
            }
        }

        $items = json_encode($items);

        //記訂單
        if (!$sql_tool->sqlQueryPre(
            "INSERT INTO `product_order`(`user_id`, `content`, `create_time`) VALUES (?, ?, NOW());",
            ["is", &$user_controller->user->id, &$items]
        )) {
            $return_data->setErrCode(5);
        }

        return json_encode($return_data);
    }

    public function detail($order_id)
    {
        $user_controller = $this->user_controller;

        $return_data = $this->return_data;

        //判斷登入
        if (!$user_controller->loginCheck()) {
            return $return_data->setErrCode(1);
        }

        //取出明細
        $sql_tool = $this->sql_tool;
        if (!$sql_tool->sqlQueryPre(
            "SELECT `content` FROM `product_order` WHERE `id`=?;",
            ["i", &$order_id]
        )) {
            return $return_data->setErrCode(6);
        }

        $result = $sql_tool->result;
        if (!$result || !($row = $result->fetch_row()) || count($row) <= 0) {
            return $return_data->setErrCode(6);
        }

        $return_data->data = $row[0];

        return json_encode($return_data);
    }

    private function checkCount($item)
    {
        if (!preg_match("/^\d+$/", $item->count)) {
            return null;
        }

        $sql_tool = $this->sql_tool;
        $sql_tool->sqlQueryPre(
            "SELECT `name`, `price` FROM `product` WHERE `id`=? && `count`>=? && `delete_time`='" . DEFAULT_DATETIME . "';",
            ["ii", &$item->id, &$item->count]
        );

        $result = $sql_tool->result;
        if (!$result || !($obj = $result->fetch_object())) {
            return null;
        }

        return $obj;
    }
}
