<?php

return [
    ['GET', '/orders', ['Spai\Controllers\OrderController', 'fetchOrders']],
    ['GET', '/orders/{id:\d+}', ['Spai\Controllers\OrderController', 'fetchOrderById']],
    ['POST', '/orders', ['Spai\Controllers\OrderController', 'insertOrder']],
];
