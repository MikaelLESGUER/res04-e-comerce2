<?php
    
    require_once "AbstractController.php";
    
    class ProductController extends AbstractController
    {
        public function getProductsByCategory ()
        {
            /*if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $formName = $_POST["formName"];
                
                if ($formName === "getProductCategory")
                {
                    $product_category_id = $this->manager->getProductCategoryById($_POST["category_list"]);
                    $products_list = $this->manager->getProductsByCategoryId($product_category_id);
                    $this->render("order/order-products", $products_list);
                }
            }
            $this->render("order/order-products", []);*/
        }
    }
?>