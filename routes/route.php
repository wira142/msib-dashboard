<?php

class Routes
{
  private $directories;
  private $home = '/msib-dashboard/';
  public function __construct($url)
  {
    $this->url = $url;

    $this->directories = [
      $this->home => function () {
        return include_once "pages/dashboard.php";
      },
      $this->home . "index.php" => function () {
        return include_once "pages/dashboard.php";
      },
      $this->home . "index.php" . "?page=add-employee" => function () {
        return include_once "pages/employee_form.php";
      },
      $this->home . "index.php" . "?page=orders" => function () {
        return include_once "pages/orders.php";
      },
      $this->home . "index.php" . "?page=customers" => function () {
        return include_once "pages/customers.php";
      },
      $this->home . "index.php" . "?page=cards" => function () {
        return include_once "pages/cards.php";
      },
      $this->home . "index.php" . "?page=products" => function () {
        return include_once "pages/products.php";
      },
      $this->home . "index.php" . "?page=type-products" => function () {
        return include_once "pages/type_product.php";
      },
      $this->home . "index.php" . "?page=login" => function () {
        return include_once "pages/login.php";
      },
      $this->home . "index.php" . "?page=register" => function () {
        return include_once "pages/register.php";
      },
      $this->home . "index.php" . "?page=about" => function () {
        return include_once "pages/about.php";
      },
      $this->home . "index.php" . "?page=contact" => function () {
        return include_once "pages/contact.php";
      },
    ];
  }
  public function getFile()
  {
    try {
      @$this->directories[$this->url]();
    } catch (\Throwable $th) {
      return include_once "pages/404.php";
    }
  }
}
