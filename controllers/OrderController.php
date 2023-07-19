<?php

    require_once "AbstractController.php";
  
    class OrderController extends AbstractController
    {
        private OrderManager $orderManager;
        private AddressManager $addressManager;
    
        public function __construct()
        {
            $this->orderManager = new OrderManager();
            $this->addressManager = new AddressManager();
        }
        
        public function getOrdersByUser_id ()
        {
            if(isset($_SESSION["user_id"]))
            {
                $past_orders = $this->orderManager->getOrdersByUser_id($_SESSION["user_id"]);
                $this->render("user/read-past-orders", $past_orders);
            }
            else
            {
                header("Location:index.php?route=user-login");
                exit();
            }
        }
      
        public function create() {
            if (isset($_POST)) {
                $address = new Address(
                        $_POST['address_pays'],
                        $_POST['address_details'],
                        $_POST['address_code_postal']
                    );
                $address_updated = $addressManager->createAddress($address); // à ajouter au addressManager (qui doit retourner un object Address avec l'id)
                $currentDate = date("Y-m-d H:i:s", time());
                $order = new Order(
                        $_SESSION['user_id'],
                        $current_date,
                        $address_updated->getId()
                    );
                $order_updated = $orderManager->addOrder($order);
                // ajoute les informations nécessaires à la table de liaison entre order et products           
                $products_ids = $_POST['products_ids'];
                foreach($products_ids as $product_id) {
                    $orderManager->addOrder_ProductRelation($order_updated->getId(),$product_id);
                }
            }
            header("Location:index.php?route=order-products");
            exit();

        public function getListOrdersByUser ()
        {
            if(isset($_SESSION["user_id"]))
            {
                $past_orders = $this->orderManager->getOrdersByUser_id($_SESSION["user_id"]);
                
                foreach($past_orders as $order)
                {
                    $orders_address = $this->addressManager->getAddressById($order->getAddress_id());
                    $orders_list[] = "order" => $order, "adresse" => $order_address;
                    //pas sûre que ça fonctionne mais l'idée c'est de récuérer les commandes et leur adresses et les stocker dans $data pour pouvoir les afficher sur read-past-orders.phtml
                }
                $this->render("user/read-past-orders", $orders_list);
            }
            else
            {
                header("Location:index.php?route=user-login");
            }
        }
    }
?>