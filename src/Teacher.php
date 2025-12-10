<?php
require_once "User.php";

class Teacher extends User {
    private $subject;

    public function __construct($name, $email, $subject) {
        parent::__construct($name, $email);
        $this->subject = $subject;
    }

    public function getRole(){
        return "Учитель";
    }
    public function getSubject() {
        return $this->subject;
    }
    public function setSubject($subject) {
        $this->subject = $subject;
    }
}