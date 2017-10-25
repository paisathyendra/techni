<?php

namespace Spai\Repository;

use PDO;
use Spai\Entity\OrderDetails;
use Spai\Entity\Orders;

class OrderRepository
{
    /**
     * @var PDO
     */
    private $pdo;

    /**
     * OrderRepository constructor
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    /**
     * Fetch Orders
     * @return array
     */
    public function getOrders(){
        $sql = 'SELECT id, first_name, last_name FROM orders';
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Fetch Order By Id
     * @param $id
     * @return mixed
     */
    public function getOrderById($id){
        $sql = "SELECT o.*, od.* FROM orders o LEFT JOIN order_details od ON O.id = OD.order_id WHERE order_id = :order_id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute(array(':order_id' => $id));
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param $product_id
     * @return mixed
     */
    public function getProductById($product_id) {
        $sql = "SELECT * FROM products WHERE id = :product_id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute(array(':product_id' => $product_id));
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param $order
     * @return mixed
     */
    public function saveOrder($order) {
        try {
            $orders = new Orders($this->pdo);
            $orders->setFirstName($order->first_name);
            $orders->setLastName($order->last_name);
            $orders->setPhone($order->phone);
            $orders->setEmail($order->email);
            $orders->setAddress($order->address);
            $orders->setCreatedOn(date('Y-m-d H:i:s'));

            $order_id = $orders->save();

            $orderDetailsobj = new OrderDetails($this->pdo);

            $orderDetails = $order->order_details;

            foreach ($orderDetails as $orderDetailValue) {
                $orderDetailsobj->setOrderId($order_id);
                $orderDetailsobj->setProductId($orderDetailValue->product_id);
                $orderDetailsobj->setQuantity($orderDetailValue->quantity);

                $orderDetailsobj->save();
            }
            return $order_id;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Validate Order Fields
     * @param $order
     */
    public function validateOrderFields($order) {
        if(empty($order->first_name)) {
            throw new \InvalidArgumentException("First Name cannot be blank");
        }
        if(empty($order->last_name)) {
            throw new \InvalidArgumentException("Last Name cannot be blank");
        }
        if(empty($order->phone)) {
            throw new \InvalidArgumentException("Phone number cannot be blank");
        }
        if(strlen($order->phone) < 10) {
            throw new \InvalidArgumentException("Invalid Phone Number");
        }
        if(empty($order->email)) {
            throw new \InvalidArgumentException("Email cannot be blank");
        }
        if(empty($order->address)) {
            throw new \InvalidArgumentException("Address cannot be blank");
        }
    }

    /**
     * Validate Order Detail Fields
     * @param $order
     * @throws \Exception
     */
    public function validateOrderDetailFields($order) {
        if(!isset($order->order_details) || count($order->order_details) == 0) {
            throw new \InvalidArgumentException("Invalid Order");
        }

        foreach($order->order_details as $od) {
            $product_details = $this->getProductById($od->product_id);

            if(empty($product_details)) {
                throw new \InvalidArgumentException("Invalid Product");
                break;
            }
            if($product_details['stock'] == 0) {
                throw new \Exception("Product Stock Not available");
                break;
            }
        }
    }
}