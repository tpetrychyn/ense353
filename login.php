<?php include('header.php'); ?>

<div class="row align-items-center justify-content-center">
    <div class="col-lg-6 col-12">
        <h2>Login</h2>
        <form action="login_a.php" method="POST">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <input type="submit" value="Submit" name="login" class="btn btn-primary"></input>
        </form>
    </div>
</div>

<?php include('footer.php'); ?>
