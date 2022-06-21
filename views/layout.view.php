<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= ucwords($view_bag['title']); ?></title>
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
			<a class="navbar-brand" href="#"><img src="./assets/logo.png" alt="" width="30" height="30" class="d-inline-block align-text-top"> &nbsp; <?= $view_bag['title']; ?></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
					<a class="nav-link" href="#">Home</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="#">Register</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="#">Login</a>
					</li>
					<li class="nav-item">
					<a class="nav-link disabled">About</a>
					</li>
				</ul>
			</div>
		</div>
		</nav>

    	<?php require("$name.view.php"); ?>



		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

		<footer class="pt-5 my-5 text-muted text-center border-top">
    		Created by Joshua Bisanda &middot; &copy; 2022
  		</footer>
    </body>
</html>