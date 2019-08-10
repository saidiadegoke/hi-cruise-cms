<?php
namespace App\Abs;

use App\Abs\ConnectionInterface;

class PasswordReset
{
	public function __construct(ConnectionInterface $conn) {
		$this->conn = $conn;
	}

	public function toString() {
		var_dump($this->conn);
	}
}