<?php

session_start();  //iniciar uma sessao

require_once('classes/autoload.php');
$DB = new Database();

$info = (object)[];  //empty object

//logout
if (!isset($_SESSION['userid'])) 
{
	if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type != "login" && $DATA_OBJ->data_type != "signup") 
	{
		$info->logged_in = false;
		echo json_encode($info);
		die;
	}
}


$data_type = "";
if (isset($_POST['data_type'])) 
{
	$data_type = $_POST['data_type'];
}


$destination = "";
if(isset($_FILES['files']) && $_FILES['files']['name'])
{

	if ($_FILES['files']['error'] == 0) 
	{
		//good to go
		$folder = "uploads/";

		if (!file_exists($folder)) //if file $folder not exist
		{
			mkdir($folder, 0777, true);  //crete a directory to this $folder
		}


		$destination = $folder . "SF-".rand(1,999)." - ".$_FILES['files']['name'];
		move_uploaded_file($_FILES['files']['tmp_name'], $destination);

		$info->message = "Your profile image was uploaded!<br>";
		$info->data_type = $data_type;
		echo json_encode($info);
	}
}


if ($data_type == "change_profile_image") 
{

	if ($destination != "") 
	{	
		$id = $_SESSION['userid'];
		$query = "UPDATE users set image = '$destination' where userid = '$id' limit 1";
		$DB->write($query, []);

	}

}





/*---------------------------------------------------------------------------*/

//EXAMPLYFITE

/*print_r($_FILES);

Array
(
    [file] => Array
        (
            [name] => 1-linguagens-de-programacao-2019.jpg
            [type] => image/jpeg
            [tmp_name] => C:\xampp\tmp\php88D7.tmp
            [error] => 0
            [size] => 74555
        )

)

----------------------------

print_r($_POST);

Array
(
    [data_type] => change_profile_image
)
*/



