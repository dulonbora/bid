<?php

class mdl_item_details {

    public function __construct() {}

    private $id                 = 0;
    private $item_id            = 0;
    private $sl_no              = 0;
    private $attr               = "";
    private $attr_value         = "";
    private $is_active          = "YES";

    function setId($id) {
        $this->id = $id;
    }

    function getId() {
        return $this->id;
    }

    function setItem_id($item_id) {
        $this->item_id = $item_id;
    }

    function getItem_id() {
        return $this->item_id;
    }

    function setSl_no($sl_no) {
        $this->sl_no = $sl_no;
    }

    function getSl_no() {
        return $this->sl_no;
    }

    function setAttr($attr) {
        $this->attr = $attr;
    }

    function getAttr() {
        return $this->attr;
    }

    function setAttr_value($attr_value) {
        $this->attr_value = $attr_value;
    }

    function getAttr_value() {
        return $this->attr_value;
    }

    function setIs_active($is_active) {
        $this->is_active = $is_active;
    }

    function getIs_active() {
        return $this->is_active;
    }

}
