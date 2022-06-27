<main class="container">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="mt-3"><?= $view_bag['heading']?></h1>
      <p class="lead">Kindly enter your details below to login.</p>
    </div>
  </div>
  <div class="row container">
    <div class="col">
      <img src="<?= URL_ROOT;?>/assets/login.gif" alt="login image" class="img-fluid">
    </div>
    <div class="col-lg-9 text-start">
      <form action="" method="POST" class="col-md-7 text-start">
        <div class="form-group mb-3">
          <input class="form-control" type="text" placeholder="Your Email Address" name="email" id="email"/>
        </div>
        <div class="form-group mb-3">
          <input class="form-control" type="password" placeholder="Your Password" name="password" id="password" />
        </div>
        <div class="from-group mb-3 justify-content-md-end">
          <input type="submit" name="login" value="Login" class="btn btn-outline-primary" />
        </div>
      </form>
    </div>
  </div>
  <?php
    // display login error messages here. 
    if (!empty($view_bag['status'])) {
      echo '<div class="container col-sm-5 mx-auto alert alert-danger" role="alert">';
      echo $view_bag['status'];
      echo '</div>';
    }
  ?>
</main>