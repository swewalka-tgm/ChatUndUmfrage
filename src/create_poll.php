<?php
    session_start();
    require("inc/db.inc.php");
    if(!isset($_SESSION["username"])){
        header("Location: ../src/login.php");
    }
    $username = $_SESSION["username"];
    $title = "Poll | Chat and Poll";
    $link_index = "../index.php";
    $link_chat = "chat.php";
    $link_poll = "poll.php";
    $link_create_polldb = "create_polldb.php";
    $link_logout = "inc/logout.php";
    require("inc/header.inc.php");
    require("inc/navbar.inc.php");

    

?>
<form class="container-lg border border-primary chat_wrapper rounded w-50 mt-5" id="form" method="post" action="create_polldb.php">
    <h2 class="mt-3">Bitte fülle Folgende Felder aus:</h2>

    <!--Row-->
    <div class="row">

    <div class="mb-3 mt-3"></div>

    <!--Question-->
    <div class="col">
        <div class="input-group">
        <label for="frage" class="input-group-text">Frage</label>
        <input type="text" class="form-control" id="frage" placeholder="Frage" name="frage" required />
        </div>
    </div>

    <!--Antwort1-->
    <div class="col">
        <div class="input-group"> 
        <label for="anwser1" class="input-group-text">Antwort1</label>
        <input type="text" class="form-control" id="anwser1" placeholder="Antwort 1" name="anwser1" required />
        </div>
    </div>

    <!--Antwort2-->
    <div class="col">
        <div class="input-group"> 
        <label for="anwser2" class="input-group-text">Antwort2</label>
        <input type="text" class="form-control" id="anwser2" placeholder="Antwort 2" name="anwser2" required />
        </div>
    </div>

    </div>

    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="anonym">
        <label class="form-check-label" for="anonym">anonym</label>
    </div>
    
    <!--Row-->
    <div class="row">

    <div class="mb-3 mt-3"></div>

    <!--Buttons-->

    <div class="col">
        <a href="<?php echo $link_create_polldb ?>"><button type="submit" name="submit" class="btn btn-primary mt-3">Create</button></a>
    </div>

    <div class="col">
        <a href="<?php echo $link_poll ?>"><button type="submit" name="submit" class="btn btn-primary mt-3">Cancel</button></a>
    </div>


    </div>
</form>