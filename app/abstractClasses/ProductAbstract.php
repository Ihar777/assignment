<?php 

    declare(strict_types = 1);

    namespace App\abstractClasses;

    abstract class ProductAbstract {

        abstract protected function getProducts();
        
        abstract protected function addProduct($data);

        abstract protected function deleteProducts($id);

        abstract protected function checkSku($data);
    }
?>