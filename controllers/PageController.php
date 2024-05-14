<?php
include "./models/PageModel.php";
class PageController {
    private $model;

    public function __construct() {
        $this->model = new PageModel(NULL);
    }

    public function handleRequest() {
        $this->getRequest();
        $this->processRequest();
        $this->showResponse();
    }

    //from client
    private function getRequest() {
        $this->model->getRequestedPage();
    }//calls function from the model object

    //business flow code TODO
    //login, register, change password, contact form, shopping cart, webshop and detail page?
    private function processRequest() {
        switch($this->model->page) {
            case "Login":
                include_once "./models/UserModel.php";
                $this->model = new UserModel($this->model);
                $this->model->validateLogin();
                if ($this->model->valid) {
                    $this->model->doLoginUser();
                    $this->model->page = "Home";
                }
                break;
            case "Register":
                include_once "./models/UserModel.php";
                $this->model = new UserModel($this->model);
                $this->model->validateRegistration();
                if ($this->model->valid) {
                    $this->model->registerNewUser();
                    $this->model->page = "Login";
                }
                break;
            case "Contact":
                include_once "./models/UserModel.php";
                $this->model = new UserModel($this->model);
                $this->model->validateForm();
                if ($this->model->valid) {
                    //todo send email to myself?
                    $this->model->page = "ThankYou";
                }
                break;
            case "ChangePassword":
                include_once "./models/UserModel.php";
                $this->model = new UserModel($this->model);
                $this->model->validateChangePassword();
                if ($this->model->valid) {
                    $this->model->updatePassword();
                    $this->model->page = "Home";
                }
                break;  
        }
    }

    private function showResponse() {
        $this->model->createMenu();
        $view = NULL;
        switch($this->model->page) {
            case "Home":
                require_once("./views/HomeDoc.php");
                $view = new HomeDoc($this->model);
                break;
            case "About":
                require_once("./views/AboutDoc.php");
                $view = new AboutDoc($this->model);
                break;
            case "Contact":
                require_once("./views/ContactDoc.php");
                $view = new ContactDoc($this->model);
                break;
            case "ThankYou":
                require_once("./views/ThankYouDoc.php");
                $view = new ThankYouDoc($this->model);
                break;
            case "Webshop":
                require_once("./views/WebshopDoc.php");
                $view = new WebshopDoc($this->model);
                break;
            case "Detail":
                require_once("./views/DetailDoc.php");
                $view = new DetailDoc($this->model);
                break;
            case "Login":
                require_once("./views/LoginDoc.php");
                $view = new LoginDoc($this->model);
                break;
            case "Register":
                require_once("./views/RegisterDoc.php");
                $view = new RegisterDoc($this->model);
                break;
            case "ChangePassword":
                require_once("./views/ChangePasswordDoc.php");
                $view = new ChangePasswordDoc($this->model);
                break;
            default:
                echo "default case";
                require_once("./views/HomeDoc.php");
                $view = new HomeDoc($this->model);
                break;
        }
        $view->show();
    }
}
?>