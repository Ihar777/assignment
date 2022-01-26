<?php 

declare(strict_types = 1);

use App\libraries\Database;


class Furniture extends Product {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }


    public function addProduct($data) {

        $this->db->query('INSERT INTO products (sku, name, price, type, height, width, length) VALUES(:sku, :name, :price, :producttype, :height, :width, :length);');

        $this->db->bind(':sku', $data['sku']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':producttype', $data['producttype']);
        $this->db->bind(':height', $data['height'] ?  $data['height'] : 0);
        $this->db->bind(':width', $data['width'] ?  $data['width'] : 0);
        $this->db->bind(':length', $data['length'] ?  $data['length'] : 0);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}

?>