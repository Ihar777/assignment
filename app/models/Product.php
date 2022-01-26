<?php 

declare(strict_types = 1);

use App\abstractClasses\ProductAbstract;

use App\libraries\Database;

    class Product extends ProductAbstract {

        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getProducts() {

            $this->db->query('SELECT *
            FROM products
            ORDER BY id DESC  
            ');

            $results = $this->db->resultSet();

            $results = ($this->db->rowCount() > 0) ? $results : '';

            return $results;
        }

        public function addProduct($data) {

            $productTypes = [
                "DVD" => "Disc",
                "Furniture" => "Furniture",
                "Book" => "Book"
            ];

            require_once $productTypes[$data['producttype']] . '.php'; 

            $productType = new $productTypes[$data['producttype']];

            return $productType->addProduct($data);

        }

        public function deleteProducts($ids) {
            $this->db->query('DELETE FROM products WHERE id IN ('. $ids . ')');
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function checkSku($data) {
            $this->db->query('SELECT * FROM products WHERE sku=:sku;');
            $this->db->bind(':sku', $data['sku']);
            $this->db->execute();
            $data['sku_err'] = $this->db->rowCount() > 0 ? 'Please, enter a unique sku' : '';

            return $data['sku_err'];
        }
    }
?>
