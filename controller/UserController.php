<?php

class UserController
{
    /**
     * @var User
     */
    public $user;

    /**
     * @var SQLTool
     */
    private $sql_tool;

    public function __construct(SQLTool $sql_tool, $user_id)
    {
        $this->sql_tool = $sql_tool;
        $this->user = $this->getUser($user_id);
        $this->return_data = new ReturnData;
    }

    public function adminLoginCheck()
    {
        $login = !is_null($this->user) && $this->user->administrator && !$this->user->freeze;

        if (!$login) {
            unset($_SESSION["admin-id"]);
        }

        return $login;
    }

    public function loginCheck()
    {
        $login = !is_null($this->user) && !$this->user->freeze;

        if (!$login) {
            unset($_SESSION["user-id"]);
        }

        return $login;
    }

    public function adminLogin($Account, $Password)
    {
        $return_data = $this->return_data;

        if ($this->adminLoginCheck()) {
            return $return_data->setErrCode(18);
        }

        //驗證
        $invalid = false;
        if (preg_match("/^[a-zA-Z0-9.!#$%&’*+\/\=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/", $Account)) {
            //使用信箱登入
            $invalid |= strlen($Account) > 30;
        } else {
            //使用手機號碼登入
            $invalid |= !preg_match("/^09\d{8}$/", $Account);
        }
        $invalid |= !preg_match("/^\w{6,15}$/", $Password);
        if ($invalid) {
            return $return_data->setErrCode(12);
        }

        $Password = md5($Password);

        $sql_tool = $this->sql_tool;

        $sql_tool->sqlQueryPre(
            "SELECT * FROM `user` WHERE `account`=? And `password`=?",
            ['ss', &$Account, &$Password]
        );

        $result = $sql_tool->result;
        if (!$result || !($user = $result->fetch_object("User"))) {
            return $return_data->setErrCode(13);
        }

        if (!$user->administrator) {
            return $return_data->serErrMessage(14, "非管理員帳號");
        }

        // 將資料存入session
        $_SESSION["admin-id"] = $user->id;

        return json_encode($return_data);
    }

    public function logout()
    {
        $return_data = $this->return_data;

        if (!$this->loginCheck()) {
            return $return_data->setErrCode(1);
        }

        unset($_SESSION["user-id"]);
        return json_encode($return_data);
    }

    public function adminLogout()
    {
        $return_data = $this->return_data;

        if (!$this->adminLoginCheck()) {
            return $return_data->setErrCode(1);
        }

        unset($_SESSION["admin-id"]);
        return json_encode($return_data);
    }

    public function register($Name, $Account, $Password)
    {
        $Name = htmlspecialchars($Name);

        $return_data = $this->return_data;

        //驗證
        if (!(strlen($Name) > 0 && strlen($Name) <= 15)) {
            return $return_data->setErrCode(17);
        }

        if (preg_match("/^[a-zA-Z0-9.!#$%&’*+\/\=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/", $Account)) {
            //使用信箱註冊
            if (strlen($Account) > 30) {
                return $return_data->setErrCode(17);
            }
        } elseif (!preg_match("/^09[0-9]{8}$/", $Account)) {
            //使用手機號碼註冊
            return $return_data->setErrCode(17);
        }

        if (!preg_match("/^\w{6,15}$/", $Password)) {
            return $return_data->setErrCode(17);
        }

        $Password = md5($Password);

        $sql_tool = $this->sql_tool;

        //判斷有無相同的用戶註冊過
        $sql_tool->sqlQueryPre(
            "SELECT * FROM `user` WHERE `account`=?",
            ['s', &$Account]
        );
        $result = $sql_tool->result;
        if ($result && $result->fetch_row()) {
            return $return_data->setErrCode(15, "該帳號已被註冊");
        }

        //寫入資料庫
        $sql_tool->sqlQueryPre(
            "INSERT INTO user (`name`, `account`, `password`, `administrator`, `create_time`) VALUES (?, ?, ?, false, NOW())",
            ['sss', &$Name, &$Account, &$Password]
        );
        if (is_null($sql_tool->result)) {
            return $return_data->setErrCode(16);
        }

        return json_encode($return_data);
    }

