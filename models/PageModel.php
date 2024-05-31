<?php
include "./sessionManager.php";
include "./views/MenuItem.php";
class PageModel {
    public $page;
    protected $isPost = false;
    public $menu;//holds menuitem objects
    public $errors = array();
    public $generalError = "";
    public $sessionManager;
    public $action;

    public function __construct($copy) {
        if(empty($copy)) {
            // ==> first instance of pagemodel
            $this->sessionManager = new SessionManager();
        } else {
            // ==> called from the constructor of an extended class
            $this->page = $copy->page;
            $this->isPost = $copy->isPost;
            $this->menu = $copy->menu;
            $this->generalError = $copy->generalError;
            $this->sessionManager = $copy->sessionManager;
        }
    }

    protected function getRequestVar($key, $default = "") {
        if ($this->isPost) {
          $value = isset($_POST[$key]) ? trim($_POST[$key]) : $default;
        } else {
          $value = isset($_GET[$key]) ? trim($_GET[$key]) : $default;
        }
        return $value;
      }
      
    public function getRequestedPage() {
        $this->isPost = ($_SERVER["REQUEST_METHOD"] == "POST");
        $this->page = $this->getRequestVar("page");
        if (!$this->isPost) {
            $this->action = $this->getRequestVar("action");
        }
    }

    public function createMenu() {
        $this->menu['Home'] = new MenuItem('Home', 'Home');
        $this->menu['About'] = new MenuItem('About', 'About');
        $this->menu['Contact'] = new MenuItem('Contact', 'Contact');
        $this->menu['Webshop'] = new MenuItem('Webshop', 'Webshop');
        if ($this->sessionManager->isUserLoggedIn()) {
            $this->menu['Logout'] = new MenuItem('Logout '. $this->sessionManager->getUsername(), 'Logout');
            $this->menu['Cart'] = new MenuItem('Cart', 'Cart');
            $this->menu['ChangePassword'] = new MenuItem('Change Password', "ChangePassword");
        } else {
            $this->menu['Register'] = new MenuItem('Register', 'Register');
            $this->menu['Login'] = new MenuItem('Login', 'Login');
        }
    }
}
?>