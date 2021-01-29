<?php 

include "./templates/header.php";
include "post-process.php";

// if (isset($_COOKIE["email"]) && isset($_COOKIE["password"])) {
//     $email = $_COOKIE["email"];
//     $password = $_COOKIE["password"];

//     echo " <script> 
//     alert($email)
//         document.getElementById('email').value = '$email';
//         document.getElementById('password').value = '$password';
//     </script> ";
// }

?>

    <div class="container1 container">

        <h2 style="margin: 50px 0 20px 0;">Login Here</h2>

        <!-- Login Modal -->
        
        <form action="" method="POST" class="row g-3"> 
            <div class="col-md-12">
                <label class="form-label">Email address</label>
                <input name="email" id="email" type="email" class="form-control" value="">
            </div>
            <div class="col-md-12">
                <label class="form-label">Password</label>
                <input name="password" id="password" type="password" class="form-control" value="">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" value="">
                <label class="form-check-label">Remember me</label>
            </div>
            <div class="form-group lead">
                <label>I am a :</label>
                <input type="radio" class="custom-radio" name="role" value="author" required>&nbsp;Author
                <input type="radio" class="custom-radio" name="role" value="admin" required>&nbsp;Admin
            </div>
            <input type="hidden" name="login" value="true">
            <button name="submit" type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

<?php
include "./templates/footer.php";
?>
            
