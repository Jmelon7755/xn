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
    }

    public function adminLoginCheck()
    {
        $login = !is_null($this->user) && $this->user->administrator && !$this->user->freeze;

        if(!$login){
            unset($_SESSION["admin-id"]);
        }

        return $login;
    }

    public function loginCheck()
    {
        $login = !is_null($this->user) && !$this->user->freeze;

        if(!$login){
            unset($_SESSION["user-id"]);
        }

        return $login;
    }

    public function adminLogin($Account, $Password)
    {
        if ($this->adminLoginCheck()) {
            return 1;
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
            return 2;
        }

        $Password = md5($Password);

        $sql_tool = $this->sql_tool;

        $sql_tool->sqlQueryPre(
            "SELECT * FROM `user` WHERE `account`=? And `password`=?",
            ['ss', &$Account, &$Password]
        );

        $result = $sql_tool->result;
        if (!$result || !($user = $result->fetch_object("User"))) {
            return 3;
        }

        if (!$user->administrator)
            return 4;

        // 將資料存入session
        $_SESSION["admin-id"] = $user->id;

        return 0;
    }

    public function logout()
    {
        if (!$this->loginCheck())
            return "1";

        unset($_SESSION["user-id"]);
        return "0";
    }

    public function adminLogout()
    {
        if (!$this->adminLoginCheck())
            return "1";

        unset($_SESSION["admin-id"]);
        return "0";
    }

    public function register($Name, $Account, $Password)
    {
        $Name = htmlspecialchars($Name);

        //驗證
        if (!(strlen($Name) > 0 && strlen($Name) <= 15)) {
            return 1;
        }

        if (preg_match("/^[a-zA-Z0-9.!#$%&’*+\/\=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/", $Account)) {
            //使用信箱註冊
            if (strlen($Account) > 30) {
                return 1;
            }
        } elseif (!preg_match("/^09[0-9]{8}$/", $Account)) {
            //使用手機號碼註冊
            return 1;
        }

        if (!preg_match("/^\w{6,15}$/", $Password))
            return 1;

        $Password = md5($Password);

        $sql_tool = $this->sql_tool;

        //判斷有無相同的用戶註冊過
        $sql_tool->sqlQueryPre(
            "SELECT * FROM `user` WHERE `account`=?",
            ['s', &$Account]
        );
        $result = $sql_tool->result;
        if ($result && $result->fetch_row()) {
            return 2;
        }

        //寫入資料庫
        $sql_tool->sqlQueryPre(
            "INSERT INTO user (`name`, `account`, `password`, `administrator`, `create_time`) VALUES (?, ?, ?, false, NOW())",
            ['sss', &$Name, &$Account, &$Password]
        );
        if (is_null($sql_tool->result)) {
            return 3;
        }

        return 0;
    }

    public function login($Account, $Password)
    {
        if (self::loginCheck())
            return 1;

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
            return 2;
        }

        $Password = md5($Password);

        $sql_tool = $this->sql_tool;

        $sql_tool->sqlQueryPre(
            "SELECT * FROM `user` WHERE `account`=? And `password`=?",
            ['ss', &$Account, &$Password]
        );

        $result = $sql_tool->result;
        if (!$result || !($this->user = $result->fetch_object("User"))) {
            return 3;
        }

        if ($this->user->freeze) {
            return 4;
        }

        // return gettype($user->id)." ".gettype($user->administrator);

        // 將資料存入session
        $_SESSION["user-id"] = $this->user->id;

        return 0;
    }

    public function freezeUsers(array $userIDs, int $freeze)
    {
        if (!$this->adminLoginCheck()) {
            return 1;
        }

        foreach ($userIDs as $userID) {
            if (!$this->setFreezeDBUser($userID, $freeze)) {
                return 2;
            }
        }

        return 0;
    }

    public function upgradeAdmin(string $userID)
    {
        if (!$this->adminLoginCheck()) {
            return 1;
        }

        if ($this->isFreeze($userID)) {
            return 2;
        }

        $this->sql_tool->sqlQueryPre(
            "UPDATE `user` SET `administrator`=1 WHERE `id`=? ;",
            ['i', &$userID]
        );

        return 0;
    }

    public function setFreezeUser(string $userID, int $freeze)
    {
        if (!$this->adminLoginCheck()) {
            return 1;
        }

        if (!$this->setFreezeDBUser($userID, $freeze)) {
            return 2;
        }

        return 0;
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
