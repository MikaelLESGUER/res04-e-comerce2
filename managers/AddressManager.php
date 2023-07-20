<?php
    
    class AddressManager extends AbstractManager
    {
      
    public function getAddressByUserId(int $user_id) : ? Address{
        
        $query = $this->db->prepare("
           SELECT * 
           FROM addresses
           WHERE id = :id
        ");
        $parameters = 
        [
           "id" => $user_id         
        ];
        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        
        if($result)
        {
            $address = new Address(
            $result["pays"],
            $result["address"],
            $result["code_postal"],
            $result["user_id"]
            );
           return $address;
        }
        else
        {
           return null;
        }
    }
    
    public function checkAdressSetByUserId(int $user_id) : bool
    {
        $query = $this->db->prepare('
            SELECT * FROM addresses WHERE user_id = :user_id
        ');
        $parameters = [
            'user_id' => $user_id
        ];
        $query->execute($parameters);
        $address = $query->fetch(PDO::FETCH_ASSOC);
        
        if($address)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
     
    public function insertAddress(Address $address)
    {
        // if($this->checkAdressSetByUserId($address->getUserId()))
        // {
        //     $query = $this->db->prepare('
        //     	UPDATE addresses 
        //     	SET pays = :pays, 
        //     	address = :address, 
        //     	code_postal = :code_postal, 
        //     	city = :city, 
        //     	user_id = :user_id
        //     ');
        //     $parameters = [
               
        //         'pays' => $address->getPays(),
        //         'address' => $address->getAddress(),
        //         'code_postal' => $address->getCode_postal(),
        //         'city' => $address->getCity(),
        //         'user_id' => $address->getUserId()
        //     ];
        //     $query->execute($parameters);
        // }
        // else
        // {
            $query = $this->db->prepare('
            	INSERT INTO addresses (pays, address, code_postal, city, user_id)
            	VALUES (:pays, :address, :code_postal, :city, :user_id)
            ');
            $parameters = [
               
                'pays' => $address->getPays(),
                'address' => $address->getAddress(),
                'code_postal' => $address->getCode_postal(),
                'city' => $address->getCity(),
                'user_id' => $address->getUserId()
            ];
            $query->execute($parameters);
        // }
    }
 }

    


?>