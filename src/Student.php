<?php
require_once "User.php";

class Student extends User {
    private $group;

    public function __construct($name, $email, $group) {
        parent::__construct($name, $email);
        $this->group = $group;
    }

    public function getRole(){
        return "Студет";
    }
    public function getGroup() {
        return $this->group;
    }
    public function setGroup($group) {
        $this->group = $group;
    }
}