<?php
    //header Code
    session_start();
    if(isset($_SESSION["username"])){
        header("Location: ../index.php");
    }
    require("inc/header.inc.php");
    require("inc/db.inc.php");
    //Login-Part
    if(isset($_POST["username"]) || isset($_POST["pass"])){
        $username = $_POST["username"];
        $passwd = $_POST["pass"];
        $statement = $pdo -> prepare ("SELECT * FROM users WHERE username = ?");
        $statement -> execute (array("$username"));
        $output = $statement -> fetchAll();
        if($statement -> rowCount() == 1){
            $pw_hash = $output[0]["pw_hash"];
            if(password_verify($passwd, $pw_hash)){
                $_SESSION["username"] = $username;
                header("Location: ../index.php");
            } else {
                $errmsg = "<div class=\"mt-2 alert alert-danger\" role=\"alert\">Passwort falsch!</div>";
            }
        } else{
            $errmsg = "<div class=\"mt-2 alert alert-danger\" role=\"alert\">Konto existiert nicht!</div>";
        }
    }
?>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="view/images/img-01.png" alt="IMG">
				</div>
				<form class = "login100-form validate-form" action="" method="post">
					
					<span class="login100-form-title">
						Chat Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username" id="username" placeholder="Username" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" id="pass" placeholder="Password" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button type="submit" name="submit" class="login100-form-btn">
							Login
						</button>
					</div>       
					<div class="text-center p-t-136">
						<a class="txt2" href="<?php echo "register.php" ?>">
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
