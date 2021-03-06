<?php 
	/**
	 * choose what menu to display based on who is logged in.
	 */
	$main_menu = [];
	if ( isset($_SESSION['account_type'])){
		$uid = $_SESSION['tracker']; // use the user id to track the user

		if ( $_SESSION['account_type'] == 'teacher' ){
			// this is the menu to be displayed to teachers
			$main_menu = [
				'<i class="bi-house"></i> home' => 'index.php',
				'<i class="bi-box"></i> creation hub' => 'create.php',
				'<i class="bi-gear"></i> students hub' => 'students.php',
				'<i class="bi-award"></i> leaderboard' => 'leaderboard.php',
				'<i class="bi-person"></i> profile' => "profile.php?uid=$uid",
				'<i class="bi-box-arrow-left"></i> logout' => '../logout.php'
			];
		} else {
			// this is the menu to be displayed to students
			$main_menu = [
				'<i class="bi-house"></i> home' => 'index.php',
				'<i class="bi-puzzle"></i> challenges' => 'challenges.php',
				'<i class="bi-blockquote-left"></i> forum' => 'forum.php',
				'<i class="bi-award"></i> leaderboard' => 'leaderboard.php',
				'<i class="bi-person"></i> profile' => "profile.php?uid=$uid",
				'<i class="bi-box-arrow-left"></i> logout' => '../logout.php'
			];
		}
	} else {
		// this is the menu to be displayed to non-registered users
		$main_menu = [
			'<i class="bi-house"></i> home' => 'index.php',
			'<i class="bi-pencil-square"></i> register' => 'register.php',
			'<i class="bi-box-arrow-in-right"></i> login' => 'login.php'
		];
	}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= ucwords($data_set['title']); ?></title>
	<link rel="icon" type="image/x-icon" href="<?= URL_ROOT;?>/assets/logo.png">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<style>
		body {
			padding-top: 4.5rem;
		}
	</style>
  </head>

  <body>

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php"><img src="<?= URL_ROOT;?>/assets/logo.png" alt="" width="30" height="30" class="d-inline-block align-text-top"> &nbsp; <?= $data_set['title']; ?></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
				<ul class="navbar-nav">
					<?php foreach( $main_menu as $menu_item => $link ): ?>
						<li class="nav-item">
							<a class="nav-link" href="<?= $link;?>"><?= ucwords($menu_item);?></a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		</nav>

		<?php
		/** 
		 * This is where the rendering of files happens.*/ 
		?>
    	<?php require("$page_name.render.php"); ?>



		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

		<footer class="pt-5 my-5 text-muted text-center border-top">
    		Created by Joshua Bisanda &middot; &copy; 2022 <br>
			<a href="https://storyset.com" class="text-decoration-none">All illustrations by Storyset</a>
  		</footer>
    </body>
</html>