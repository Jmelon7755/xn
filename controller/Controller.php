<?php

class Controller
{
    /**
     * @var SQLTool
     */
    protected $sql_tool;

    /**
     * @var UserController
     */
    protected $user_controller;

    public function __construct(SQLTool $sqltool, UserController $user_controller)
    {
        $this->sql_tool = $sqltool;
        $this->user_controller = $user_controller;
    }
}
