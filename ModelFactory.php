<?php
class ModelFactory {
    public $pageModel;
    public $crudFactory;

    public function __construct(CrudFactory $crudFactory) {
        $this->crudFactory = $crudFactory;
        $this->pageModel = new PageModel(NULL);
    }

    public function createModel($name) {
        switch ($name) {
            case "User":
                $this->crudFactory->createCrud($name);
                return new UserModel($this->pageModel, $this->crudFactory->crud);
                break;
            case "Shop":
                $this->crudFactory->createCrud($name);
                return new ShopModel($this->pageModel, $this->crudFactory->crud);
                break;
            case "Page":
                return $this->pageModel;
                break;
            default:
                echo "wrong model name";
                break;
        }
    }
}
?>