<?php
class Car {
    private $id;
    private $brand;
    private $model;
    private $productionYear;
    private $userId;

    public function __construct($brand, $model, $productionYear, $userId) {
        $this->brand = $brand;
        $this->model = $model;
        $this->productionYear = $productionYear;
        $this->userId = $userId;
    }

}
?>
