<?php
    session_start();
    require("inc/db.inc.php");
    if(!isset($_SESSION["username"])){
        header("Location: ../src/login.php");
    }
    $umfrageid = rand(1,1000);
    $username = $_SESSION["username"];
    $title = "Poll | Chat and Poll";
    $link_index = "../index.php";
    $link_chat = "chat.php";
    $link_poll = "poll.php";
    $link_logout = "inc/logout.php";
    require("inc/header.inc.php");
    require("inc/navbar.inc.php");

    //alle Daten abrufen

    $anonym = htmlspecialchars($_POST['anonym']);
    $question = htmlspecialchars($_POST['frage']);
    $antwort1 = htmlspecialchars($_POST['anwser1']);
    $antwort2 = htmlspecialchars($_POST['anwser2']);

    //TODO: Anonym-Check
    $anonym = true;

    echo "$umfrageid";
    echo "$username";
    echo "true";
    echo "$question";
    echo "$antwort1";
    echo "$antwort2";

    $statement = $pdo -> prepare ("INSERT INTO poll (umfrageID, username, anonym, question, anwser1, anwser2, anwser1count, anwser2count) VALUES (?,?,?,?,?,?,?,?)");
    $statement -> execute (array($umfrageid, $username, $anonym, $question, $antwort1, $antwort2, 0, 0));

?>
<div class="container-lg border border-primary chat_wrapper rounded w-50 mt-5">
    <h2 class="mt-3">Die Umfrage wurde erfolgreich erstellt</h2>
    <a href="<?php echo $link_poll ?>"><button type="submit" name="submit" class="btn btn-primary mt-3">Zu den Umfragen</button></a>
</div>