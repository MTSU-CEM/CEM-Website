<?php
include "php/vars.php";
/*
if 	(
		(isset($_SESSION["uname"])) &&
		(isset($_SESSION["authenticated"])) &&
		(isset($_SESSION["view"])) &&
		$_SESSION['authenticated'] &&
		$_SESSION['view']
	)
{
	header("Location: $site_root/admin_panel.php");
}
else {
*/

/*
User_Id
Fname
Lname
Email
Password
Participant_Type
Role
School_District
School_Name
Permission_Level
*/

echo<<<HTML
	<form action="$site_root/php/register_user.php" method="post">
		<div class="container-fluid">
                    <div class="row">
			<label for="uname" class="control-label"><b>Username</b></label>
			<input type="text" class="form-control" placeholder="Username" name="uname" required><br>

			<label for="fname" class="control-label"><b>First Name</b></label>
			<input type="text" class="form-control" placeholder="First Name" name="fname" required><br>

			<label for="lname" class="control-label"><b>Last Name</b></label>
			<input type="text" class="form-control" placeholder="Last Name" name="lname" required><br>

			<label for="email" class="control-label"><b>Email</b></label>
			<input type="email" class="form-control" placeholder="Email@address.com" name="email" required><br>

			<label for="passw" class="control-label"><b>Password</b></label>
			<input type="password" class="form-control" placeholder="Password" name="passw" required><br>
			
			<label for="passw" class="control-label"><b>Confirm Password</b></label>			
			<input type="password" class="form-control" placeholder="Password" name="cpassw" required><br>
			<input type="submit" name="submit" class="btn btn-primary" ><br>
		     </div>
                </div>
	</form><br>
	</br>
HTML;

?>