<?php
require_once('controllers/base_controller.php');
require_once('models/page.php');

class PagesController extends BaseController
{
  function __construct()
  {
    $this->folder = 'pages';
  }

  public function home()
  {
    $pages = Page::getData();
    $data = array('pages' => $pages);
    $this->render('home', $data);
  }

  public function timkiem()
  {
    if(isset($_GET['tukhoa'])) {
      $tukhoa = $_GET['tukhoa'];
    }
    $pages_s = Page::timkiem($tukhoa);
    if ($pages_s===NULL) {
      $this->render('error');
    } else {
      $data = array('pages' => $pages_s);
      $this->render('home', $data);
    }
  }

  public function xoabang()
  {
    if(isset($_GET['id'])) {
      $id = $_GET['id'];
      $status = Page::xoabang($id);
      if ($status['status']===false) {
        $this->render('error');
      }
      $pages = Page::getData();
      $data = array('pages' => $pages);
      $this->render('home', $data);
    }
  }
  public function them()
  {
    if(isset($_POST['add'])) {
      $id = $_POST['id'];
      $hoten = $_POST['hoten'];
      $tuoi = $_POST['tuoi'];
      $status = Page::them($id,$hoten,$tuoi);
      $pages = Page::getData();
      $data = array('pages' => $pages);
      $this->render('home', $data);
    }
  }
  public function update()
  {
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $pages = Page::getDataid($id);
      $data = array('pages' => $pages);
      $this->render('update', $data);
    }
  }
  public function updatesuccess()
  {
    if(isset($_POST['ok'])) {
      $id = $_POST['id'];
      $hoten = $_POST['hoten'];
      $tuoi = $_POST['tuoi'];
      $status = Page::update($id,$hoten,$tuoi);
      $pages = Page::getData();
      $data = array('pages' => $pages);
      $this->render('home', $data);
    }
  }

  public function xoa() {
    if (isset($_POST['id'])) {
      $id = $_POST['id'];
      $status = Page::xoabang($id);
      echo json_encode($status);
      die();
    }
  }
  public function error()
  {
    $this->render('error');
  }
  public function getdatalist() {
    $list = Page::getData();
    echo json_encode($list);
    die();
  }
}
