<?php
    session_start();
    require("inc/db.inc.php");
    if(!isset($_SESSION["username"])){
        header("Location: ../src/login.php");
    }
    $check = $pdo -> prepare("SELECT * FROM polls");
    $check -> execute();
    if($check -> rowCount() > 0){
        header("Location: ../src/poll.php");
    }
    $username = $_SESSION["username"];
    $link_index = "../index.php";
    $link_chat = "chat.php";
    $link_poll = "poll.php";
    $link_logout = "inc/logout.php";
    require("inc/header.inc.php");

    //alle Daten abrufen
    $question = htmlspecialchars($_POST['question']);
    $answer1 = htmlspecialchars($_POST['anwser1']);
    $answer2 = htmlspecialchars($_POST['anwser2']);


    $statement = $pdo -> prepare ("INSERT INTO polls (username,poll_question,choice1,choice2) VALUES(?,?,?,?)");
    $statement -> execute (array($username,$question,$answer1,$answer2));

?>
<div class="container-lg border border-primary chat_wrapper rounded w-50 mt-5">
    <h2 class="mt-3">Die Umfrage wurde erfolgreich erstellt</h2>
    <a href="<?php echo $link_poll ?>"><button type="submit" name="submit" class="btn btn-primary mt-3">Zu den Umfragen</button></a>
</div>

<div class="limiter">
      <div class="container-login100">
        <div class="wrap-chat100">
        <a class="btn logout" href="<?php echo $link_logout?>">Log Out</a>
            <span class="login100-form-title">
              Umfrage
            </span>
            <div class="container-lg rounded">
                <h2 class="mt-3">Die Umfrage wurde erfolgreich erstellt</h2>
                <a href="<?php echo $link_poll ?>"><button type="submit" name="submit" class="btn btn-primary mt-3">Zu der Umfrage</button></a>
            </div>
        </div>
      </div>
  </div>
    <?php
    require("inc/footer.inc.php");
?>