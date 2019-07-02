<?php

include_once '../classes/Item_Details.php';
$response = array(); 
$response["SUCCESS"] = 0;

$__ite = new Item_Details();

$_id = filter_input(INPUT_POST , "ID");
$_item_id = filter_input(INPUT_POST , "ITEM_ID");
$_sl_no = filter_input(INPUT_POST , "SL_NO");
$_attr = filter_input(INPUT_POST , "ATTR");
$_attr_value = filter_input(INPUT_POST , "ATTR_VALUE");
$_is_active = "YES";


$__ite->setItem_id($_item_id);
$__ite->setSl_no($_sl_no);
$__ite->setAttr($_attr);
$__ite->setAttr_value($_attr_value);
$__ite->setIs_active($_is_active);


if($_id > 0){if($__ite->Update($_id)==1){$response["SUCCESS"] = 2;}}
else {if($__ite->Insert()==1){$response["SUCCESS"] = 1;}}

echo json_encode($response);
exit();