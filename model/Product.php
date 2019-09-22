<?php

class Product extends Model
{
    public $id;
    public $img;
    public $name;
    public $count;
    public $price;
    public $comment;
    public $delete_time;

    public function __construct()
    {
        $this->type_s = "issiiss";
        parent::__construct();
    }
}