<?php
include "php/vars.php";
echo<<<HTML
	<form action="$site_root/php/authenticate.php" method="post">
            <div class="container-fluid">
                <div class="row">
                    <label for="uname" class="control-label"><b>Username</b></label>
                    <input id= "uname" class="form-control" type="text" placeholder="Username" name="uname" required><br>
                    <label for="passw" class="control-label"><b>Password</b></label>
                    <input id= "passw" class="form-control" type="password" placeholder="Password" name="passw" required><br>
                    <a href = "$site_root/forgot_password.php" >Forgot Password</a><br><br>
                    <input type="submit" name="submit" class="btn btn-primary"><br>
                </div>
            </div>
	</form>
HTML;


