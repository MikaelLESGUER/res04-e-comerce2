<?php

class Order {
	
	
	private ?int $id;
	private int $user_id;
	private string $order_date;
	private string $amount;
	private int $quantity;
	
	public function __construct(string $user_id, string $order_date, string $amount, int $quantity) {
		$this->user_id = $user_id;
		$this->order_date = $order_date;
		$this->amount = $amount;
		$this->quantity = $quantity;
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
	
	public function getAmount() : string {
		return $this->amount;
	}
	
	public function getQuantity() : int {
		return $this->quantity;
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
	
	public function setAmount(string $amount) {
		$this->amount = $amount;
	}
	
	public function setQuantity (int $quantity) {
		$this->quantity = $quantity;
	}
}

