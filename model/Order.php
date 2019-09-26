<?php
class Order extends Model
{
    public $id;
    public $user_id;
    public $content;
    public $create_time;
    public $delete_time;

    public function __construct()
    {
        $this->type_s = "iisss";
        parent::__construct();
    }
}
