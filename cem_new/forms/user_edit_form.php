<?php
include "php/vars.php";

echo<<<HTML
	<form action="$site_root/php/update_user.php" method="post">
		<div class="container">
			<label for="uname" class="control-label"><b>Username</b></label>
			<input class="form-control" type="text" placeholder="Username" name="uname" required><br>

			<label for="passw" class="control-label"><b>Current Password</b></label>
			<input class="form-control" type="password" placeholder="Password" name="passw" required><br>

			<label for="passw" class="control-label"><b>E-mail Address</b></label>
			<input class="form-control" type="email" placeholder="Email" name="email" required><br>

			<label for="passw" class="control-label"><b>Password</b></label>
			<input class="form-control" type="text" placeholder="Password" name="newpassw" required><br>

			<label for="passw" class="control-label"><b>Confirm Password</b></label>
			<input class="form-control" type="text" placeholder="Password" name="newcpassw" required><br>

			<input type="submit" name="submit" value= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Submit &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" class="btn btn-primary center-block"><br>
		</div>
	</form><br>
	</br>
HTML;

?>