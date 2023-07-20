<?php

class AccountController extends AbstractController
{
    private UserManager $userManager;
    private OrderManager $orderManager;
    private AddressManager $addressManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
        $this->orderManager = new OrderManager();
        $this->addressManager = new AddressManager();
    }
    
    public function displayAccount()
    {
        $user = $this->userManager->getUserById($_SESSION["user_id"]);
        $orders = $this->orderManager->getOrdersByUserId($_SESSION["user_id"]);
        $address = $this->addressManager->getAddressByUserId($_SESSION["user_id"]);
        
        
        $this->render("views/user/account.phtml", [
            "user" => $user, 
            "orders" => $orders,
            "adress" => $address
            ]);
    }
    
    public function addAddress()
    {
        if(isset($_POST["pays"], $_POST["adresse"], $_POST["codepostal"], $_POST["ville"]))
        {
            $address = new Address($_POST["pays"], $_POST["adresse"], $_POST["codepostal"], $_POST["ville"], $_SESSION["user_id"]);
            $this->addressManager->insertAddress($address);
        }
    }
}