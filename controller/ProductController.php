<?php
class ProductController extends Controller
{
    public function create(string $name, int $count, int $price, string $img, string $comment)
    {
        $name = htmlspecialchars($name);
        $img = htmlspecialchars($img);
        $comment = htmlspecialchars($comment);

        if (!$this->user_controller->adminLoginCheck()) {
            return 1;
        }

        $name_len = strlen($name);
        if ($name_len <= 0 || $name_len > 50) {
            return 2;
        }

        if($count <= 0 || $count > 9999) {
            return 2;
        }

        if($price <= 0 || $price > 99999) {
            return 2;
        }

        if (strlen($img) > 87381) {
            return 2;
        }

        $comment_len = strlen($comment);
        if($comment_len <= 0 || $comment_len > 1000) {
            return 2;
        }

        $this->sql_tool->sqlQueryPre(
            "INSERT INTO `product`(`img`, `name`, `count`, `price`, `comment`) VALUES (?,?,?,?,?)",
            ["siiss", &$name, &$count, &$price, &$img, &$comment]
        );

        return 0;
    }
}
