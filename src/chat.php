<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: ../src/login.php");
    }
    $username = $_SESSION["username"];
    $title = "Chat | Chat and Poll";
    $link_index = "../index.php";
    $link_chat = "chat.php";
    $link_poll = "poll.php";
    $link_logout = "inc/logout.php";
    require("inc/header.inc.php");
    require("inc/db.inc.php");
    if(isset($_POST["msg"])){
      $msg = $_POST["msg"];
      $statement = $pdo -> prepare ("INSERT INTO chats (username, msg, time) VALUES (?,?, UNIX_TIMESTAMP())");
      $statement -> execute (array($username, $msg));
    }
    $statement = $pdo -> query("SELECT  * FROM chats");
    $chats_arr = $statement -> fetchAll(PDO::FETCH_ASSOC);
    foreach($chats_arr as $chat_arr){
      $dt = new DateTime("now", new DateTimeZone("Europe/Vienna")); //first argument "must" be a string
      $dt->setTimestamp($chat_arr["time"]);
      $chats .=  "<div class=\"text-left w-90 mt-2 mb-2\">
              <p class=\"d-inline text-primary\">" . $chat_arr["username"] . " @ " . $dt->format("H:i") . ":</p>
              <p class=\"d-inline\">" . $chat_arr["msg"] . "</p>
          </div>";
    }
    ?>
    <div class="container-lg border border-primary chat_wrapper rounded w-50 mt-5">
      <h2 class="mt-3">Willkommen im Gruppenchat, <?=$username?>!</h2>
      <div class="container-fluid border border-secondary rounded chat_text mt-4 w-90">
          <?php echo $chats?>
      </div>
      <form action="" method="POST" class="mt-0">
          <input type="text" class="form-control" id="msg" required name="msg">
          <button type="submit" name="submit" class="btn btn-primary mt-3">Senden</button>
      </form>
    </div>
    <?php
    require("inc/footer.inc.php");
?>