<?php

class SQLTool
{
	public $mysqli;
	public $result;

	public function __construct(\mysqli $mysqli)
	{
		$this->mysqli = $mysqli;
		if($this->mysqli->connect_errno)
			return;
			
		$this->mysqli->query("SET NAMES utf8");
		$this->mysqli->select_db("xn");
	}

	public function sqlQueryPre($sql, $params)
	{
		$this->result = null;

		$stmt = $this->mysqli->prepare($sql);
		if (!$stmt) {
			return;
		}

		call_user_func_array(array($stmt, 'bind_param'), $params);
		if (!$stmt->execute()) {
			return;
		}

		$this->result = $stmt->get_result();
	}

	public function sqlQuery($sql)
	{
		$this->result = $this->mysqli->query($sql);
	}

	public function fetchObjectAll(string $class_name, bool $reverse = false)
	{
		$datas = [];

		if (!$this->result) {
			return [];
		}

		while ($object = $this->result->fetch_object($class_name)) {
			if ($reverse) {
				array_unshift($datas, $object);
			} else {
				array_push($datas, $object);
			}
		}

		return $datas;
	}

	public function close()
	{
		if ($this->result) {
			$this->result->free();
		}
		$this->mysqli->close();
	}
}
