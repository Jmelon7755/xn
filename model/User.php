<?php

class User extends Model
{
    public $id;
    public $name;
    public $account;
    public $password;
    public $administrator;
    public $create_time;
    public $freeze;

    public function __construct()
    {
        $this->type_s = "isssbsb";
        parent::__construct();
    }
}
