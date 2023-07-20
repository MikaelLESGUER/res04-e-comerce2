<?php

class Order {
	
	
	private ?int $id;
	private int $user_id;
	private string $order_date;
	private string $address_id;
	
	
	public function __construct(string $user_id, string $order_date, int $address_id) {
		$this->user_id = $user_id;
		$this->order_date = $order_date;
		$this->address_id = $address_id;
		$this->id = null;
	}
	public function getId() : ?int {
		return $this->id;
	}
	public function getUserId() : int {
		return $this->user_id;
	}
	public function getOrderDate() : string {
		return $this->order_date;
	}
	public function getAddressId() : string {
		return $this->address_id;
	}

	public function setId(int $id) : void {
		$this->id = $id;
	}
	public function setUserId(int $user_id) : void {
		$this->user_id = $user_id;
	}
	public function setOrderDate(string $order_date) : void {
		$this->order_date = $order_date;
	}
	public function setAddressId(int $address_id) : void {
		$this->address_id = $address_id;
	}
	
}

