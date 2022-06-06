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
    $link_create_polldb = "create_polldb.php";
    $link_logout = "inc/logout.php";
    require("inc/header.inc.php");

    

?>
<form class="container-lg border border-primary chat_wrapper rounded w-50 mt-5" id="form" method="post" action="create_polldb.php">
    <h2 class="mt-3">Bitte fülle Folgende Felder aus:</h2>

    <!--Row-->
    <div class="row">

    <div class="mb-3 mt-3"></div>

    <!--Question-->
    <div class="col">
        <div class="input-group">
        <label for="question" class="input-group-text">Question</label>
        <input type="text" class="form-control" id="question" placeholder="Question" name="question" required />
        </div>
    </div>

    <!--Antwort1-->
    <div class="col">
        <div class="input-group"> 
        <label for="anwser1" class="input-group-text">Answer</label>
        <input type="text" class="form-control" id="anwser1" placeholder="Answer" name="anwser1" required />
        </div>
    </div>

    <!--Antwort2-->
    <div class="col">
        <div class="input-group"> 
        <label for="anwser2" class="input-group-text">Answer</label>
        <input type="text" class="form-control" id="anwser2" placeholder="Answer" name="anwser2" required />
        </div>
    </div>

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