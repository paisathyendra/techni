<?php

namespace Spai\Controllers;

use Http\Request;
use Http\Response;
use PDO;
use Spai\Repository\OrderRepository;

class OrderController
{
    /**
     * @var Request
     */
	private $request;

    /**
     * @var Response
     */
	private $response;

    /**
     * @var PDO
     */
	private $pdo;

    /**
     * @var OrderRepository
     */
	private $orderRepo;

    /**
     * Order constructor.
     * @param Request $request
     * @param Response $response
     * @param OrderRepository $orderRepo
     * @param PDO $pdo
     */
	public function __construct(Request $request, Response $response, OrderRepository $orderRepo, PDO $pdo){
		$this->request = $request;
        $this->response = $response;
        $this->orderRepo = $orderRepo;
        $this->pdo = $pdo;
	}

    /**
     * Fetch Orders
     */
	public function fetchOrders() {
        $orders = $this->orderRepo->getOrders();
        $this->response->setContent(json_encode($orders, JSON_FORCE_OBJECT));
    }

    /**
     * Fetch Order By Id
     * @param $params
     */
    public function fetchOrderById($params) {
        $order = $this->orderRepo->getOrderById($params['id']);
        $this->response->setContent(json_encode($order, JSON_FORCE_OBJECT));
    }

    /**
     * Submit Order
     * ToDo Update Stock once order is placed successfully
     */
    public function submitOrder() {
        try {
            $orderDetailsJson = file_get_contents('php://input');
            $orderDetails = json_decode($orderDetailsJson);
            $this->orderRepo->validateOrderFields($orderDetails);
            $this->orderRepo->validateOrderDetailFields($orderDetails);
            $order_id = $this->orderRepo->saveOrder($orderDetails);
            $this->response->setContent($order_id);
        } catch (\InvalidArgumentException $iaex) {
            $this->response->setStatusCode(400);
            $this->response->setContent($iaex->getMessage());
        } catch (\Exception $ex) {
            $this->response->setContent($ex->getMessage());
        }
    }

}