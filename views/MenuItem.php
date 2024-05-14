<?php
class MenuItem {
    public $page;
    public $name;
    public function __construct($page, $name) {
        $this->page = $page;
        $this->name = $name;
    }
}