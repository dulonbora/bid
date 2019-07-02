<?php

include '../classes/Create_Tables.php';
$tables = new Create_Table();
$tables->Company();
$tables->Soft_Users();
$tables->Soft_Update();
$tables->User();


?>