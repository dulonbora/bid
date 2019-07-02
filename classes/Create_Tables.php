<?php

require_once '../include/db.php';

class Create_Table {
    private $conn = null;
    public function __construct() {
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }
    
    public function User(){
    $Q = "CREATE TABLE IF NOT EXISTS USERS(
        ID BIGINT PRIMARY KEY AUTO_INCREMENT ,           
	EMAIL TEXT,
        PASSWORD TEXT, 
        FIRST_NAME VARCHAR(120)	, 
        LAST_NAME VARCHAR(120)	, 
        PHONE TEXT, 
        ACCESS TEXT, 
        ACCESS_CODE VARCHAR(20), 
        ACT VARCHAR(20), 
        IP VARCHAR(20), 
        CREATE_ON BIGINT, 
        LAST_LOGIN BIGINT, 
        UPDATE_ON BIGINT, 
        ACTIVE INTEGER DEFAULT 0,
        DIST_CODE INTEGER
        )";
    try {
        $this->conn->exec($Q);
        echo "User Table Created....<br/>";
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
    }
    
    /*
    public function UserInsertAdmin(){
    $Q = ""; // This Query For Admin Create
    try {
        $this->conn->exec($Q);
        echo "Admin Details....Insetred<br/>";
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
    }
    */
    
    public function Pages() {
        $enq = "CREATE TABLE IF NOT EXISTS PAGES (
        ID BIGINT PRIMARY KEY AUTO_INCREMENT , 
        HEADLINE TEXT,
        CONTENT LONGTEXT, 
        IMAGE_ID TEXT, 
        TOTAL_VISIT INTEGER, 
        CATEGORY VARCHAR(50), 
        POST_ON BIGINT, 
        POST_BY INTEGER, 
        COMMENT INTEGER,
        STATUS INTEGER,
        TYPE INTEGER)";
        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            echo "\nPage Table Created....";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
    
