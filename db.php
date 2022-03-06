<?php
/******************************************** 
* Global database connections for all pages
********************************************/

// AWS connection
$db = new PDO('mysql:host=172.31.22.43;dbname=Alexander1171947', 'Alexander1171947', 'zjfqTKH_T_');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Localhost connection
// $db = new PDO('mysql:host=localhost;dbname=Alexander1171947', 'Alexander1171947', 'SomePassword1!');
// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// NOTE: for some reason, because this page in ONLY php, a closing php tag is not required