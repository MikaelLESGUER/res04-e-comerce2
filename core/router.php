<?php 

function checkRoute($route)
{
    $userController = new UserController();
    $product_CategoryController = new Product_CategoryController();
    $orderController = new OrderController();
    
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
        $orderController->getOrdersByUser_id();
    }
    else if($route === "order-create")
    {
        $orderController->create();
    }
    else if($route === "")
    {
        $userController->login();
    }
}