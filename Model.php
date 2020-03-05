<?php
namespace app;
use PDO;
include ('config.php');

class Model

{
    public $db = null;

    public function __construct()

    {
        try {
            $this->db = new PDO(DRIVER_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
}