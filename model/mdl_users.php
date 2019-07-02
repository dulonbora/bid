<?php

class mdl_users {

    public function __construct() {}

    private $id                 = 0;
    private $name               = "";
    private $email              = "";
    private $phone              = 0;
    private $password           = "";
    private $acess              = "";
    private $verify_code        = 0;
    private $create_on          = 0;
    private $create_by          = 0;

    function setId($id) {
        $this->id = $id;
    }

    function getId() {
        return $this->id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function getName() {
        return $this->name;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function getEmail() {
        return $this->email;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function getPhone() {
        return $this->phone;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function getPassword() {
        return $this->password;
    }

    function setAcess($acess) {
        $this->acess = $acess;
    }

    function getAcess() {
        return $this->acess;
    }

    function setVerify_code($verify_code) {
        $this->verify_code = $verify_code;
    }

    function getVerify_code() {
        return $this->verify_code;
    }

    function setCreate_on($create_on) {
        $this->create_on = $create_on;
    }

    function getCreate_on() {
        return $this->create_on;
    }

    function setCreate_by($create_by) {
        $this->create_by = $create_by;
    }

    function getCreate_by() {
        return $this->create_by;
    }

}
