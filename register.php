<?php 

include "./templates/header.php";
include "post-process.php";

?>

    <div class="container1 container">

        <h2 style="margin: 50px 0 20px 0;">Register Here</h2>

        <!-- Register Modal -->
        
        <form action="register.php" method="POST" class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Username</label>
                <input name="username" type="text" class="form-control" placeholder="Choose a Username">
            </div>
            <div class="col-md-6">
                <label class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" placeholder="name@example.com">
            </div>
            <div class="col-md-6">
                <label class="form-label">Password</label>
                <input name="password" type="password" class="form-control" placeholder="Choose a Password">
            </div>
            <div class="col-md-6">
                <label class="form-label">Confirm Password</label>
                <input name="cpassword" type="password" class="form-control" placeholder="Repeat Your Password">
            </div>
            <div class="form-group lead">
                <label>I am a :</label>
                <input type="radio" class="custom-radio" name="role" value="author" required>&nbsp;Author
                <input type="radio" class="custom-radio" name="role" value="admin" required>&nbsp;Admin
            </div>
            <button name="register" type="submit" class="btn btn-primary">Register</button>
        </form>

            
    </div>


<?php
include "./templates/footer.php";
?>