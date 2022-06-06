<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: ./src/login.php");
    }
    $username = $_SESSION["username"];
    $link_chat = "./src/chat.php";
    $link_poll = "./src/poll.php";
    $link_logout = "./src/inc/logout.php";
    require("src/inc/index_header.inc.php");
    
    ?>
    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-chat100">
				<a class="btn logout" href="<?php echo $link_logout?>">Log Out</a>
				<div class="col-md-12">
					<span class="login100-form-title">Dashboard</span>
							<a href="<?php echo $link_chat ?>">
								<div class = "text-center">
									<div class="js-tilt" data-tilt>
										<div class="container px-5">
											<img src="https://www.superoffice.de/globalassets/home-com-website/resources/articles/visuals/chat-benefits/redesign_live-chat.png" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="400" loading="lazy">
										</div>
									</div>
								</div>
							</a>
							<a href="<?php echo $link_poll ?>">
								<div class = "text-center">
									<div class="js-tilt" data-tilt>
										<div class="container px-5">
											<img src="https://www.voxco.com/wp-content/uploads/2021/10/How-are-polls-conducted1.jpg" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="400" loading="lazy">
										</div>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
	
    
    <?php
    require("src/inc/index_footer.inc.php");
?>