<?php
	//Incluir a conexão com banco de dados
	require_once('conexao.php');
	//include_once('classes/database.php');

	//Recuperar o valor da palavra
	
	session_start();
	$id_operador = $_SESSION['userid'];
	$pensionista = htmlentities("%".trim($_POST['palavra'])."%");


	//Pesquisar no banco de dados nome do curso referente a palavra digitada pelo usuário
	$pensionista = "SELECT * FROM pensioner where id_operador = '$id_operador' and  (username like '%$pensionista%' or email like '%$pensionista%')";


	$resultado_cursos = mysqli_query($conn, $pensionista);

	if(mysqli_num_rows($resultado_cursos) <= 0)
	{
		echo "Nenhum pensionista encontrado...";
	}else
	{
		while($rows = mysqli_fetch_assoc($resultado_cursos))
		{
			//echo "<li>".$rows['nome']."</li>";

			//$mydata = "";
			$username = $rows['username'];
			$email = $rows['email'];
			//$image = $rows['image'];
			$gender = $rows['gender'];

			$image = ($gender == "Male") ? 'assets/images/user_gender_male.jpg' : 'assets/images/user_gender_female.jpg';

			/*if (file_exists($rows['image'])) 
			{
				$image = $rows['image'];
			}*/

			//displaying all at omce

			echo" 


			<div style='text-align:center;'>

				<table class='table table-bordered table-hover'>
			                                                      
					<tr>
						<tr>
							<td><style='font-weight: bold;'><img src='$image' style='width: 60px; border:solid thin white; border-radius: 50%; margin-top:-10px;'>
							</td>
							<td>
							<input class='form-control' type='email' name='u_name' required value='$username' readonly>
							</td>
							<td>
							<input class='form-control' type='email' name='u_email' required value='$email' readonly>
							</td>

						</tr> 
					</tr>
				</table>
			   
			</div>
			"; 
		}

	}


/*
if (isset($_POST['palavra'])) 
{
	
	$pensionista = htmlentities("%".trim($_POST['palavra'])."%");
	$get_user = "SELECT * FROM users where username like '%$pensionista%' or email like '%$pensionista%'";	
}else{
	$get_user = "SELECT * FROM users order by username DESC limit 5";
}

$run_user = $conn->query($get_user);
$run_user->execute();

while ($row_user = $run_user->fetch(PDO::FETCH_BOTH))
{
	//$mydata = "";
	$username = $row_user['username'];
	$email = $row_user['email'];
	$image = $row_user['image'];
	$gender = $row_user['gender'];

		$image = ($gender == "Male") ? 'assets/images/user_gender_male.jpg' : 'assets/images/user_gender_female.jpg';

		if (file_exists($row_user['image'])) 
		{
			$image = $row_user['image'];
		}

		//displaying all at omce

		echo" 
		

		<div style='text-align:center;'>
	
			<table class='table table-bordered table-hover'>
                                                              
				<tr>
					<tr>
						<td><style='font-weight: bold;'><img src='$image' style='width: 60px; border:solid thin white; border-radius: 50%; margin-top:-10px;'>
						</td>
						<td>
						<input class='form-control' type='email' name='u_name' required value='$username' readonly>
						</td>
						<td>
						<input class='form-control' type='email' name='u_email' required value='$email' readonly>
						</td>

					</tr> 
				</tr>
			</table>
           
        </div>
        "; 

}*/