<title>Visitor's Log System | Login</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-4 col-md-6 col-sm-8 col-12 bg-light card bg-white m-5">
              <div class="card-header text-center justify-content-center d-flex ">
                <div class="col-5 p-2">
                  <!-- <a href="login.php" class="h1"><b>Login</b></a> -->
                  <a href="login.php" class="h3">
                    <img src="images/systemlogo.png" alt="logo" class="img-fluid shadow-sm img-circle">
                  </a>
                </div>
              </div>
            <div class="card-body  bg-white">
              <p class="login-box-msg">Sign in to start your session</p>
              <form action="processes.php" method="post" id="quickForm">
                <div class="input-group">
                  <input type="email" class="form-control" placeholder="Enter your email" name="email" id="email"  onkeydown="validation()" onkeyup="validation()" >
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <!-- FOR INVALID EMAIL -->
                <div class="input-group mt-1 mb-2">
                  <small id="text" style="font-style: italic;"></small>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Enter your password" id="password" name="password" minlength="8" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-8">
                    <div class="icheck-primary">
                      <input type="checkbox" id="remember" id="remember" onclick="myFunction()">
                      <label for="remember">
                        Show password
                      </label>
                    </div>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn bg-gradient-primary btn-block" name="login" id="login">Sign In</button>
                  </div>
                </div>
              </form>
              <p>
                <a href="forgot-password.php">Forgot password?</a>
               <!--  <br>
                No account? <a href="register.php" class="text-center">Register here!</a> -->
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include 'footer.php'; ?>
