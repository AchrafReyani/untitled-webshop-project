<?php
class UserModel extends PageModel {

    public $email = ""; //or $meta = array();
    public $name = ""; //or $values = array();
    //todo

    public function __construct($pageModel) {
        PARENT::__construct($pageModel);
    }

    public function validateLogin() {
        if($this->isPost) {
            $this->email= $this->getPostVar("email");
            //todo
            $this->valid = true;
        }
    }

    private function authenticateUser() {
        require_once "db.php";
        $user = findUserByEmail($this->email);

        //password validation

        $this->name = $user['name'];
        // $this->values['name'] = $user['name']
        $this->userId = $user['id'];

    }
}
?>