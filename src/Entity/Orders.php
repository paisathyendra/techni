<?php

namespace Spai\Entity;
use PDO;

class Orders
{
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $phone;
    private $address;
    private $created_on;

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
    public function getFirstName() {
        return $this->first_name;
    }

    /**
     * @param $first_name
     */
    public function setFirstName($first_name) {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName() {
        return $this->last_name;
    }

    /**
     * @param $last_name
     */
    public function setLastName($last_name) {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @param $email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhone() {
        return $this->phone;
    }

    /**
     * @param $phone
     */
    public function setPhone($phone) {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * @param $address
     */
    public function setAddress($address) {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getCreatedOn() {
        return $this->created_on;
    }

    /**
     * @param $created_on
     */
    public function setCreatedOn($created_on) {
        $this->created_on = $created_on;
    }

    /**
     * Save Order
     */
    public function save() {
        try {
            $query = $this->pdo->prepare("INSERT INTO orders VALUES (NULL,?,?,?,?,?,?)");
            $values = array($this->getFirstName(), $this->getLastName(), $this->getEmail(), $this->getPhone(), $this->getAddress(), $this->getCreatedOn());
            $query->execute($values);
            return $this->pdo->lastInsertId();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
