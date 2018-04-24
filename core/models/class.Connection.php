<?php

class Connection extends mysqli {
	
	public function __construct() {
		parent::__construct(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if ($this->connect_errno) {
			die($this->connect_error);
		}
		// $this->setcharset("utf8");
	}

	public function rows($query) {
		return mysqli_num_rows($query);
	}

	public function free($query) {
		return mysqli_free_result($query);
	}

	public function browse($query) {
		return mysqli_fetch_array($query);
	}

}