<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Validation</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.css" rel="stylesheet"/>
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.css"></link>
    <style>
    	.main{
    		width: 90%;
    		margin:0 auto;
    		font-size:1rem;
    	}
    	
    	form{
    		margin: 30px auto 60px;
    		width:500px;
    		background-color: #30353b;
    		border: 1px solid white;
    		color: whitesmoke;
    		box-shadow: 0 4px 25px #070509;
    		padding: 2%;
    	}
    	.form-control{
    		padding: .175rem .15rem;
    	}
    	td input[type=text] {
    		width: -webkit-fill-available;
    		border-radius: .15rem!important
    		
		}
		input{
			border: .05rem solid white;
			margin-bottom: 2px;
			background-color: #f1f0f0;
		}
    	.table-responsive{
    		display:inline-table;
    	}

    	table#avail{
    		margin-top: 20px;
    		background-color: whitesmoke;
    		color:black;
    		padding:10px!important;
    		border-radius: .25rem!important

    	}

    	.rounded {
		    border-radius: .25rem!important
		}

		tr.availSection td {
		    padding: 4px;
		    padding-right: 20px;
		    text-indent: 20px;
		}
		input.btn.btn-info {
			margin-bottom:20px;
		}
		.glyphicon{
			background-image: url("bg-images/datepicker.png");
		}
    	
    </style>

</head>
<body>

	<div class="main">
		<div class="container rounded">
			<form class="rounded" method="post" action="processRegistration.php">
				
				<h5 class="text-center">Employee Registration Form</h5>
				<div>&nbsp;</div>
				<table class="table-responsive">
					<tbody>
						<tr><td>Employee ID: </td><td><input class="form-control" type="text" name="empid" id="empid"></td></tr>
						<tr><td>SSN: </td><td><input class="form-control" type="text" name="ssn" id="ssn"></td></tr>
						<tr><td>First Name: </td><td><input type="text" class="form-control" name="fname" id="fname"></td></tr>
						<tr><td>Last Name: </td><td><input type="text" class="form-control" name="lname" id="lname"></td></tr>
						<tr><td>Position: </td><td><input type="text" class="form-control" name="position" id="position"></td></tr>
						<tr><td>Gender: </td><td><input class="form-control" type="text" name="gender" id="gender"></td></tr>
						<tr><td>Birthday: </td><td>
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="button" class="input-group-text" id="bdayPicker">
										<i class="fa fa-calendar-alt"></i>
									</button>
								</div>
								<input class="datepicker form-control" data-date-format="mm/dd/yyyy" type="text" name="bday">
							</div>
						</td></tr>
						<tr><td>Email: </td><td><input class="form-control"  type="text" name="email" id="email"></td></tr>
						<tr><td>Phone: </td><td><input class="form-control" type="text" name="phone" id="phone"></td></tr>
						
						<tr><td>Hire Date: </td><td>
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="button" class="input-group-text" id="hiredayPicker">
										<i class="fa fa-calendar-alt"></i>
									</button>
								</div>
								<input class="datepicker form-control" data-date-format="mm/dd/yyyy" type="text" id="hiredate" name="hiredate">
							</div>
						</td></tr>
						<tr><td>Address: </td><td><input class="form-control" type="text" name="address" id="address"></td></tr>
						<tr><td>City: </td><td><input class="form-control" type="text" name="city" id="city"></td></tr>
						<tr><td>Province: </td><td><input class="form-control" type="text" name="city" id="city"></td></tr>
						<tr><td>Country: </td><td><input  class="form-control" type="text" name="country" id="country"></td></tr>
						<tr><td>Postal Code: </td><td><input class="form-control" type="text" name="postal" id="postal"></td></tr>
						
						</tbody>
				<!-- </table>	
				<table class="table-responsive" id="avail">
					<tbody>
						<tr class="availSection"><td colspan="2">
								<table>
									<thead><tr><td colspan="2">Availability (Select all that applies)</td><tr></thead>
									<tbody>
										<tr>
											<td>
												<input type="checkbox" name="daysAvail" id="mon" value="Monday">Monday
											</td>
											<td>
												<input type="checkbox" name="daysAvail" id="tue" value="Tuesday">Tuesday
											</td>
										</tr>
										<tr>
											<td>
												<input type="checkbox" name="daysAvail" id="wed" value="Wednesday">Wednesday
											</td>
											<td>
												<input type="checkbox" name="daysAvail" id="thurs" value="Thursday">Thursday
											</td>
										</tr>
										<tr>
											<td>
												<input type="checkbox" name="daysAvail" id="fri" value="Friday">Friday
											</td>
											<td>
												<input type="checkbox" name="daysAvail" id="sat" value="Saturday">Saturday
											</td>
										</tr>
										<tr>
											<td colspan="2">
												<input type="checkbox" name="daysAvail" id="sun" value="Sunday">Wednesday
											</td>
											
										</tr>
									</tbody>
								</table>
							<td>
						<tr class="availSection">
							<td colspan="2">
								<table>
									<thead><tr><td>Preffered Work Schedule (Select all that applies)</td><tr></thead>
									<tbody>
										<tr><td><input type="checkbox" name="prefSched" id="early"/>Early Morning Shift</td></tr>
										<tr><td><input type="checkbox" name="prefSched" id="day"/>Day Shift</td></tr>
										<tr><td><input type="checkbox" name="prefSched" id="swing"/>Swing Shift</td></tr>
										<tr><td><input type="checkbox" name="prefSched" id="night"/>Night Shift</td></tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr><td>&nbsp;</td><td class="float-right"><input class="btn btn-info" type="submit" value="Register" name="submit"></td></tr>
					</tbody>
				</table> -->
						
			</form>			
		</div>
	</div>


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"/></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"/></script>
    <script>
    	$(document).ready(function(){
    		$('.datepicker').datepicker();
    	
    	})
    	
    	//note correct the timepicker
	</script>
</body>
</html>