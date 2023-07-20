<?php

class OrderManager extends AbstractManager {
	
	public function getOrderBy_id(int $id) : Order 
	{
		$query = $this->db->prepare('
			SELECT * FROM orders WHERE id = :id
		');
		$parameters = [
			'id' => $id
		];
		$query->execute($parameters);
		$order = $query->fetch(PDO::FETCH_ASSOC);
		$orderInstance = new Order($order["user_id"], $order["order_date"], $order["amount"], $order["quantity"]);
		return $orderInstance;
	}
	
	public function getOrdersByUserId(int $user_id) : array{
		$query = $this->db->prepare('
			SELECT * FROM orders WHERE user_id = :id
		');
		$parameters = [
			'id' => $user_id
		];
		$query->execute($parameters);
		$orders = $query->fetchAll(PDO::FETCH_ASSOC);
		$ordersTab = [];
		foreach($orders as $order)
		{
			$orderInstance = new Order($user_id, $order["order_date"], $order["amount"], $order["quantity"]);
			array_push($orderTab, $orderInstance);
		}
		
		return $orderTab;
	}
	
	public function addOrder(Order $order)
	{
		$query = $this->db->prepare('
			INSERT INTO orders (user_id, order_date, address_id)
			VALUES (:user_id, :order_date, :address_id)
		');
		$parameters = [
				'user_id' => $order-getUser_id(),
				'order_date' => $order->getOrder_date(),
				'address_id' => $order->getAddress_id()
			];
		$query->execute($parameters);
	}
	
	public function addOrder_ProductRelation(int $order_id, int $product_id) 
	{
		$query = $this->db->prepare('
			INSERT INTO order_products (order_id, product_id)
			VALUES (:order_id, :product_id)
		');
		$parameters = [
				'order_id' => $order_id,
				'product_id' => $product_id
			];
		$query->execute($parameters);
	}
	
}
