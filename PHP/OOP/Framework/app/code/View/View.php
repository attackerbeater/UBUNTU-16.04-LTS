<?php
namespace code\View;

class View {

	// private $model;
    private $controller;

    public function __construct($controller) {
        $this->controller = $controller;
        // $this->model = $model;
    }

    public function output() {
        return $this->controller->execute();
    }
}
