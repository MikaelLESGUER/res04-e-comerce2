<?php

class Address {
   private ?int $id;
   private string $pays;
   private string $address;
   private int $code_postal;
   public function __construct($pays,$address,$code_postal) {
      $this->pays = $pays;
      $this->address = $address;
      $this->code_postal = $code_postal;
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
   
   public function setId(int $id) : void {
		$this->id = $id;
	}
   public function setUser_id(string $pays) : void {
      $this->pays = $pays;
   }
   public function setAddress(string $address) : void {
      $this->address = $address;
   }
   public function setCode_postal(int $code_postal) : void {
      $this->code_postal = $code_postal;
   }
}