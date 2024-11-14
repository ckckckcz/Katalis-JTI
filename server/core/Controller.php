<?php 

class Controller {
  public function view($view, $data = []) {
    require_once 'client/' . $view . '.php';
  }

  public function model($model) {
    require_once 'server/model/' . $model . '.php';
    return new $model;
  }
}