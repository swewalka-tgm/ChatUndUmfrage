<?php
    session_start();
    require("inc/db.inc.php");
    if(!isset($_SESSION["username"])){
        header("Location: ../src/login.php");
    }
    $username = $_SESSION["username"];
    $link_index = "../index.php";
    $link_chat = "chat.php";
    $link_poll = "poll.php";
    $link_create_poll = "create_poll.php";
    $link_logout = "inc/logout.php";    
    require("inc/header.inc.php");

    $statement = $pdo -> query("SELECT  * FROM polls");
    $poll_arr = $statement -> fetchAll(PDO::FETCH_ASSOC);
    foreach($poll_arr as $poll_arr){
      $options = $pdo -> query("SELECT  * FROM polls_choices WHERE pollid = " . $poll_arr["poll_id"]);
      $options_arr = $options -> fetchAll(PDO::FETCH_ASSOC);
      $polls .=  "
          <div class=\"text-left w-90 mt-2 mb-2\">
              <h6>" . "Frage: ". $poll_arr["question"] ."<br>". "</h6>
              <h6>" . $options_arr[0]["choice"] . " </h6>
              <h6>" . $options_arr[1]["choices"] . "</h6>
              
          </div>" 
          ; 
    }

    ?>
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-chat100">
            <span class="login100-form-title">
              Chat
            </span>
            <div class="container-lg rounded">
              <div class="container-fluid border border-secondary chat text-center rounded mt-4 w-90">
                <?php echo $polls?>
            </div>
        </div>
      </div>
  </div>
  <div class="radio">
      <label><h4><input type="radio" name="poll_option" value="<?php $poll_arr["anwser1"] ?>"><?php $poll_arr["anwser1"]?></h4></label>
      <label><h4><input type="radio" name="poll_option" value="<?php $poll_arr["anwser2"] ?>"><?php $poll_arr["anwser2"]?></h4></label>
  </div>