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
        $this->render("views/user/account.phtml", [
            "user" => $this->userManager->getUserById($_SESSION["user_id"]), 
            "orders" => $this->orderManager->getOrdersByUserId($_SESSION["user_id"]),
            "adress" => $this->adressManager->getAddressById($_SESSION["user_id"])
            ]);
    }
}