<?php
namespace App\Abs\Order;

class DbOrderRepository implements OrderRepositoryInterface
{
	public function getAll() {
		echo "Get all orders from DB";
	}
}