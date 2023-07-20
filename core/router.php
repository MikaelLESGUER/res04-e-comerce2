<?php 

function checkRoute($route)
{
    $userController = new UserController();
    $product_CategoryController = new Product_CategoryController();
    $orderController = new OrderController();
    $accountController = new AccountController();
    
    if($route === "user-register")
    {
        $userController->register();
    }
    else if($route === "user-login" )
    {
        $userController->login();
    }
    else if($route === "user-logout" )
    {
        $userController->logout();
    }
    else if($route === "order-products" )
    {
        $product_CategoryController->productCategoriesIndex();
    }
    else if($route === "user-past-orders" )
    {
        $orderController->getOrdersByUserId();
    }
    else if($route === "order-create")
    {
        $orderController->create();
    }
    else if($route === "user-account")
    {
        $accountController->displayAccount();
    }
    else if($route === "add-address")
    {
        $accountController->addAddress();
    }
    else if($route === "reset-mdp")
    {
        $accountController->resetMDP();
    }
    else{
        $userController->login();
    }
}