<?php
    require("inc/db.inc.php");
    $title = "Register | Chat and Poll";
    require("inc/header.inc.php");
    if(isset($_POST["username"]) || isset($_POST["mail"])) {
        $username = $_POST["username"];
        $mail = $_POST["mail"];
        $passwd = $_POST["passwd"];
        //Check Entries
        $statement = $pdo -> prepare ("SELECT * FROM users WHERE username = ? OR mail = ?");
        $statement -> execute (array("$username", $mail));
        if($statement -> rowCount() == 0 && $username != null){
            //If account is unique
            $statement = $pdo -> prepare ("INSERT INTO users (username, mail, pw_hash) VALUES (?,?,?)");
            $statement -> execute (array($username, $mail, password_hash($passwd, PASSWORD_BCRYPT)));
            $errmsg = "";
            header("Location: ../index.php");
        } else{
            $errmsg = "<div class=\"mt-2 alert alert-danger\" role=\"alert\">Konto mit diesem Name/Email exisitiert bereits</div>";
        }
    }
?>
    <form class="container-sm " action="" method="post" id="form">
        <fieldset class="form-group border p-3">
            <legend class="w-auto px-2">Registriere ein Konto</legend>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Username</span>
                <input type="text" class="form-control" id="username" required name="username">
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">E-Mail</span>
                <input type="email" class="form-control" placeholder="maxmusterman@email.com" required id="mail" name="mail">
              </div>
              <div class="input-group mb-3">
                <span for="text" class="input-group-text">Password</span>
                <input type="password" class="form-control" required id="passwd" name="passwd">
              </div>
              <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
        </fieldset>
        <?php
            echo $errmsg;
        ?>
    </form>
    <div class="container-sm reg_log_div">
        <p>Hast du schon ein Konto? <a href="./login.php">Melde dich an!</a></p>
        
    </div>
<?php
    require("inc/footer.inc.php");
?>