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
		$result = $query->fetch(PDO::FETCH_ASSOC);
		//a voir
		return $order;
	}
	
	public function getOrdersByUserId(int $id) : Order{
		$query = $this->db->prepare('
			SELECT * FROM orders WHERE user_id = :id
		');
		$parameters = [
			'id' => $id
		];
		$query->execute($parameters);
		$result = $query->fetch(PDO::FETCH_ASSOC);
		$order = new Order(); // class Order.php a revoir
		return $order;
	}
	
	public function getOrdersByUserId(int $user_id) : array 
	{
		$query = $this->db->prepare('
			SELECT * FROM orders WHERE user_id = :user_id
		');
		$parameters = [
			'user_id' => $user_id
		];
		$query->execute($parameters);
		$results = $query->fetchAll(PDO::FETCH_ASSOC);
		//a voir
		
		return $orders;
	}
	
	public function getOrdersByAddress_id(int $address_id) : array 
	{
		$query = $this->db->prepare('
			SELECT * FROM orders WHERE address_id = :address_id
		');
		$parameters = [
			'address_id' => $address_id
		];
		$query->execute($parameters);
		$results = $query->fetchAll(PDO::FETCH_ASSOC);
		//a voir
		return $orders;
	}

	public function getLastOrdersSortedByOrder_date(int $n = 10) : array 
	{
		$query = $this->db->prepare('
			SELECT * FROM orders 
			ORDER BY order_date DESC 
			LIMIT :n
		');
		$parameters = [
			'n' => $n
		];
		$query->execute($parameters);
		$results = $query->fetchAll(PDO::FETCH_ASSOC);
		//a voir
		return $orders;
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