    public function login($Account, $Password)
    {
        $return_data = $this->return_data;

        if ($this->loginCheck()) {
            return $return_data->setErrCode(18);
        }

        //驗證
        $invalid = false;
        if (preg_match("/^[a-zA-Z0-9.!#$%&’*+\/\=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/", $Account)) {
            //使用信箱登入
            $invalid |= strlen($Account) > 30;
        } else {
            //使用手機號碼登入
            $invalid |= !preg_match("/^09\d{8}$/", $Account);
        }
        $invalid |= !preg_match("/^\w{6,15}$/", $Password);
        if ($invalid) {
            return $return_data->setErrCode(12);
        }

        $Password = md5($Password);

        $sql_tool = $this->sql_tool;

        $sql_tool->sqlQueryPre(
            "SELECT * FROM `user` WHERE `account`=? And `password`=?",
            ['ss', &$Account, &$Password]
        );

        $result = $sql_tool->result;
        if (!$result || !($this->user = $result->fetch_object("User"))) {
            return $return_data->setErrCode(13);
        }

        if ($this->user->freeze) {
            return $return_data->setErrMessage(19, "該帳號已凍結");
        }

        // return gettype($user->id)." ".gettype($user->administrator);

        // 將資料存入session
        $_SESSION["user-id"] = $this->user->id;

        return json_encode($return_data);
    }

    public function freezeUsers(array $userIDs, int $freeze)
    {
        $return_data = $this->return_data;

        if (!$this->adminLoginCheck()) {
            return $return_data->setErrCode(1);
        }

        foreach ($userIDs as $userID) {
            if (!$this->setFreezeDBUser($userID, $freeze)) {
                return $return_data->setErrCode(20);
            }
        }

        return json_encode($return_data);
    }

    public function upgradeAdmin(string $userID)
    {
        $return_data = $this->return_data;

        if (!$this->adminLoginCheck()) {
            return $return_data->setErrCode(1);
        }

        if ($this->isFreeze($userID)) {
            return $return_data->setErrCode(19);
        }

        if (!$this->sql_tool->sqlQueryPre(
            "UPDATE `user` SET `administrator`=1 WHERE `id`=? ;",
            ['i', &$userID]
        )) {
            return $return_data->setErrCode(21);
        }

        return json_encode($return_data);
    }

    public function setFreezeUser(string $userID, int $freeze)
    {
        $return_data = $this->return_data;

        if (!$this->adminLoginCheck()) {
            return $return_data->setErrCode(1);
        }

        if (!$this->setFreezeDBUser($userID, $freeze)) {
            return $return_data->setErrCode(20);
        }

        return json_encode($return_data);
    }

    private function setFreezeDBUser(string $userID, int $freeze)
    {
        if ($this->isAdmin($userID)) {
            return false;
        }

        $this->sql_tool->sqlQueryPre(
            "UPDATE `user` SET `freeze`=$freeze WHERE `id`=? ;",
            ['i', &$userID]
        );
        return true;
    }

    private function getUser(string $userID)
    {
        $sql_tool = $this->sql_tool;
        $sql_tool->sqlQueryPre(
            "SELECT * FROM `user` WHERE `id`=?",
            ['i', &$userID]
        );

        $result = $sql_tool->result;
        if (
            !$result ||
            !($user = $result->fetch_object("User"))
        ) {
            return null;
        }

        return $user;
    }

    private function isAdmin($user_id)
    {
        if (!($user = $this->getUser($user_id))) {
            return false;
        }

        return $user->administrator;
    }

    private function isFreeze($user_id)
    {
        if (!($user = $this->getUser($user_id))) {
            return false;
        }

        return $user->freeze;
    }
}
