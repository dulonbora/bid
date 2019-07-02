<?php

require_once "../db/Kanexon.php";
require_once "../model/mdl_item_details.php";

class Item_Details extends mdl_item_details {

    private $conn = null;
    private $_table_name = "ITEM_DETAILS";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

    //put your code here

    public function Insert() {
        $query = "INSERT INTO " . $this->_table_name . "(ITEM_ID , SL_NO , ATTR , ATTR_VALUE , IS_ACTIVE) 
	VALUES ( ? , ? , ? , ? , ?) ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->item_id);
            $stmt->bindParam(2, $this->sl_no);
            $stmt->bindParam(3, $this->attr);
            $stmt->bindParam(4, $this->attr_value);
            $stmt->bindParam(5, $this->is_active);

            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }

    /* ---------------------------------------------------------- */

    public function Update($id) {
        $query = "UPDATE " . $this->_table_name . " SET ITEM_ID = ?, SL_NO = ?, ATTR = ?, ATTR_VALUE = ?, IS_ACTIVE = ? WHERE ID = ? ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->item_id);
            $stmt->bindParam(2, $this->sl_no);
            $stmt->bindParam(3, $this->attr);
            $stmt->bindParam(4, $this->attr_value);
            $stmt->bindParam(5, $this->is_active);
            $stmt->bindParam(6, $this->$id);

            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }

    /* ---------------------------------------------------------- */
}
