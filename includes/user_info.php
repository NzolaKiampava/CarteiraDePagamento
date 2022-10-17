<?php


$info = (object)[];
$data = false;


//validar info

$data['userid'] = $_SESSION['userid'];

if ($Error == "") 
{
	$query = "select * from users where userid = :userid limit 1";
	$result = $DB->read($query,$data);

	if (is_array($result)) 
	{	

		$result = $result[0];
		$result->data_type = "user_info";

		//check if exist image
		$image = ($result->gender == "Male") ? 'assets/images/user_male.png' : 'assets/images/user_female.png';

		if (file_exists($result->image)) //looking for if exist some file int the collumn image
		{
		   	$image = $result->image;
		}

		$result->image = $image;
		echo json_encode($result);
	}
	else
	{
		$info->message = "Wrong email<br>";
		$info->data_type = "error";
		echo json_encode($info);
	}
}
else
{

	$info->message = $Error;
	$info->data_type = "error";
	echo json_encode($info);

}