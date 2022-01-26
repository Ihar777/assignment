<?php 

declare(strict_types = 1);

use App\libraries\Database;


class Disc extends Product {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }


    public function addProduct($data) {

        $this->db->query('INSERT INTO products (sku, name, price, type, size) VALUES(:sku, :name, :price, :producttype, :size);');

        $this->db->bind(':sku', $data['sku']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':producttype', $data['producttype']);
        $this->db->bind(':size', $data['size'] ?  $data['size'] : 0);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}


?>