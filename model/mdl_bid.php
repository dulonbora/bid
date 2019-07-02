<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mdl_bid
 *
 * @author Dulon
 */
class mdl_bid {

    public function __construct() {}

    private $id = 0;
    private $item_id = 0;
    private $bid = 0;
    private $status = "";
    private $create_by = 0;
    private $create_on = 0;

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

    function setBid($bid) {
        $this->bid = $bid;
    }

    function getBid() {
        return $this->bid;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function getStatus() {
        return $this->status;
    }

    function setCreate_by($create_by) {
        $this->create_by = $create_by;
    }

    function getCreate_by() {
        return $this->create_by;
    }

    function setCreate_on($create_on) {
        $this->create_on = $create_on;
    }

    function getCreate_on() {
        return $this->create_on;
    }

}
