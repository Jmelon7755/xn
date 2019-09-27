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

    /**
     * @var ReturnData
     */
    protected $return_data;

    public function __construct(SQLTool $sqltool, UserController $user_controller)
    {
        $this->sql_tool = $sqltool;
        $this->user_controller = $user_controller;
        $this->return_data = new ReturnData;
    }
}
