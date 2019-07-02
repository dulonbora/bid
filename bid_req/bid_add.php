<?php
include_once '../classes/Bid.php';;

$response = array();
$response["SUCCESS"] = 0;

$__bid = new Bid();

$_item_id = filter_input(INPUT_POST, "ITEM_ID");
$_bid = filter_input(INPUT_POST, "BID");
$_status = filter_input(INPUT_POST, "STATUS");
$_create_by = filter_input(INPUT_POST, "CREATE_BY");
$_create_on = filter_input(INPUT_POST, "CREATE_ON");


$__bid->setItem_id($_item_id);
$__bid->setBid($_bid);
$__bid->setStatus($_status);
$__bid->setCreate_by($_create_by);
$__bid->setCreate_on($_create_on);

if($__bid->Insert()==1){$response["SUCCESS"] = 1;
}

echo json_encode($response);
exit();