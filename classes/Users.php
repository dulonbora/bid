<?php
require_once "../db/Kanexon.php";
require_once "../model/mdl_users.php";
class Users extends mdl_users{
    
    private $conn = null;
    private $_table_name = "USERS";

    public function __construct() {
        parent::__construct();
        $Data = new Kanexon();
        $this->conn = $Data->getDb();
    }
    
    
 /*----------------------------------------------------------*/
    
    /**
     * Function Insert()
     * Call This Function To SignUp Users
     */
    
public function Insert(){
$query = "INSERT INTO ".$this->_table_name."(NAME , EMAIL , PHONE , PASSWORD , ACESS , VERIFY_CODE , CREATE_ON , CREATE_BY) 
	VALUES ( ? , ? , ? , ? , ? , ? , ? , ?) " ; 
$success = 0;
try{
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam (1 , $this->name); 
	$stmt->bindParam (2 , $this->email); 
	$stmt->bindParam (3 , $this->phone); 
	$stmt->bindParam (4 , $this->password); 
	$stmt->bindParam (5 , $this->acess); 
	$stmt->bindParam (6 , $this->verify_code); 
	$stmt->bindParam (7 , $this->create_on); 
	$stmt->bindParam (8 , $this->create_by); 

	$stmt->execute(); 
	$success = 1;}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}

 /*----------------------------------------------------------*/

    /**
     * Function UpdateSingle()
     * Call This Function For Single Column Update
     * Peram $col is column Name 
     * Peram $val is value from form or hidden value 
     * Peram $id is row unique id 
     */
    
public function UpdateSingle($col, $val, $id){
$query = "UPDATE USERS SET '$col' = ? WHERE ID = ? ";
$success = 0;
try{
	$stmt = $this->conn->prepare($query);
	$stmt->bindParam (1 , $val); 
	$stmt->bindParam (2 , $id); 

	$stmt->execute(); 
	$success = 1;}
catch(PDOException $ex){ echo  $ex->getMessage(); } 
return $success;}

 /*----------------------------------------------------------*/
    /**
     * Function emailIsUniq()
     * Check Email ID is already Exits
     * Peram $Email is user email  
     */
    
public function emailIsUniq($Email){
    $ok = 0;
    $query = "SELECT ID FROM USERS WHERE EMAIL = ? ";
    try{
    $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $Email);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $ok = 1;
        }
     } catch(PDOException $ex){echo $ex->getMessage();}
    
return $ok;
}

 /*----------------------------------------------------------*/
    /**
     * Function phoneIsUniq()
     * Check Phone Number is already Exits
     * Peram $phone is user phone  
     */
public function phoneIsUniq($phone){
    $ok = 0;
    $query = "SELECT ID FROM USERS WHERE PHONE = ? ";
    try{
    $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $phone);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $ok = 1;
        }
     } catch(PDOException $ex){echo $ex->getMessage();}
    
return $ok;
}
 /*----------------------------------------------------------*/
    /**
     * Function forgetPassword()
     * Check To retrive date against this Email 
     */
public function forgetPassword($email){
    $ok = "";
    $query = "SELECT PASSWORD FROM USERS WHERE EMAIL = ? ";
    try{
    $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $email);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row > 0){$ok = $row['PASSWORD'];}
     } catch(PDOException $ex){echo $ex->getMessage();}
    
return $ok;
}

 /*----------------------------------------------------------*/

public function changeAccess($Access, $id){
    $Q = "UPDATE USERS SET ACCESS = ? WHERE ID = ? ";
    try{
        $stmt = $this->conn->prepare($Q);
        $stmt->bindParam(1, $Access);
        $stmt->bindParam(2, $id);
        $stmt->execute();   
    }
    catch(PDOException $ex){$ex->getMessage();}
}

 /*----------------------------------------------------------*/
    /**
     * Function login()
     * This Function For User Login
     * Peram $email is user Email  
     * Peram $passWord is user password  
     */

public function login($email, $passWord){
if (!isset($_SESSION)) {session_start();}
$query = "SELECT * FROM USERS WHERE EMAIL = ? AND PASSWORD  = ? ";
$ok = 0;
        try{
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $passWord);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($row > 0){
        $_SESSION['USER_ID'] = $row['ID'];
	$_SESSION['EMAIL'] = $row['EMAIL'];
	$_SESSION['FIRST_NAME'] = $row['FIRST_NAME'];
	$_SESSION['LAST_NAME'] = $row['LAST_NAME'];
	$_SESSION['ACCESS'] = $row['ACCESS'];
        $ok = 1;
        }
        
        } catch(PDOException $ex){echo $ex->getMessage();}
return $ok;
}

 /*----------------------------------------------------------*/

/**
     * Function logOut()
     * This Function Will Destroy The All Session
     */
public function logOut(){
if (!isset($_SESSION)) {session_start();}
$_SESSION['USER_ID'] = NULL;
$_SESSION['EMAIL'] = NULL;
$_SESSION['FIRST_NAME'] = NULL;
$_SESSION['LAST_NAME'] = NULL;
$_SESSION['CREATE'] = NULL;
$_SESSION['UPDATE'] = NULL;
$_SESSION['DELETE'] = NULL;


unset($_SESSION['USER_ID']);
unset($_SESSION['EMAIL']);
unset($_SESSION['FIRST_NAME']);
unset($_SESSION['LAST_NAME']);
unset($_SESSION['CREATE']);	
unset($_SESSION['UPDATE']);	
unset($_SESSION['DELETE']);	

}

 /*----------------------------------------------------------*/

