<?php 

declare(strict_types = 1);

use App\libraries\Controller;

    class Products extends Controller {
        public function __construct() {
            $this->productModel = $this->model('Product');
        }

        public function index() {
            $products = $this->productModel->getProducts();
            $data = [
                'products' => $products
            ];
            if($products === '') {
                $data = implode(',',$data);
            }

            $this->view('products/index', $data);
        }

        public function addproduct() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'sku' => trim($_POST['sku']),
                    'name' => trim($_POST['name']),
                    'price' => trim($_POST['price']),
                    'producttype' => trim($_POST['producttype']),
                    'size' => trim($_POST['size']),
                    'height' => trim($_POST['height']),
                    'width' => trim($_POST['width']),
                    'length' => trim($_POST['length']),
                    'weight' => trim($_POST['weight']),
                    'sku_err' => '',
                    'name_err' => '',
                    'price_err' => '',
                    'type_err' => '',
                    'size_err' => '',
                    'height_err' => '', 
                    'width_err' => '',
                    'length_err' => '',
                    'weight_err' => ''
                ];

                
                $data['sku_err'] = empty($data['sku']) ? 'Please, submit required data' : ((!preg_match('/^[a-z0-9 .\-]+$/i', $data['sku'])) ? 'Please, provide the data of indicated type' : '');  
                $data['name_err'] = empty($data['name']) ? 'Please, submit required data' : ((!preg_match('/^[a-z0-9 .\-]+$/i', $data['name'])) ? 'Please, provide the data of indicated type' : '');  
                $data['price_err'] = empty($data['price']) ? 'Please, submit required data' : ((!preg_match('/^[0-9.]+$/', $data['price'])) ? 'Please, provide the data of indicated type' : '');
                $data['type_err'] = empty($data['producttype']) ? 'Please, submit required data' : '';
                $data['size_err'] = (empty($data['size']) && $data['producttype'] == 'DVD') ? 'Please, submit required data' : ((!preg_match('/^[0-9.]+$/', $data['size']) && strlen($data['size']) > 0) ? 'Please, provide the data of indicated type' : '');  
                $data['height_err'] = (empty($data['height']) && $data['producttype'] == 'Furniture') ? 'Please, submit required data' : ((!preg_match('/^[0-9.]+$/', $data['height']) && strlen($data['height']) > 0) ? 'Please, provide the data of indicated type' : '');  
                $data['width_err'] = (empty($data['width']) && $data['producttype'] == 'Furniture') ? 'Please, submit required data' : ((!preg_match('/^[0-9.]+$/', $data['width']) && strlen($data['width']) > 0) ? 'Please, provide the data of indicated type' : '');  
                $data['length_err'] = (empty($data['length']) && $data['producttype'] == 'Furniture') ? 'Please, submit required data' : ((!preg_match('/^[0-9.]+$/', $data['length']) && strlen($data['length']) > 0) ? 'Please, provide the data of indicated type' : '');  
                $data['weight_err'] = (empty($data['weight']) && $data['producttype'] == 'Book') ? 'Please, submit required data' : ((!preg_match('/^[0-9.]+$/', $data['weight']) && strlen($data['weight']) > 0) ? 'Please, provide the data of indicated type' : '');  

                $data['sku_err'] = (strlen($data['sku_err']) > 0) ? $data['sku_err'] : $this->productModel->checkSku($data);

                    if(empty($data['sku_err']) && empty($data['name_err'])
                    && empty($data['price_err']) && empty($data['type_err'])
                    && empty($data['size_err']) && empty($data['height_err'])
                    && empty($data['width_err']) && empty($data['length_err'])
                    && empty($data['weight_err'])) {

                    if($this->productModel->addProduct($data)) {
                        redirect('./');
                        var_dump($data);
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    $this->view('products/add', $data);
                    var_dump($data);
                }

            } else {
                $this->view('products/add');
            }
    }

    public function delete() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'  && $_POST['delete'] != '') {
            $ids = $_POST['delete'];
            if($this->productModel->deleteProducts($ids)) {  
                redirect('./');         
            } else {
                die('Something went wrong');
            }
         } else {
            redirect('./');
         }    
    }
}
?>