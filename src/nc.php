<?php
    $title = "Connection Error | Chat and Poll";
    $link_index = "../index.php";
    $link_chat = "chat.php";
    $link_poll = "poll.php";
    $link_logout = "inc/logout.php";
    require("inc/header.inc.php");
    ?>
    <div class="container-fluid pt-5 pb-0 text-center">
        <h1>Connection Error</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mt-4 mb-4">
                There was an error connecting to the database. Please try again later. <a href="../index.php">Click here</a> to try to reconnect.
            </p>
        </div>
    <?php
    require("inc/footer.inc.php");
    ?>