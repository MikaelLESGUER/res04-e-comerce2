<?php
    session_start();
    
    require "core/router.php";
    
    require "entities/Address.php";
    require "entities/Order.php";
    require "entities/Product.php";
    require "entities/Product_Category.php";
    require "entities/User.php";
     
    require "managers/AbstractManager.php";
    require "managers/UserManager.php";
    require "managers/OrderManager.php";
    require "managers/Product_CategoryManager.php";
    require "managers/ProductManager.php";
    require "managers/AddressManager.php";
    
    require "controllers/AbstractController.php";
    require "controllers/OrderController.php";
    require "controllers/Product_CategoryController.php";
    require "controllers/ProductController.php";
    require "controllers/UserController.php";
    require "controllers/AddressController.php";
    require "controllers/AccountController.php";
    
    if(isset($_GET["route"])){
        checkRoute($_GET["route"]);
    }
    else{
        checkRoute("");
    }
    
?>
