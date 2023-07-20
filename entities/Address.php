<?php

class Address {
   
   private ?int $id;
   private string $pays;
   private string $address;
   private int $code_postal;
   private string $city;
   private int $user_id;
   
   public function __construct(string $pays, string $address, int $code_postal, string $city, int $user_id) {
      $this->pays = $pays;
      $this->address = $address;
      $this->code_postal = $code_postal;
      $this->city = $city;
      $this->user_id = $user_id;
      $this->id = null;
   }
   public function getId() : ?int {
		return $this->id;
	}
   public function getPays() : string {
		return $this->pays;
	}
   public function getAddress() : string {
		return $this->address;
	}
   public function getCode_postal() : int {
		return $this->code_postal;
	}
	public function getCity() : string {
		return $this->city;
	}
	public function getUserId() : int {
		return $this->user_id;
	}
   
   public function setId(int $id) : void {
		$this->id = $id;
	}
   public function setPays(string $pays) : void {
      $this->pays = $pays;
   }
   public function setAddress(string $address) : void {
      $this->address = $address;
   }
   public function setCodePostal(int $code_postal) : void {
      $this->code_postal = $code_postal;
   }
   public function setCity(int $city) : void {
      $this->city = $city;
   }
   public function setUserId(int $user_id) : void {
      $this->user_id = $user_id;
   }
}