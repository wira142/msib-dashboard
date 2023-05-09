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
      $this->home . "index.php" . "?page=order-insert" => function () {
        return include_once "pages/insert-order.php";
      },
      $this->home . "index.php" . "?page=order-detail&id=" => function () {
        return include_once "pages/order-detail.php";
      },
      $this->home . "index.php" . "?page=customers" => function () {
        return include_once "pages/customers.php";
      },
      $this->home . "index.php" . "?page=customer-insert" => function () {
        return include_once "pages/insert-customer.php";
      },
      $this->home . "index.php" . "?page=customer-detail&id=" => function () {
        return include_once "pages/detail-customer.php";
      },
      $this->home . "index.php" . "?page=cards" => function () {
        return include_once "pages/cards.php";
      },
      $this->home . "index.php" . "?page=card-insert" => function () {
        return include_once "pages/insert-card.php";
      },
      $this->home . "index.php" . "?page=card-detail&id=" => function () {
        return include_once "pages/card-detail.php";
      },
      $this->home . "index.php" . "?page=products" => function () {
        return include_once "pages/products.php";
      },
      $this->home . "index.php" . "?page=product-detail&id=" => function () {
        return include_once "pages/product-detail.php";
      },
      $this->home . "index.php" . "?page=product-insert" => function () {
        return include_once "pages/insert-product.php";
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
      if (str_contains($this->url, 'id=')) {
        $new_url = substr($this->url, 0, strpos($this->url, "&id=") + 4);
        // $id = substr($this->url, strpos($this->url, "&id=") + 4, strpos($this->url, "&id="));
        @$this->directories[$new_url]();
      } else {
        @$this->directories[$this->url]();
      }
    } catch (\Exception $th) {
      return include_once "pages/404.php";
    }
  }
}
