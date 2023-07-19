<?php
    
    class Product
    {
        private ?int $id;
        private string $name;
        private string $description;
        private int $price;
        private string $image;
        private int $category_id;
        
        public function __construct(string $name, string $description, int $price, string $image, int $category_id)
        {
            $this->id = null;
            $this->name = $name;
            $this->description = $description;
            $this->price = $price;
            $this->image = $image;
            $this->category_id = $category_id;
        }
        
        public function getId () : ?int
        {
            return $this->id;
        }
        public function setId(?int $id) : void
        {
            $this->id = $id;
        }
        
        public function getName () : string
        {
            return $this->name;
        }
        public function setName (string $name) : void
        {
            $this->name = $name;
        }
        
        public function getDescription () : string
        {
            return $this->description;
        }
        public function setDescription (string $description) : void
        {
            $this->description = $description;
        }
        
        public function getPrice () : int
        {
            return $this->price;
        }
        public function setPrice(int $price) : void
        {
            $this->price = $price;
        }
        
        public function getImage () : string
        {
            return $this->image;
        }
        public function setImage (string $image) : void
        {
            $this->image = $image;
        }
        
        public function getCategory_id () : int
        {
            return $this->category_id;
        }
        public function setCategory_id (int $category_id) : void
        {
            $this->category_id = $category_id;
        }
        
    }
?>