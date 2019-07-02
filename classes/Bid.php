<?php

require_once "../db/Kanexon.php";
require_once "../model/mdl_bid.php";

class Bid extends mdl_bid {

    private $conn = null;
    private $_table_name = "BID";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }

//put your code here
    public function Insert() {
        $query = "INSERT INTO BID(ITEM_ID , BID , STATUS , CREATE_BY , CREATE_ON) 
	VALUES ( ? , ? , ? , ? , ?) ";
        $success = 0;
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->item_id);
            $stmt->bindParam(2, $this->bid);
            $stmt->bindParam(3, $this->status);
            $stmt->bindParam(4, $this->create_by);
            $stmt->bindParam(5, $this->create_on);

            $stmt->execute();
            $success = 1;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $success;
    }

    /* ---------------------------------------------------------- */

    public function CheckAlreadyExit($itemId, $userId, $bid) {
        $ok = 0;
        $query = "SELECT ID FROM " . $this->_table_name . " WHERE ITEM_ID = ? AND USER_ID = ? AND BID = ? ";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $itemId);
            $stmt->bindParam(2, $userId);
            $stmt->bindParam(2, $bid);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $ok = 1;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

        return $ok;
    }

}
