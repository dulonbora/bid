<?php

include '../classes/Users.php';

$response = array(); 
$response["SUCCESS"] = 0;

$__use = new Users();

$_id = filter_input(INPUT_POST , "ID");
$_name = filter_input(INPUT_POST , "NAME");
$_email = filter_input(INPUT_POST , "EMAIL");
$_phone = filter_input(INPUT_POST , "PHONE");
$_password = filter_input(INPUT_POST , "PASSWORD");
$_acess = filter_input(INPUT_POST , "ACESS");
$_verify_code = filter_input(INPUT_POST , "VERIFY_CODE");
$_create_on = time();
$_create_by = filter_input(INPUT_POST , "CREATE_BY");


$__use->setName($_name);
$__use->setEmail($_email);
$__use->setPhone($_phone);
$__use->setPassword($_password);
$__use->setAcess($_acess);
$__use->setVerify_code($_verify_code);
$__use->setCreate_on($_create_on);
$__use->setCreate_by($_create_by);

if($__use->Insert()==1){$response["SUCCESS"] = 1;}

echo json_encode($response);
exit();