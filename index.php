<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: ./src/login.php");
    }
    $username = $_SESSION["username"];
    $title = "Dashboard | Chat and Poll";
    $link_index = "index.php";
    $link_chat = "./src/chat.php";
    $link_poll = "./src/poll.php";
    $link_logout = "./src/inc/logout.php";
    require("src/inc/header.inc.php");
    require("src/inc/navbar.inc.php");
    ?>
    <div class="container-fluid pt-5 pb-0 text-center">
        <h1>Willkommen zurück, <?php echo $username?>!</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mt-4 mb-4">
                Das ist dein Dashboard. Hier kannst du zwischen dem Chat und dem Poll auswählen. Auch dein Konto kannst du hier verwalten und anpassen.
            </p>
        </div>
        <div class="container-xxl d-lg-flex justify-content-evenly dashboard_choice">
            <a href="<?php echo $link_chat ?>">
                <div class="container px-5">
                    <img src="./media/Screenshot_20220412_183352.png" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" loading="lazy">
                </div>
            </a>
            <a href="<?php echo $link_poll ?>">
                <div class="container px-5">
                    <img src="https://place-hold.it/1080x720" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" loading="lazy">
                </div>
            </a>
        </div>
    </div>
    
    <?php
    require("src/inc/footer.inc.php");
?>