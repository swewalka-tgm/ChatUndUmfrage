<?php
    require("inc/db.inc.php");
    require("inc/header.inc.php");
    if(isset($_POST["username"]) || isset($_POST["email"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        //Check Entries
        $statement = $pdo -> prepare ("SELECT * FROM users WHERE username = ? OR mail = ?");
        $statement -> execute (array("$username", $email));
        if($statement -> rowCount() == 0 && $username != null){
            //If account is unique
            $statement = $pdo -> prepare ("INSERT INTO users (username, mail, pw_hash) VALUES (?,?,?)");
            $statement -> execute (array($username, $email, password_hash($pass, PASSWORD_BCRYPT)));
            $errmsg = "";
            header("Location: ../index.php");
        } else{
            $errmsg = "<div class=\"mt-2 alert alert-danger\" role=\"alert\">Konto mit diesem Name/Email exisitiert bereits</div>";
        }
    }
?>
   <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
					<img src="view/images/img-01.png" alt="IMG">
				</div>
				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-title">
						Chat registration
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button type="submit" name="submit" class="login100-form-btn">
							Register
						</button>
					</div>

					<div class="text-center p-t-136" style="visibility: hidden;">
						<a class="txt2">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>

				</form>
			</div>
		</div>
	</div>
<?php
    require("inc/footer.inc.php");
?>