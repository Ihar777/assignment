<?php 

declare(strict_types = 1);

use App\libraries\Database;


class Book extends Product {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }


    public function addProduct($data) {

        $this->db->query('INSERT INTO products (sku, name, price, type, weight) VALUES(:sku, :name, :price, :producttype, :weight);');

        $this->db->bind(':sku', $data['sku']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':producttype', $data['producttype']);
        $this->db->bind(':weight', $data['weight'] ?  $data['weight'] : 0);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}


?>