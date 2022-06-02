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
    $link_create_poll = "create_poll.php";
    $link_logout = "inc/logout.php";    
    require("inc/header.inc.php");

    $statement = $pdo -> query("SELECT  * FROM poll");
    $poll_arr = $statement -> fetchAll(PDO::FETCH_ASSOC);
    foreach($poll_arr as $poll_arr){
    $polls .=  "
          <div class=\"text-left w-90 mt-2 mb-2\">
              <h4>" . "Ersteller: " . $poll_arr["username"] . "</h4>
              <h5>" . "ID:" . $poll_arr["umfrageID"] . "</h5>   
              <h6>" . "Frage: ". $poll_arr["question"] ."<br>". "</h6>
              <h6>" . $poll_arr["anwser1"] . " : " . "<button>Vote</button>" . "</h6>
              <h6>" . $poll_arr["anwser2"] . " : " . "<button>Vote</button>" . "</h6>
              
          </div>" 
          ; 
    }

    //print("Hallo");

    //$statement = $pdo -> prepare ("INSERT INTO poll (umfrageID, username, anonym, question, question1, question2, answerYES, answerNO) VALUES (?,?,?,?,?,?,?,?)");
    //$statement -> execute (array("Test1234", "Tobias", true, "Wie geht es dir?", "Gut", "Schlecht", 0, 0));

    ?>
    <div class="container-lg border border-primary chat_wrapper rounded w-50 mt-5">
      <h2 class="mt-3">Willkommen bei den Umfragen, <?=$username?>!</h2>
      <div class="container-fluid border border-secondary rounded chat_text mt-4 w-90">
          <?php echo $polls?>
      </div>
      <a href="<?php echo $link_create_poll ?>"><button type="submit" name="submit" class="btn btn-primary mt-3">Erstelle eine neue Umfrage</button></a>
    </div>