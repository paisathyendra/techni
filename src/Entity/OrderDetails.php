<?php

namespace Spai\Entity;
use PDO;

class OrderDetails
{
    private $id;
    private $order_id;
    private $product_id;
    private $quantity;

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
        $this->id = (int) $id;
    }

    /**
     * @return mixed
     */
    public function getOrderId() {
        return $this->order_id;
    }

    /**
     * @param $order_id
     */
    public function setOrderId($order_id) {
        $this->order_id = (int) $order_id;
    }

    /**
     * @return mixed
     */
    public function getProductId() {
        return $this->product_id;
    }

    /**
     * @param $product_id
     */
    public function setProductId($product_id) {
        $this->product_id = (int) $product_id;
    }

    /**
     * @return mixed
     */
    public function getQuantity() {
        return $this->quantity;
    }

    /**
     * @param $quantity
     */
    public function setQuantity($quantity) {
        $this->quantity = (int) $quantity;
    }

    /**
     * Save Order
     */
    public function save() {
        try {
            $query = $this->pdo->prepare("INSERT INTO order_details VALUES (NULL,?,?,?)");
            $query->execute(array($this->getOrderId(), $this->getProductId(), $this->getQuantity()));
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
