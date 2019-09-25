<?php

class SmartyController extends Controller
{
    private $smarty;

    public function __construct(SQLTool $sqltool, UserController $user_controller, Smarty $smarty)
    {
        parent::__construct($sqltool, $user_controller);
        $this->smarty = $smarty;
    }

    public function product()
    {
        $DEFAULT_DATETIME = DEFAULT_DATETIME;

        $sql_tool = $this->sql_tool;
        $sql_tool->sqlQuery("SELECT * FROM `product` WHERE `count` > 0 && `delete_time` = '$DEFAULT_DATETIME';");
        $products = $sql_tool->fetchObjectAll("Product");

        $this->smarty->assign(
            "user_name",
            $this->user_controller->loginCheck() ? $this->user_controller->user->name : ""
        );
        $this->smarty->assign("products", $products);
        $this->smarty->display("product.html");
    }

    public function memberManager()
    {
        if (!$this->checkAdminLogin()) {
            return;
        }

        $sql_tool = $this->sql_tool;
        $sql_tool->sqlQuery("SELECT * FROM `user`;");
        $users = $sql_tool->fetchObjectAll("user");

        $this->smarty->assign("users", $users);
        $this->smarty->assign("user_name", $this->user_controller->user->name);
        $this->smarty->display("member-manager.html");
    }

    public function productManager()
    {
        if (!$this->checkAdminLogin()) {
            return;
        }

        $sql_tool = $this->sql_tool;

        $DEFAULT_DATETIME = DEFAULT_DATETIME;
        $sql_tool->sqlQuery("SELECT * FROM `product` WHERE `delete_time` = '$DEFAULT_DATETIME';");
        $products = $sql_tool->fetchObjectAll("Product");

        $this->smarty->assign("user_name", $this->user_controller->user->name);
        $this->smarty->assign("products", $products);
        $this->smarty->display("product-manager.html");
    }

    public function checkAdminLogin()
    {
        if (!$this->user_controller->adminLoginCheck()) {
            $this->smarty->display("backend-login.html");
            return false;
        }
        return true;
    }

    public function productInfo($id)
    {
        $DEFAULT_DATETIME = DEFAULT_DATETIME;

        $sql_tool = $this->sql_tool;
        $sql_tool->sqlQueryPre(
            "SELECT * FROM `product` WHERE `id`=? && `delete_time`='$DEFAULT_DATETIME';",
            ["i", &$id]
        );

        $product = $sql_tool->result->fetch_object("Product");

        $count_max = min(20, $product->count);

        $smarty = $this->smarty;
        $smarty->assign("product", $product);
        $smarty->assign("count_max", $count_max);
        $smarty->display("product-info.html");
    }

    public function productCart($cart)
    {
        $old_cart_json = $cart = json_decode($cart);

        $cart = array_values((array) $cart);

        $sql_tool = $this->sql_tool;
        $datas = [];
        foreach ($cart as $item) {
            $sql_tool->sqlQueryPre(
                "SELECT `img`, `name`, `price` FROM `product` WHERE `id`=?;",
                ["i", &$item->id]
            );

            if (!$sql_tool->result || !($product = $sql_tool->result->fetch_object())) {
                unset($old_cart_json["id" + $item->id]);
                continue;
            }

            $data = new stdClass;
            $data->id = $item->id;
            $data->img = $product->img;
            $data->name = $product->name;
            $data->price = $product->price;
            $data->count = $item->count;

            array_push($datas, $data);
        }

        setcookie("cart", json_encode($old_cart_json));

        $smarty = $this->smarty;
        $this->smarty->assign(
            "user_name",
            $this->user_controller->loginCheck() ? $this->user_controller->user->name : ""
        );
        $smarty->assign("carts", $datas);
        $smarty->display("cart.html");
    }
}
