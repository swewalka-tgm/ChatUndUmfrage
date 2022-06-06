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
    $chats_arr = array_reverse($chats_arr);
    foreach($chats_arr as $chat_arr){
      $dt = new DateTime("now", new DateTimeZone("Europe/Vienna")); //first argument "must" be a string
      $dt->setTimestamp($chat_arr["time"]);
      $chats .=  "<div class=\"text-left w-90 mt-2 mb-2\">
              <p class=\"d-inline text-primary\">" . $chat_arr["username"] . " @ " . $dt->format("H:i") . ":</p>
              <p class=\"d-inline\">" . $chat_arr["msg"] . "</p>
          </div>";
    }
    ?>
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-chat100">
        <a class="btn logout" href="<?php echo $link_logout?>">Log Out</a>
            <span class="login100-form-title">
              Chat
            </span>
            <div class="container-lg rounded">
              <div class="container-fluid border border-secondary chat text-center rounded mt-4 w-90">
                <?php echo $chats?>
              </div>
              <form action="" method="POST" class="mt-0">
                <input type="text" class="form-control input mt-1" id="msg" required name="msg">
              </form>
            </div>
        </div>
      </div>
  </div>
    <?php
    require("inc/footer.inc.php");
?>