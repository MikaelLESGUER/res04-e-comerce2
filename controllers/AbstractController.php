<?php


abstract class AbstractController
{
   protected $template;
   protected $data;
   
   public function render(string $view, array $values): void
   {
      $this->template = $view;
      $this->data = $values;
      
      require 'views/layout.phtml';
   }
}
