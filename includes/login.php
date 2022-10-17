<?php

	$info = (object)[];
	$data = false;

	$data['email'] = $DATA_OBJ->email;
	$email = $data['email'];

	if (empty($DATA_OBJ->email)) 
	{
		$Error .= "Porfavor entre com um email válido<br>";
	}

	if (empty($DATA_OBJ->password)) 
	{
		$Error .= "Porfavor entre com uma password válida<br>";
	}

	if ($Error == "") //se nao temos nenhum erro
	{
		$query = "select * from users where email = :email limit 1";
		$result = $DB->read($query,$data);

		if (is_array($result)) 
		{
			$result = $result[0];

			if ($result->password == $DATA_OBJ->password) 
			{
				$_SESSION['userid'] = $result->userid;
				$DB->read("UPDATE users set online='1' where email='$email'",[]);
				$info->message = "You're sucessfully logged in";
				$info->data_type = "info";
				echo json_encode($info);
			}
			//caso o contrario a pass esta errada
			else
			{
				$info->message = "Password Errada<br>";
				$info->data_type = "error";
				echo json_encode($info);
			}
		}
		else
		{
			$info->message = "Email Errado<br>";
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
