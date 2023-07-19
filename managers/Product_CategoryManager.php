<?php

    require_once "AbstractManager.php";
    
    class Product_CategoryManager extends AbstractManager
    {
        
        public function getAllProductsCategories() : array
        {
            $query = $this->db->prepare("
                SELECT *
                FROM product_categories
            ");
            $query->execute();
            $all_products_categories = $query->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($all_products_categories as $product_category)
            {
                $new_product_category = new Product_Category(
                     $product_category["name"]
                );   
                $new_product_category->setId($product_category["id"]);
                
                $list_product_category[] = $new_product_category;
            }
            
            return $list_product_category;
        }
        
        public function getProductCategoryById(int $id) : Product_Category
        {
            $query = $this->db->prepare("
                SELECT *
                FROM product_categories
                WHERE id = :id
            ");
            $parameters = 
            [
                "id" => $id
            ];
            $query->execute($parameters);
            
            $result = $query->fetch(PDO::FETCH_ASSOC);
            
            $product_category = new Product_Category (
                $result["name"]
            );
            
            $product_category->setId($result["id"]);
            
            return $product_category;
        }
    }
?>