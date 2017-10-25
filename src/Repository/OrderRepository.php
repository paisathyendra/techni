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
}