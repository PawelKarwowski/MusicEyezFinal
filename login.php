
<?php 
if(!session_id()) {
    session_start();
};
	
	if(!isset($_POST['login'])||(!isset($_POST['password'])))
	{
		header('Location: index.php');
		exit();
	}
	
	require_once"connect.php";

	$connection=new mysqli($host,$db_user,$db_password,$db_name);
	
	if($connection->connect_errno!=0)
	{
		echo "Error".$connection->connect_errno;
	}
	else
	{
		$login=$_POST['login'];
		$password=$_POST['password'];
	
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
	
		if($result=$connection->query(sprintf("SELECT * FROM uzytkownicy WHERE BINARY user='%s'",
			mysqli_real_escape_string($connection,$login))))
			{
				$count_user=$result->num_rows;
				if($count_user>0)
				{
					$row=$result->fetch_assoc();
					
					if(password_verify($password,$row['pass']))
					{
					$_SESSION['logged-in']=true;
					$_SESSION['id']=$row['id'];
					$_SESSION['user']=$row['user'];
					$_SESSION['email']=$row['email'];
					$_SESSION['picture']=$row['picture'];

					unset($_SESSION['error']);
					$result->free_result();
					header('Location: signedin.php');
					}
					else
						{
							$_SESSION['error']='<span style="color:blue">Niepoprawny login lub hasło!</span>';
								header('Location: index.php');
						}
				}
				else
					{
						$_SESSION['error']='<span style="color:red">Niepoprawny login lub hasło!</span>';
							header('Location: index.php');
					}
			}
		$connection->close();
	}
?>