    public function Category() {
        $enq = "CREATE TABLE IF NOT EXISTS LICENSE_CATEGORY (
        ID BIGINT PRIMARY KEY AUTO_INCREMENT ,
        CATEGORY_NAME TEXT,
        PARENT_ID INTEGER,
        DESCRIPTION TEXT, 
        STATUS TEXT,  
        POST_ON BIGINT,
        POST_BY BIGINT,
        UPDATE_ON BIGINT,
        UPDATE_BY BIGINT)";
        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            echo "\nCATEGORY Table Created....";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
    public function PermitCategory() {
        $enq = "CREATE TABLE IF NOT EXISTS PERMIT_CATEGORY (
        ID BIGINT PRIMARY KEY AUTO_INCREMENT ,
        CATEGORY_NAME TEXT,
        PARENT_ID INTEGER,
        DESCRIPTION TEXT, 
        STATUS TEXT,  
        POST_ON BIGINT,
        POST_BY BIGINT,
        UPDATE_ON BIGINT,
        UPDATE_BY BIGINT)";
        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            echo "\nPermitCATEGORY Table Created....";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
    public function Location() {
        $enq = "CREATE TABLE IF NOT EXISTS LOCATION (
        ID BIGINT PRIMARY KEY AUTO_INCREMENT ,
        LOCATION_NAME TEXT,
        PARENT_ID INTEGER,
        DESCRIPTION TEXT, 
        STATUS TEXT,  
        TYPE INTEGER,  
        POST_ON BIGINT,
        POST_BY BIGINT,
        UPDATE_ON BIGINT,
        UPDATE_BY BIGINT)";
        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            echo "\nLOCATION Table Created....";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function ApplicantInfo() {
        $enq = "CREATE TABLE IF NOT EXISTS APPLICANTINFO (
        ID BIGINT PRIMARY KEY AUTO_INCREMENT ,
        LICENSE_NO TEXT, 
        LICENSE_NO_OLD TEXT, 
        LICENSE_TYPE VARCHAR(50), 
        NOW_HERE INTEGER, 
        STATUS INTEGER, 
        DATE BIGINT, 
        LICENSE_FOR TEXT,
        FIRST_NAME VARCHAR(50), 
        MIDDLE_NAME VARCHAR(50), 
        LAST_NAME VARCHAR(50), 
        PARENTS_NAME VARCHAR(100), 
        AGE VARCHAR(10), 
        NATIONALITY VARCHAR(20), 
        RESIDENTIAL VARCHAR(20), 
        EMAIL TEXT, 
        PHONE VARCHAR(15), 
        ADDRESS_P TEXT, 
        ADDRESS_C TEXT, 
        QULIFICATION TEXT, 
        ANNUAL_INCOME VARCHAR(200), 
        PAN_NO VARCHAR(20), 
        OTHER_LICENSE_NO TEXT, 
        OTHER_LICENSE_DEC TEXT, 
        IS_RELLATIV_LICENSE INTEGER, 
        INVLOPMENT_IN_CRIMINALISIM TEXT, 
        SPECIAL_CLAIM TEXT,         
        POST_ON BIGINT, 
        POST_BY BIGINT, 
        UPDATE_ON BIGINT, 
        UPDATE_BY BIGINT)";
        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            
            echo "\nAPPLICANTINFO Table Created....";
        } catch (PDOException $ex) {echo $ex->getMessage();}
    }
    
    
    public function BasicInfo() {
        $enq = "CREATE TABLE IF NOT EXISTS BASICINFOSITE (
        ID BIGINT PRIMARY KEY AUTO_INCREMENT ,
        APPLICANT_ID INTEGER, 
        DISTANC_FROM_EDUCATION TEXT, 
        DISTANC_FROM_HIGHWAY TEXT, 
        PURPOSE_TO_OPEN TEXT, 
        
        BUILDING_NAME VARCHAR(100), 
        DISTRIC_ID INTEGER,
        MUNICIPALITY_NAME VARCHAR(255),
        STREET VARCHAR(100), 
        PLOTE_NO VARCHAR(20),  
        PIN VARCHAR(20), 
        
        ADDITIONAL_DETAILS TEXT,  
        SITE_TYPE VARCHAR(10), 
        POST_ON BIGINT, 
        POST_BY BIGINT, 
        UPDATE_ON BIGINT, 
        UPDATE_BY BIGINT)";
        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            echo "\nPage Table Created....";
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
    
    public function DocumentDetails() {
        $enq = "CREATE TABLE IF NOT EXISTS DOCUMENTS (
        ID BIGINT PRIMARY KEY AUTO_INCREMENT ,
        LICENSE_NO VARCHAR(200), 
        FILE_NO INTEGER, 
        FORMAT_TYPE VARCHAR(255), 
        FILE BLOB NOT NULL, 
        TYPE INTEGER, 
        CREATE_BY BIGINT, 
        CREATE_ON BIGINT)";
        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            
            echo "\nSITEDETAILS Table Created....";
        } catch (PDOException $ex) {echo $ex->getMessage();}
    }
    
    
    public function PARTNERSHIP() {
        $enq = "CREATE TABLE IF NOT EXISTS PARTNERSHIP (
        ID BIGINT PRIMARY KEY AUTO_INCREMENT ,
        APPLICANT_ID INTEGER , 
        TYPE INTEGER , 
        FIRST_NAME VARCHAR(50), 
        MIDDLE_NAME VARCHAR(50), 
        LAST_NAME VARCHAR(50), 
        AGE VARCHAR(10), 
        NATIONALITY VARCHAR(20), 
        EMAIL TEXT, 
        PHONE VARCHAR(15), 
        ADDRESS_P TEXT, 
        ADDRESS_C TEXT, 
        QULIFICATION TEXT, 
        POST_ON BIGINT, 
        POST_BY BIGINT, 
        UPDATE_ON BIGINT, 
        UPDATE_BY BIGINT)";
        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            
            echo "\nAPPLICANTINFO Table Created....";
        } catch (PDOException $ex) {echo $ex->getMessage();}
    }
    
    
    public function COMPANY() {
        $enq = "CREATE TABLE IF NOT EXISTS COMPANY (
        ID BIGINT PRIMARY KEY AUTO_INCREMENT ,
        APPLICANT_ID INTEGER , 
        COMPANY_NAME VARCHAR(50), 
        ADDRESS TEXT,
        POD TEXT,
        PARTICULARS_OF_BANK TEXT, 
        POST_ON BIGINT, 
        POST_BY BIGINT, 
        UPDATE_ON BIGINT, 
        UPDATE_BY BIGINT)";
        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            
            echo "\nAPPLICANTINFO Table Created....";
        } catch (PDOException $ex) {echo $ex->getMessage();}
    }
    
    
    public function LCHALLAN() {
        $enq = "CREATE TABLE IF NOT EXISTS LICENSE_CHALLAN (
        ID BIGINT PRIMARY KEY AUTO_INCREMENT ,
        APPLICANT_ID INTEGER , 
        CHALLAN_NO VARCHAR(50), 
        CREATE_ON BIGINT, 
        CREATE_BY BIGINT, 
        UPDATE_ON BIGINT, 
        UPDATE_BY BIGINT)";
        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            
            echo "\nAPPLICANTINFO Table Created....";
        } catch (PDOException $ex) {echo $ex->getMessage();}
    }



public function payment() {
        $enq = "CREATE TABLE IF NOT EXISTS PAYMENT (
        ID BIGINT PRIMARY KEY AUTO_INCREMENT ,
        USER_ID BIGINT,
        PERMIT_ID BIGINT ,
        LIC_ID VARCHAR(50),
        DEPT_CODE VARCHAR(50), 
        ECHALLAN_NO VARCHAR(50), 
        LIC_NO VARCHAR(50), 
        PERMIT_NO VARCHAR(50), 
        AMT INTEGER, 
        TREASURY_CODE VARCHAR(50), 
        TREASURY_H_AC INTEGER, 
        TREASURY_SH_AC INTEGER, 
        IFSC_CODE VARCHAR(50),  
        BANK_NAME VARCHAR(50),  
        BANK_CODE VARCHAR(50),  
        TRANS_ID VARCHAR(50),  
        DATE_TIME_TRANS BIGINT,  
        WALLET_ID BIGINT,  
        MOBILE_NO INTEGER,  
        POST_ON BIGINT, 
        POST_BY BIGINT 
        )";
        try {
            $stmt = $this->conn->prepare($enq);
            $stmt->execute();
            
            echo "\nPAYMENT Table Created....";
        } catch (PDOException $ex) {echo $ex->getMessage();}
    }
}

?>