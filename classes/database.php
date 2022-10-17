<?php

Class Database
{
	
	private $con;

	function __construct()
	{
		$this->con = $this->connect();
	}

	private function connect()
	{	

		$string = "mysql:host=localhost;dbname=carteira_db"; 
		try
		{
			$connection = new PDO($string,DBUSER,DBPASS);
			return $connection;

		}catch(PDOException $e)
		{
			echo "Erro com banco de dados: ".$e->getMessage();
			die;
		}catch(Exception $e)
		{
			echo "ERRO generico!";
		}

		return false;
	}

	//escrever na base de dados
	public function write($query, $data_array = [])
	{
		
		$con = $this->connect();
		
		$statement = $con->prepare($query);
		$check = $statement->execute($data_array);

		if ($check) 
		{	
			return true;
		}

		return false;
	}

	public function read($query, $data_array = [])
	{
		
		$con = $this->connect();
		
		$statement = $con->prepare($query);
		$check = $statement->execute($data_array);

		if ($check) 
		{
			$result = $statement->fetchAll(PDO::FETCH_OBJ);

			if(is_array($result) && count($result) > 0)
			{	
				
				return $result;
			}

			//else return false
			return false;
		}

		return false;
	}

	public function generate_id()
	{
		$rand = "";
		$rand_count = rand(4, 10);

		for ($i=0; $i < $rand_count; $i++) 
		{ 
			$r = rand(0,5);
			$rand .= $r;
		}

		return $rand;
	}



	public function search_user()
	{

		//echo "<script>alert('ola mundo')</script>";
		
		$con = $this->connect();


		if (isset($_GET['search_btn'])) 
		{
			
			$search_query = htmlentities("%".trim($_GET['search_query'])."%");
			$get_user = "SELECT * FROM users where username like '%$search_query%' or email like '%$search_query%'";	
		}else{
			$get_user = "SELECT * FROM users order by username DESC limit 5";
		}

		$run_user = $con->query($get_user);
		$run_user->execute();
		
		while ($row_user = $run_user->fetch(PDO::FETCH_BOTH))
		{
			$mydata = "";
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

		}

	}


	public function search_pensioner()
	{

		//echo "<script>alert('ola mundo')</script>";
		$id_operador = $_SESSION['userid'];

		$con = $this->connect();
		if (isset($_GET['search_btn'])) 
		{
			
			$search_query = htmlentities("%".trim($_GET['search_query'])."%");

			$get_user = "SELECT * FROM pensioner where id_operador = '$id_operador' and (username like '%$search_query%' or email like '%$search_query%')";	
		}else{
			$get_user = "SELECT * FROM pensioner where id_operador = '$id_operador' order by username DESC limit 10";
		}

		$run_user = $con->query($get_user);
		$run_user->execute();
		
		while ($row_user = $run_user->fetch(PDO::FETCH_BOTH))
		{

			$username = $row_user['username'];
			$email = $row_user['email'];
			//$image = $row_user['image'];
			$gender = $row_user['gender'];
			$id = $row_user['id'];

				$image = ($gender == "Masculino") ? 'assets/images/user_gender_male.jpg' : 'assets/images/user_gender_female.jpg';

				/*if (file_exists($row_user['image'])) 
				{
					$image = $row_user['image'];
				}*/

				//displaying all at omce

				$mydata = " 
				

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
								<td>
									<a class='form-control fa fa-eye' href='signup_pensioner.php?id_up=$id' style='background-color:#60c160; color:white;' title='ver'></a>
								</td>
								<td>
									<a class='form-control fas fa-trash-alt' href='pensioner_list.php?id=$id' style='background-color:#e88c95;color=white;' title='Excluir'></a>
								</td>

							</tr> 
						</tr>
					</table>
                   
                </div>
                "; 

                echo $mydata;
               
		} 

		if($run_user->rowCount() <= 0)
		{
			echo "Nenhum pensionista encontrado...";
		}

	}

	public function excluirPessoa($id)
	{
		$con = $this->connect();

		$cmd = $con->prepare("DELETE FROM pensioner WHERE id = :id");
		$cmd->bindValue(":id",$id);
		$cmd->execute();
		
	}
	
	public function buscarDadosPessoa($id)
	{	
		$con = $this->connect();
		$res = array();
		$cmd = $con->prepare("SELECT * FROM pensioner WHERE id = :id");
		$cmd->bindValue(":id",$id);
		$cmd->execute();

		$res = $cmd->fetch(PDO::FETCH_ASSOC);
		return $res;
	}

}

