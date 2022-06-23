<main class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5"><?= $view_bag['heading']?></h1>
    </div>
  </div>
  <div class="row">
    <form action="register.php" method="POST" class="col-lg-7 mx-auto">
        <div class="row form-group mb-3">
            <div class="col">
                <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="firstname" autofocus>
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="lastname">
            </div>
        </div>
        <div class="form-group mb-3">
            <textarea class="form-control" cols="30" rows="5" name="bio" placeholder="Tell us a little about yourself..."></textarea>
        </div>
        <div class="row form-group mb-3">
            <div class="col">
                <input type="text" class="form-control" placeholder="Email Address" aria-label="Email Address" name="email">
            </div>
            <div class="col">
                <select class="form-select" aria-label="school or college" name="school">
                    <option selected>Your School or Institution</option>
                    <option value="Open University Tanzania">The Open University of Tanzania</option>
                    <option value="Triumphant College">Triumphant College</option>
                    <option value="ZCAS University">ZCAS University</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>
        <div class="row form-group mb-3">
            <div class="col">
                <input type="password" class="form-control" placeholder="Password" aria-label="Password" name="password">
            </div>
            <div class="col">
                <select class="form-select" aria-label="country" name="country">
                    <option selected>Your Country</option>
                    <option value="Tanzania">Tanzania</option>
                    <option value="Namibia">Namibia</option>
                    <option value="Zambia">Zambia</option>
                </select>
            </div>
        </div>
      <div class="from-group mb-3 justify-content-md-end">
        <input type="submit" name="register" value="Complete Registration" class="btn btn-outline-primary" />
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