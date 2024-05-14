<?php
include "./sessionManager.php";
include "./views/MenuItem.php";
class PageModel {
    public $page;
    protected $isPost = false;
    public $menu;//holds menuitem objects
    public $errors = array();
    public $genericErr = "";
    protected $sessionManager;

    public function __construct($copy) {
        if(empty($copy)) {
            // ==> first instance of pagemodel
            $this->sessionManager = new SessionManager();
        } else {
            // ==> called from the constructor of an extended class
            $this->page = $copy->page;
            $this->isPost = $copy->isPost;
            $this->menu = $copy->menu;
            $this->genericErr = $copy->genericErr;
            $this->sessionManager = $copy->sessionManager;
        }
    }
    
    public function getRequestedPage() {
        $this->isPost = ($_SERVER['REQUEST_METHOD'] == 'POST');

        if ($this->isPost) {
            $this->setPage(Util::getPostVar("page", "Home"));
        } else {
            $this->setPage($this->getUrlVar("page", "Home"));
        }
    }

    protected function setPage($newPage) {
        $this->page = $newPage;
    }

    protected function getUrlVar($key, $default = "") {
        return $default;
    }

    public function createMenu() {
        $this->menu['Home'] = new MenuItem('Home', 'Home');
        $this->menu['About'] = new MenuItem('About', 'About');
        $this->menu['Contact'] = new MenuItem('Contact', 'Contact');
        $this->menu['Webshop'] = new MenuItem('Webshop', 'Webshop');
        if ($this->sessionManager->isUserLoggedIn()) {
            $this->menu['Logout'] = new MenuItem('Logout', 'Logout');
            $this->menu['Cart'] = new MenuItem('Cart', 'Cart');
            $this->sessionManager->getLoggedInUser();
        } else {
            $this->menu['Register'] = new MenuItem('Register', 'Register');
            $this->menu['Login'] = new MenuItem('Login', 'Login');
        }
    }
}
?>