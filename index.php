<?php

function getUserController($sql_tool, $sessionKey)
{
    $user_id = isset($_SESSION["$sessionKey"]) ? $_SESSION["$sessionKey"] : 0;
    return new UserController($sql_tool, $user_id);
}

function getSmartyController($sql_tool, $user_controller, $smarty)
{
    require_once("controller/SmartyController.php");
    return new SmartyController($sql_tool, $user_controller, $smarty);
}

function getProductController($sql_tool, $user_controller)
{
    require_once("controller/ProductController.php");
    return new ProductController($sql_tool, $user_controller);
}

require_once("model/Model.php");
require_once("model/User.php");
require_once("controller/Controller.php");
require_once("controller/UserController.php");
require_once('/opt/lampp/htdocs/libs/smarty-3.1.33/libs/Smarty.class.php');
require_once("SQLTool.php");

const HOST = "127.0.0.1";
const USER_NAME = "melon_liao";
const PASSWORD = "ilovecyg";

$sql_tool = new SQLTool(new mysqli(HOST, USER_NAME, PASSWORD));

$smarty = new Smarty();
$smarty->left_delimiter = '{{';
$smarty->right_delimiter = '}}';

$URL = $_GET['URL'];

session_start() or exit("ssd");

$exit_s = "404";
if (preg_match("/^backend/", $URL)) {
    $user_controller = getUserController($sql_tool, "admin-id");

    switch ($URL) {
        case "backend":
        case "backend/member-manager":
            $smartyController = getSmartyController($sql_tool, $user_controller, $smarty);
            $smartyController->memberManager();
            exit();
        case "backend/product-manager":
            $smartyController = getSmartyController($sql_tool, $user_controller, $smarty);
            $smartyController->productManager();
            exit();
        case "backend/login":
            if (!isset($_POST["account"]) || !isset($_POST["password"])) {
                break;
            }

            $exit_s = (string) $user_controller->adminLogin($_POST["account"], $_POST["password"]);
            break;
        case "backend/logout":
            $exit_s = (string) $user_controller->adminLogout();
            break;
        case "backend/freeze-users":
            if (!isset($_POST["user-ids"])) {
                break;
            }

            $exit_s = (string) $user_controller->freezeUsers($_POST["user-ids"], 1);
            break;
        case "backend/upgrade-admin":
            if (!isset($_POST["user-id"])) {
                break;
            }

            $exit_s = (string) $user_controller->upgradeAdmin($_POST["user-id"]);
            break;
        case "backend/set-freeze-user":
            if (!isset($_POST["user-id"]) || !isset($_POST["freeze"])) {
                break;
            }

            $exit_s = (string) $user_controller->setFreezeUser($_POST["user-id"], $_POST["freeze"]);
            break;
        case "backend/create-product":
            if (!isset($_POST["name"]) || !isset($_POST["count"]) || !isset($_POST["price"]) || !isset($_POST["img"]) || !isset($_POST["comment"])) {
                break;
            }

            $exit_s = (string) getProductController($sql_tool, $user_controller)->create(
                $_POST["name"],
                $_POST["count"],
                $_POST["price"],
                $_POST["img"],
                $_POST["comment"]
            );
        break;
    }
} elseif (preg_match("/^client/", $URL)) {
    $user_controller = getUserController($sql_tool, "user-id");

    switch ($URL) {
        case "client":
            require_once("model/Product.php");
            getSmartyController($sql_tool, $user_controller, $smarty)->menuPage();
            exit();
        case "client/register":
            if (!isset($_POST["name"]) || !isset($_POST["account"]) || !isset($_POST["password"])) {
                break;
            }

            $exit_s = (string) $user_controller->register($_POST["name"], $_POST["account"], $_POST["password"]);
            break;
        case "client/login":
            if (!isset($_POST["account"]) || !isset($_POST["password"])) {
                break;
            }

            $exit_s = (string) $user_controller->login($_POST["account"], $_POST["password"]);
            break;
        case "client/logout":
            $exit_s = (string) $user_controller->logout();
            break;
    }
}

$sql_tool->close();

exit($exit_s);
