<?php

define("DEFAULT_DATETIME", "0001-01-01 00:00:00");

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
require_once('../libs/smarty-3.1.33/libs/Smarty.class.php');
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
            require_once("model/Product.php");
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
            if (!isset($_POST["data"])) {
                break;
            }

            $exit_s = getProductController($sql_tool, $user_controller)->create($_POST["data"]);
            break;
        case "backend/update-product":
            if (!isset($_POST["id"]) || !isset($_POST["data"])) {
                break;
            }

            $exit_s = (string) getProductController($sql_tool, $user_controller)->update($_POST["id"], $_POST["data"]);
            break;
        case "backend/delete-product":
            if (!isset($_POST["id"])) {
                break;
            }

            $exit_s = (string) getProductController($sql_tool, $user_controller)->delete($_POST["id"]);
            break;
    }
} elseif (preg_match("/^client/", $URL)) {
    $user_controller = getUserController($sql_tool, "user-id");

    switch ($URL) {
        case "client":
            require_once("model/Product.php");
            getSmartyController($sql_tool, $user_controller, $smarty)->product();
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
        case "client/product-info":
            if (!isset($_GET["id"])) {
                break;
            }

            require_once("model/Product.php");
            getSmartyController($sql_tool, $user_controller, $smarty)->productInfo($_GET["id"]);
            exit();
        case "client/product-cart":
            if(!isset($_POST["data"])) {
                exit();
            }

            getSmartyController($sql_tool, $user_controller, $smarty)->productCart($_POST["data"]);
            exit();
    }
}

$sql_tool->close();

exit($exit_s);
