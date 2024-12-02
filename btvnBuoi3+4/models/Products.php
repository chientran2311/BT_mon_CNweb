<?php
include_once 'config.php';
Class Products {
    private $ProductId;
    private $ProductName;
    private $price;

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host='.DB_HOST .';dbname='. DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function setProduct($ProductName, $Price) {
        $this->ProductName = $ProductName;
            $this->price = $Price;
    }

    public function store(){
        $sql = $this->db->prepare('INSERT INTO products (productname,price) values (:productName,:Price)');
        $sql->bindParam(':productName', $this->ProductId, PDO::PARAM_STR);
        $sql->bindParam(':Price', $this->ProductName, PDO::PARAM_INT);
    }
    public function update() {
        $sql = $this->db->prepare('Update products set `productname` = :productName, `price` = :Price where productid = :Productid');
        $sql->bindParam(':productName', $this->ProductName, PDO::PARAM_STR);
        $sql->bindParam(':Price', $this->price, PDO::PARAM_INT);
        $sql->bindParam(':Productid', $this->ProductId, PDO::PARAM_INT);
        $sql->execute();
    }
    public function delete()
    {
        $sql = $this->db->prepare('DELETE FROM products WHERE productid = :id');
        $sql->bindParam(':id', $this->ProductId, PDO::PARAM_INT);
        $sql->execute();
    }
    public function getAllData() {
        $sql = $this->db->prepare('SELECT * from products');
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getDataById() {
        $query = $this->db->prepare('SELECT * FROM products WHERE productid = :id');
        $query->bindParam(':id', $this->ProductId, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function getProductId() {
         return $this->ProductId;
    }
    public function getProductName() {
        return $this->ProductName;
    }
    public function getPrice() {
        return $this->price;
    }
    public function setProductID($ProductId) {
        $this->ProductId = $ProductId;
    }
    public function setPrice($Price) {
        $this->price = $Price;
    }
    public function setProductName($ProductName) {
        $this->ProductName = $ProductName;
    }
    
}