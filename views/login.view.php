<main class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5"><?= $view_bag['heading']?></h1>
    </div>
  </div>
  <div class="row">
    <form action="" method="POST" class="col-sm-5 mx-auto">
      <div class="form-group mb-3">
        <label for="email">Email:</label>
        <input class="form-control" type="text" name="email" id="email" autofocus/>
      </div>
      <div class="form-group mb-3">
        <label for="password">Password:</label>
        <input class="form-control" type="password" name="password" id="password" />
      </div>
      <div class="from-group mb-3 justify-content-md-end">
        <input type="submit" name="login" value="Login" class="btn btn-outline-primary" />
      </div>
    </form>
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