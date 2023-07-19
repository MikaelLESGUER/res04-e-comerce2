<?php

class Order {
	private ?int $id;
	private int $user_id;
	private string $order_date;
	private string $address_id;
	public function __construct($user_id,$order_date,$address_id) {
		$this->user_id = $user_id;
		$this->order_date = $order_date;
		$this->address_id = $address_id;
		$this->id = null;
	}
	public function getId() : ?int {
		return $this->id;
	}
	public function getUser_id() : int {
		return $this->user_id;
	}
	public function getOrder_date() : string {
		return $this->order_date;
	}
	public function getAddress_id() : string {
		return $this->address_id;
	}

	public function setId(int $id) : void {
		$this->id = $id;
	}
	public function setUser_id(int $user_id) : void {
		$this->user_id = $user_id;
	}
	public function setOrder_date(string $order_date) : void {
		$this->order_date = $order_date;
	}
	public function setAddress_id(int $address_id) : void {
		$this->address_id = $address_id;
	}
	// static utility method from hell
	public static function createInstanceFromAssoc(array $assoc) : Order {
		$order = new Order(
			$assoc['user_id'],
			$assoc['order_date'],
			$assoc['address']
		);
		$order->setId($assoc['id']);
		return $order;
	}
	// another static utility from hell
	public static function createInstancesArrFromAssocArr(array $arr) : array {
		$orders = [];
		foreach($arr as $i) {
			$order = Order::createInstanceFromAssoc($i);
			array_push($orders,$order);
		}
		return $orders;
	}
}

