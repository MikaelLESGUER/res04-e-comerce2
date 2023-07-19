<?php 
if(isset($_GET["route"])){
    $route = $_GET["route"];
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
        
    }
    else if($route === "")
    {
        
    }
}
else
{
    $userController->login();
   /* echo "404 : Page Not Found";*/
}