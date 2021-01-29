<?php
include "./includes/autoload.php";
include "./templates/header.php";

$users = new Users();

if (!isset($_SESSION["user_login"]) || $_SESSION["user_login"] != true || $_SESSION["role"] != "admin") {
    header("Location: login.php");
}

?>

    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1 class="text-center">Hello <?php echo $_SESSION["email"]; ?></h1>
    </div>

    <div class="container" style="margin-top: 50px;">
        <h2>View Records</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Confirm Password</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if ($users->viewUser()) {
                        foreach ($users->viewUser() as $user) {
                ?>
                    <tr>
                        <td><?php echo $user["id"] ?></td>
                        <td><?php echo $user["username"] ?></td>
                        <td><?php echo $user["email"] ?></td>
                        <td><?php echo $user["password"] ?></td>
                        <td><?php echo $user["cpassword"] ?></td>
                        <td><?php echo $user["role"] ?></td>
                    </tr>
                <?php
                    }}
                ?>
            </tbody>
        </table>
    </div>

<?php
include "./templates/footer.php";
?>