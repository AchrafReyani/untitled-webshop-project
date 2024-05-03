<?php
class PageModel {
    public $page;
    protected $isPost = false;
    public $menu;
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
            $this->setPage(Util::getPostVar("page", "home"));
        } else {
            $this->setPage($this->getUrlVar("page", "home"));
        }
    }

    protected function setPage($newPage) {
        $this->page = $newpage;
    }

    protected function getUrlVar($key, $default = "") {
        //TODO
    }

    public function createMenu() {
        $this->menu['home'] = new MenuItem('home', 'Home');
        //todo
        if ($this->sessionManager->isUserLoggedIn()) {
            $this->menu['logout'] = new MenuItem('logout', 'Log out');
            $this->sessionManager->getLoggedInUser();
        }
    }


}
?>