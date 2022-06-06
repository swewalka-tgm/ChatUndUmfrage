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


    $statement = $pdo -> prepare ("INSERT INTO polls (poll_id,poll_question,created_from) VALUES(?,?,?)");
    $statement -> execute (array(1,$question, $username));
    $option1 = $pdo -> prepare ("INSERT INTO polls_choices (poll_id,choice) VALUES(?,?)");
    $option1 -> execute (array(1,$answer1));
    $option2 = $pdo -> prepare ("INSERT INTO polls_choices (poll_id,choice) VALUES(?,?)");
    $option2 -> execute (array(1,$answer2));

?>
<div class="container-lg border border-primary chat_wrapper rounded w-50 mt-5">
    <h2 class="mt-3">Die Umfrage wurde erfolgreich erstellt</h2>
    <a href="<?php echo $link_poll ?>"><button type="submit" name="submit" class="btn btn-primary mt-3">Zu den Umfragen</button></a>
</div>