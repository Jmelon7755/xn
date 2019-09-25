<?php
class ProductController extends Controller
{
    public function Create($cart)
    {
        //判斷登入
        if (!$this->user_controller->loginCheck()) {
            return 1;
        }

        //判斷數量
        try {
            $cart_json = json_decode($cart);
            $cart_array = array_values((array) $cart_json);
            foreach ($cart_array as $item) {
                $item = json_decode($item);
                if (checkCount($item)) {
                    return 2;
                }
            }
        } catch (\Throwable $th) {
            return 3;
        }

        //記資料庫
        

        return 0;
    }

    private function checkCount($item)
    {
        $sql_tool = $this->sql_tool;
        $sql_tool->sqlQueryPre(
            "SELECT `count` FROM `product` WHERE `id`=? && `count`>=;",
            ["ii", $item->id, $item->count]
        );

        $result = $sql_tool->result;
        if (!$result || !($row = $result->fetch_row()) || count($row) <= 0) {
            return false;
        }

        return true;
    }
}
