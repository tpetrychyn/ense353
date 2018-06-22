<?php include('header.php'); ?>

<?php
  if (!isset($_SESSION['user'])) {
    echo '<div class="row">
      <div class="col-12 text-center card-group justify-content-center">
          <div class="card col-4">
            <div class="card-body">
              <h5 class="card-title">New Users</h5>
              <p class="card-text">Signup for Taylor\'s awesome subscription service.</p>
              <a href="/signup.php" class="btn btn-primary">Signup</a>
            </div>
          </div>
          <div class="card col-4">
            <div class="card-body">
              <h5 class="card-title">Returning Users</h5>
              <p class="card-text">Existing users click here to login.</p>
              <a href="/login.php" class="btn btn-primary">Login</a>
            </div>
          </div>
        </div>
      </div>
    </div>';
  } else {
    include('user_dash.php');
  }
?>


<?php include('footer.php'); ?>








