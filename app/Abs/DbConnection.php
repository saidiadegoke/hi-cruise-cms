<?php
namespace App\Abs;

class DbConnection implements ConnectionInterface
{
	public function __construct() {
		var_dump('Use MySQL Connection');
	}

	public function connect() {}
}