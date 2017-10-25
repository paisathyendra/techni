<?php

namespace Spai\Entity;
use PDO;

class Products
{
    private $id;
    private $product_name;
    private $product_description;
    private $stock;

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id) {
        $this->id = (int)$id;
    }

    /**
     * @return mixed
     */
    public function getProductName() {
        return $this->product_name;
    }

    /**
     * @param $product_name
     */
    public function setProductName($product_name) {
        $this->product_name = $product_name;
    }

    /**
     * @return mixed
     */
    public function getProductDescription() {
        return $this->product_description;
    }

    /**
     * @param $product_description
     */
    public function setProductDescription($product_description) {
        $this->product_description = $product_description;
    }

    /**
     * @return mixed
     */
    public function getStock() {
        return $this->stock;
    }

    /**
     * @param $stock
     */
    public function setStock($stock) {
        $this->stock = $stock;
    }
}