/**
     * Function RestrictUserIfNotLogin()
     * This Function Check User Is Logged Or not , if he is not logged then redrict to login page
     */
public function RestrictUserIfNotLogin(){
ob_start();	
if(!isset($_SESSION)){session_start();}

if(isset($_SESSION['EMAIL'])){
if($_SESSION['EMAIL'] != NULL){}
else{$this->pageRedirect("../site/login.php");}
}
else{$this->pageRedirect("../site/login.php");}

}

 /*----------------------------------------------------------*/

    /**
     * Function logOut()
     * This Function will Set All Value Of User In This class you can call any value by get();
     */



    public function loadValue($id) {
        $Q = "SELECT * FROM USERS WHERE ID = ?";
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->ID = $row['ID'];
            $this->EMAIL = $row['EMAIL'];
            $this->PASSWORD = $row['PASSWORD'];
            $this->FIRST_NAME = $row['FIRST_NAME'];
            $this->LAST_NAME = $row['LAST_NAME'];
            $this->PHONE = $row['PHONE'];
            $this->ACCESS = $row['ACCESS'];
            $this->ACT = $row['ACT'];
            $this->IP = $row['IP'];
            $this->CREATE_ON = $row['CREATE_ON'];
            $this->LAST_LOGIN = $row['LAST_LOGIN'];
            $this->UPDATE_ON = $row['UPDATE_ON'];
            $this->ACTIVE = $row['ACTIVE'];
            
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
/*--------------------------------------------------------------- */
/*
If the logged user is not admin, 
He will be not able to edit any page content.
This function will prompt the user to relogin as admin.
*/
public function RestrictUser(){
ob_start();	
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['ACCESS']))
{
if(strcmp($_SESSION['ACCESS'], "ADMIN") == 0){}
else if(strcmp($_SESSION['ACCESS'], "ADVERTISER") == 0){}
else if(strcmp($_SESSION['ACCESS'], "USER") == 0){}
else if(strcmp($_SESSION['ACCESS'], "MEMBER") == 0){}
else{$this->pageRedirect("../site/login.php");}
}
else{
    $this->pageRedirect("../site/login.php");
}
}

public function axcessOnlyForAdmin(){
ob_start();	
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['ACCESS']))
{
if(strcmp($_SESSION['ACCESS'], "ADMIN") == 0){}
else if(strcmp($_SESSION['ACCESS'], "ADVERTISER") == 0){
    $this->pageRedirect("../site/Advertisers.php");

}
else{$this->pageRedirect("../site/login.php");}
}
else{
    $this->pageRedirect("../site/login.php");
}
}

public function accessForAdminOtherStaff(){
ob_start();	
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['ACCESS']))
{
if(strcmp($_SESSION['ACCESS'], "ADMIN") == 0){}
else if(strcmp($_SESSION['ACCESS'], "ADVERTISER") == 0){}
else{$this->pageRedirect("../site/login.php");}
}
else{
    $this->pageRedirect("../site/login.php");
}
}
/*--------------------------------------------------------------- */
/*
If the logged user is not Member, 
He will be not able to edit any page content.
This function will prompt the user to relogin as member.
*/
public function RestrictNonMember(){
ob_start();	
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['ACCESS']))
{
if(strcmp($_SESSION['ACCESS'], "MEM") == 0){}
else{$this->pageRedirect("../site/login.php");}
}
else{
    $this->pageRedirect("../site/login.php");
}
}

/*--------------------------------------------------------------- */
/*
If the logged user is not Member, 
He will be not able to edit any page content.
This function will prompt the user to relogin as member.
*/

public function showLogin(){
ob_start();
if(!isset($_SESSION)){session_start();}

if(isset($_SESSION['USER_ID']))
{
    echo "<li class='mdl-menu__item'>".$_SESSION['FIRST_NAME']." ".$_SESSION['LAST_NAME']."</li>";
    echo "<li class='mdl-menu__item'><a href='profile.php'>My Profile</a></li>";
    echo "<li class='mdl-menu__item'><a href='settings.php'>Settings</a></li>";
    echo "<li class='mdl-menu__item'><a href='logout.php'>Logout</a></li>";
}

else{
    echo "<li class='mdl-menu__item'><a href='login.php'>Log in</a></li>";
    echo "<li class='mdl-menu__item'><a href='signup.php'>Register</a></li>";
}
}


/*--------------------------------------------------------------- */
//This javascript function will redirect a another page
//after the execution of a function.
public function pageRedirect($page){
echo "<script type=\"text/javascript\">	";
echo "document.location = '".$page."' ";
echo "</script>";
}




//------------------------------------------------------------------*/
    public function getTotal() {
        $Q = "SELECT COUNT(*) AS TOTAL FROM USERS";
        $total = 0;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->execute();
            $total = $stmt->fetchColumn();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $total;
    }

//------------------------------------------------------------------*/

    public function allFecth($start, $limit) {
        $Q = "SELECT * FROM USERS ORDER BY ID DESC LIMIT " . $start . " ," . $limit . "";
        $result = null;
        try {
            $stmt = $this->conn->prepare($Q);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }

}
