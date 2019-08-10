<?php

namespace App\Abs;

use App\Abs\ConnectionInterface;

class MongoDBConnection implements ConnectionInterface
{
	public function __construct() {
		echo 'MongoDBConnection Class \n';
	}

	public function connect() {
		echo 'MongoDBConnection Class \n';
	}
}

