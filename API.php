<?php

session_start();  //iniciar uma sessao

require_once('classes/autoload.php');

$DB = new Database();
$DATA_GET = file_get_contents("php://input");
$DATA_OBJ = json_decode($DATA_GET);   //convetendo os dados em objecto

$Error = "";

$info = (object)[];   //criar um objecto vazio

if (!isset($_SESSION['userid'])) //seo userid nao estiver logado ou se nao inciou a sessao
{
	if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type != "login" && $DATA_OBJ->data_type != "signup") 
	{
		$info->logged_in = false;
		echo json_encode($info);
		die;
	}
}

//escrever na base de dados
if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "signup") 
{	
	sleep(1);
	include("includes/signup.php");

}

else if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "login") 
{

	sleep(1);  //GIVE A DELAY TO PROCESS THIS PART
	//login
	include("includes/login.php");
}
else if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "user_info") 
{

	include("includes/user_info.php");
}

else if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "logout") 
{

	//login
	include("includes/logout.php");
}

else if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "save_profile") 
{

	//login
	include("includes/save_profile.php");
}

else if (isset($DATA_OBJ->data_type) && ($DATA_OBJ->data_type == "signup_pensioner") || isset($_GET['id_up'])) 
{

	//login
	include("includes/signup_pensioner.php");
}

else if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "signup_operator") 
{

	//login
	include("includes/signup_operator.php");
}






