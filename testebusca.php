<?php

$con = mysqli_connect("localhost", "root", "", "carteira_db") or die ("conexao falhou");

	function search_user()
	{

		//echo "<script>alert('ola mundo')</script>";


		global $con;

		if (isset($_GET['search_btn'])) 
		{
			
			$search_query = htmlentities($_GET['search_query']);
			$get_user = "SELECT * FROM users where username like '%$search_query%' or email like '%$search_query%'";	
		}else{
			$get_user = "SELECT * FROM users order by username DESC limit 5";
		}

		$run_user = mysqli_query($con, $get_user);

		while ($row_user = mysqli_fetch_array($run_user))
		{
			
			$username = $row_user['username'];
			$email = $row_user['email'];
			$image = $row_user['image'];
			$gender = $row_user['gender'];

				//$image = ($gender == "Male") ? 'assets/images/user_gender_male.jpg' : 'assets/images/user_gender_female.jpg';

				/*if (file_exists($row_user['image'])) 
				{
					$image = $row_user['image'];
				}*/

				//displaying all at omce

				echo" 
				
				<div class='col-sm-8'>
					<form action='' method='post' enctype='multipart/form-data'>
						<table class='table table-bordered table-hover'>
		                                                              
						<tr>
							<tr>
								<td><style='font-weight: bold;'><img src='uploads/$image' style='width: 60px; border:solid thin white; border-radius: 50%; margin-top:-10px;'>
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
                    </form>  
                </div>
                "; 	
		}

	}
