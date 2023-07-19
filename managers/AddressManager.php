<?php

  class AddressManager
  {
      
     public function getAddressByUserId(int $user_id) : Address{
         
         $query = $this->db->prepare("
            SELECT * 
            FROM addresses
            WHERE id = :id
         ");
         $parameters = 
         [
            "id"=>$user_id         
         ];
         $query->execute($parameters);
         $result = $query->fetch(PDO::FETCH_ASSOC);
         
         $address = new Address(
             $result["pays"],
             $result["address"],
             $result["code_postal"]
             );
             
         return $address;
     }
     
      
      
  }

// **********créer fonction createAddress()****************


?>