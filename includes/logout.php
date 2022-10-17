<?php

$userid = $_SESSION['userid'];

if (isset($_SESSION['userid'])) 
{
	unset($_SESSION['userid']);
	$DB->read("UPDATE users set online='0' where userid='$userid'",[]);
}

$info->logged_in = false;
echo json_encode($info);