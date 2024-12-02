<?php
include_once("models/Products.php");

class ProductController {
    public function index() {
        $object = new Products();
        $productList = $object->getAllData();
        require 'views/index.php';
    }
    public function create() {
        require 'views/create.php';

    }
    public function store() {
        if (
            isset($_POST['ProductName']) &&
            isset($_POST['Price'])
        ) {
            $product = new Products();
            $product->setProduct($_POST['ProductName'],$_POST['Price']);
            $product->store();
            header('location: index.php?controller=product&action=index');
    }
    }
    public function update() {
        $id = $_GET['id'];
        $object = new Products();
        $object->setProductID($id);
        $product = $object->getDataById();
        require 'views/update.php';
    }
    public function save() {
        if (
            isset($_POST["ProductId"]) &&
            isset($_POST["ProductName"]) &&
            isset($_POST["Price"])
        ) {
            $product = new Products();

            $product->setProduct($_POST["ProductName"],$_POST["Price"]);
            $product->setProductID($_POST["ProductId"]);

            $product->update();

            header('location: index.php?controller=product&action=index');
        }
    }
    public function delete()
    {
        $id = $_GET['id'];
        $product = new Products();
        $product->setProductID($id);
        $product->delete();
        header('Location: index.php?controller=product&action=index');
    }
}