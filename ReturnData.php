<?php

// Error Code
// 1:未登入
// 2:商品資料已更新
// 3:購物車訂單確認錯誤
// 4:購買扣除貨物錯誤
// 5:訂單記錄錯誤
// 6:明細取出錯誤
// 7:產品資料驗證錯誤
// 8:產品資料庫插入失敗
// 9:產品不存在
// 10:更新產品資料庫失敗
// 11:產品刪除資料庫失敗
// 12:登入資料驗證錯誤
// 13:取得user資料錯誤
// 14:非管理員帳號
// 15:該帳號已被註冊
// 16:user資料庫寫入失敗
// 17:註冊驗證失敗
// 18:已登入
// 19:該帳號已凍結
// 20:凍結失敗
// 21:使用者資料庫更新失敗

class ReturnData
{
    /**
     * @var bool
     */
    public $result = true;

    /**
     * @var int
     */
    public $err_code = 0;

    /**
     * @var string
     */
    public $err_message = "";

    public $data = null;

    public function setErrCode($err_code)
    {
        $this->err_code = $err_code;
        $this->setResult();
        return json_encode($this);
    }

    public function serErrMessage($err_code, $err_message)
    {
        $this->err_code = $err_code;
        $this->err_message = $err_message;
        $this->setResult();
        return json_encode($this);
    }

    private function setResult()
    {
        $this->result = $this->err_code === 0 && !$this->err_message;
    }
}