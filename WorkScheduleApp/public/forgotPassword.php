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
	<title>Forgot Password Page</title>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    	.main{
    	   	color:white;
        	padding:.5em;
    	}
    	.container{
    		margin:10% auto;
    		width:450px;
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
    	.row{
    		margin-top: 15px;
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
	<?php 

	?>
	<div class="main">
		<div class="container rounded border border-light">
			<h3 class="text-responsive">Forgot&nbsp;Password&nbsp;Page</h3>
			<?php
				if(isset($_SESSION['username'])){
					$username = $_SESSION['username'];
				}
				$empid="";
				$ssn3digits="";
					
				
				if(isset($_POST['forgotpassword'])){
					//print_r($_POST);
					$error="";
					

					$empid = $_POST['empid'];
					$ssn3digits = $_POST['ssn3digits'];
					$newpassword = $_POST['newpassword'];
					$confirmpassword = $_POST['confirmpassword'];

					if($empid=="" || $ssn3digits=="" || $newpassword =="" || $confirmpassword=="" ){
						$error.="All fields are required.";
					}elseif(strlen($ssn3digits) != 3){
						$error.="Please input the last 3 digits of your SSN.";
					}elseif(strlen($newpassword) < 3){
						$error.="Password must be atleast 3 characters.";
					}elseif($newpassword !== $confirmpassword){
						$error.="The new password and confirm password don't match.";
					}else{
						$hashedpassword = $newpassword;
						$query="";

						$query .= "UPDATE `employee` SET `hashedpassword` = '".$hashedpassword."' WHERE `employee`.`empid` = ".$empid." AND SUBSTRING(`employee`.`ssn`,3) = ".$ssn3digits.";";
						$query .= "UPDATE employee SET temppassword='' WHERE empid= ".$empid." LIMIT 1;commit;";
						
						//print_r($query);

						$affected = $connection->exec($query);
						
						if(!$affected){
							echo "<span class='text-danger'>Update password was unsuccessful, please review your input and try again.</span>";
							
						}else{

							echo "<span class='text-danger'><br/>Your password has been successfully updated. Please login using your new password.<br/></span>";
							echo "<a href='login.php'>Go back to login page.</a>";
							exit;
						}

					}

					echo "<span class='text-danger'>".$error."</span>";
				}
			?>
			<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
				<table>
					
					<tbody>
						<tr><td class="text-right">User&nbsp;Name:</td><td><input type="text" name="username" id="username" value="<?php echo $username; ?>"></td></tr>
						<tr><td class="text-right">Confirm&nbsp;Employee&nbsp;Id:</td><td><input type="text" name="empid" id="empid" value="<?php echo $empid; ?>"></td></tr>
						<tr><td class="text-right">Confirm&nbsp;last&nbsp;3&nbsp;digits&nbsp;of&nbsp;SSN:</td><td><input type="text" name="ssn3digits" id="ssn3digits" value="<?php echo $ssn3digits; ?>"></td></tr>
						<tr><td class="text-right">New Password:</td><td><input type="password" name="newpassword" id="newpassword"></td></tr>
						<tr><td class="text-right">Confirm Password:</td><td><input type="password" name="confirmpassword" id="confirmpassword"></td></tr>
					</tbody>
				</table>
				<div class="row">
					<div class="col-lg-12"><button class="btn btn-info" type="submit" id="forgotpassword" name="forgotpassword" value="submit">Submit</button></div>
					
				</div>
				
			</form>
		</div>

	</div>

</body>
</html>