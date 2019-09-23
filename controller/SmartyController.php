<?php

class SmartyController extends Controller
{
    private $smarty;

    public function __construct(SQLTool $sqltool, UserController $user_controller, Smarty $smarty)
    {
        parent::__construct($sqltool, $user_controller);
        $this->smarty = $smarty;
    }

    public function menuPage()
    {
        $sql_tool = $this->sql_tool;
        $sql_tool->sqlQuery("SELECT * FROM `product` WHERE `product`.`count` > 0;");
        $products = $sql_tool->fetchObjectAll("Product");

        $this->smarty->assign(
            "user_name",
            $this->user_controller->loginCheck() ? $this->user_controller->user->name : ""
        );
        $this->smarty->assign("products", $products);
        $this->smarty->display("client.html");
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
}
