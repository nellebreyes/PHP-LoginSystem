<?php
session_start();
include('../includes/functions.php');
try{

require_once('../includes/pdo_connection.php');	

}catch(Exception $e){
	$error = $e ->getMessage();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    	.main{
    	   	color:white;
        	padding:.5em;
    	}
    	.container{
    		margin:10% auto;
    		width:400px;
    		border:1px solid black;
    		padding:1.5%;
    		background:#30353b;
    		box-shadow: 0 4px 40px #070509;
    	}
    	.btn{
    		width:100px;
    		margin-bottom:17px;
    	}

    	div div.row{
    		padding:0px;
    		text-align: end;
    		padding-right:27px;
    	}
    	
    	table{
    		border:0px;
    		min-width: -webkit-fill-available;
    	}
    	.text-right{
    		padding-right:10px;
    	}
    	input{
			border: .05rem solid white;
			margin-bottom: 2px;
			background-color: #f1f0f0;
			width:90%;
    		margin:2% auto;
		}

		@media screen and (min-width: 900px){
    		h3{
    			font-size: 1.25rem;
    			margin-bottom: 15px;
    		}
    		div,td,th,span{
    			font-size: 1rem;
    			
    		}
    	}

    	@media screen and (max-width: 900px){
    		h3{
    			font-size: 1rem;
    		}
    		div,td,th,span{
    			font-size: .80rem;
    		}
    	}
    	@media screen and (max-width: 600px){
    		h3{
    			font-size: .95rem;
    		}
    	}
    	@media screen and (max-width: 300px){
    		h3{
    			font-size: .85rem;
    		}
    	}
    	
    </style>
</head>
<body>
	<div class="main">
		<div class="container rounded border border-light">
			<h3 class="text-responsive">Employee&nbsp;Login&nbsp;Page</h3>
			<?php
				if($connection){
					//echo "Connected to test database <br/>";
					//ALTER TABLE `valid_users` CHANGE `user_name` `username` VARCHAR(30);
					if(isset($_POST['login'])){
						//print_r($_POST);
						$input_username = $_POST['username']??'';
						$input_password = $_POST['password']??'';

						if(empty($input_username) || empty($input_password)){
							$_SESSION['message'] = "Username and password are required fields.";
							echo "<span class='text-danger'>".$_SESSION['message']."</span>";
						}else{

							$query = "SELECT empid,username,temppassword,hashedpassword FROM test.employee ";
							$query .= "WHERE username = '".$input_username."' ";
							$query .= "AND temppassword ='".$input_password."' OR hashedpassword ='".$input_password."';";
														
							//echo $query;
							$errorInfo = $connection ->errorInfo();

							$result = $connection ->query($query);
							//print_r($result);
							$errorInfo = $connection ->errorInfo();
							$row = $result ->fetch(PDO::FETCH_ASSOC);	
							//print_r($row);
							$_SESSION['username'] = $input_username;
							
							
							if($row){
								if(!empty($row['temppassword'])){
									$_SESSION['empid'] = $row['empid'];
									redirect_to('updatePassword.php',$row['username'],$row['empid']);
								}elseif($row['temppassword'] ==''){
									$_SESSION['empid'] = $row['empid'];
									redirect_to('employeepage.php',$row['username'],$row['empid']);
								}
								
							}
							echo " <span class='text-danger'>Invalid username or password.</span>";
							
						}
					
					}//end of login button is clicked


				}else{
						echo $error;
				}
				
			?>
			<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
				<table>
					<tbody>
						<tr><td class="text-right">User&nbsp;Name:</td><td><input type="text" name="username" id="username" value="<?php if(isset($_POST['login'])){echo $input_username;} ?>"></td></tr>
						<tr><td class="text-right">Password:</td><td><input type="password" name="password" id="password"></td></tr>

					</tbody>
				</table>
				<div class="row">
					<div class="col-lg-12"><button class="btn btn-info" type="submit" id="login" name="login" value="submit">Login</button></div>
					
				</div>
				<div class="row">
					<div class="col-lg-12 figure-caption text-right"><a href="forgotPassword.php"> Forgot Password?</a></div>
				</div>
			</form>
		</div>


	</div>
<script type="text/javascript">
	var username = document.getElementById('username');
	window.onload = function(){
		username.focus();
	}
</script>
</body>
</html>