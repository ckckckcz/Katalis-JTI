<?php

// class ini digunakan untuk berjalannya aplikasi
class App {
  protected $controller = "HomeGuest";
  protected $method = "index";
  protected $params = [];

  public function __construct()  {
    $url = $this->parseUrl();

    // check jika mengirim url kosong
    if (is_null($url)) {
      $url[0] = $this->controller;
    }

    // chek apakah ada file controller di folder
    // jika ada maka diganti ke controller yang ada
    if(file_exists('./server/controller/' . $url[0] . '.php')) {
      $this->controller = $url[0];
      unset($url[0]);
    } else {
      $this->controller = "ErrorHandler";
      $this->method = "pageNotFound";
    }
    require_once './server/controller/' . $this->controller . '.php';
    $this->controller = new $this->controller;

    // check method nya apa ada jika ada maka diganti
    if (isset($url[1])) {
      if (method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
      }
    }

    // check params jika ada maka di simpan dalam $params
    if (!empty($url)) {
      $this->params = array_values($url);
    }

    // menjalankan controller & method, serta kirimkan params jika ada
    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  public function parseUrl() {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url']);
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
}
