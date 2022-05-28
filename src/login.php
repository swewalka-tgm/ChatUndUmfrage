<?php
    //header Code
    session_start();
    if(isset($_SESSION["username"])){
        header("Location: ../index.php");
    }
    $title = "Login | Chat and Poll";
    require("inc/header.inc.php");
    require("inc/db.inc.php");
    //Login-Part
    if(isset($_POST["username"]) || isset($_POST["passwd"])){
        $username = $_POST["username"];
        $passwd = $_POST["passwd"];
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
    <form class="container-sm " action="" method="post" id="form">
        <fieldset class="form-group border p-3">
            <legend class="w-auto px-2">Melde dich an!</legend>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Username</span>
                <input type="text" class="form-control" id="username" required name="username">
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
        <p>Noch kein Konto? <a href="./register.php">Registriere dich!</a></p>
        
    </div>
<?php
    require("inc/footer.inc.php");
?>
