<?php
include "php/vars.php";?>
<html>
<body>
	<form action="$site_root/login.php" method="post">
        <div class="container-fluid">
            <div class="row">
                <label for="uname" class="control-label"><b>Username</b></label>
                <input id= "uname" class="form-control" type="text" placeholder="Username" name="uname" required><br>
                <label for="npassw" class="control-label"><b>New Password</b></label>
                <input id= "npassw" class="form-control" type="password" placeholder="New Password" name="npassw" required><br>
                <label for="rnpassw" class="control-label"><b>Re- Enter Password</b></label>
                <input id= "rnpassw" class="form-control" type="password" placeholder="Re- Enter Password" name="rnpassw" required><br>
<!--            <a href="--><?php //echo $view_urls; ?><!--" class="btn btn-info btn-block" id="view-pres" name="view-pres" style="text-decoration: none; color:white;">Submit </a>-->
                <input type="submit" name="submit" class="btn btn-primary"><br>
            </div>
        </div>
	</form>
</body>
</html>
