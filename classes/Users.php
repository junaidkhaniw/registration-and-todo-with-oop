<?php 

include "DB.php";

    class Users extends DB {

        /// Register ///
        public function registerUser($username, $email, $password, $cpassword, $role) 
        {

            if (empty($username) && empty($email) && empty($password) && empty($cpassword)) {
                echo "Please enter something";
            }
            else if (empty($username)) {
                echo "Please enter username";
            }
            else if (empty($email)) {
                echo "Please enter email";
            }
            else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "Please enter a valid email address";
            }
            else if (empty($password)) {
                echo "Please enter password";
            }
            else if (empty($cpassword)) {
                echo "Please enter confirm password";
            }
            else if (strlen($cpassword) < 6) {
                echo "Password must be atleast 6 characters";
            }
            else if ($password != $cpassword) {
                echo "Password and Confirm password should be same";
            }
            else {

                try 
                {
                    
                    $sql = "SELECT * FROM users WHERE username = ? AND email = ?";
                    $stmt = $this->connect()->prepare($sql);
                    $stmt->execute([$username, $email]);
                    if ($stmt->rowCount() > 0) {
                        echo "Sorry This username is already exists";
                    }
                    if ($password == $cpassword) { 
                        $sql = "INSERT INTO users (username, email, password, cpassword, role) VALUES (?, ?, ?, ?, ?)";
                        $stmt = $this->connect()->prepare($sql);
                        $stmt->execute([$username, $email, $password, $cpassword, $role]);

                    }
                    
                } 
                catch(PDOException $e)
                {
                    echo $e->getMessage();
                }
                
                
            }
            header("Location: login.php");

        }

        /// Login ///
        public function loginUser($email, $password, $role) 
        {
            $sql = " SELECT * FROM users WHERE email = ? AND password = ? AND role = ? ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$email, $password, $role]);
            $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                
                $_SESSION["user_login"] = true;
                $_SESSION["email"] = $email;
                $_SESSION["role"] = $role;

                if ($stmt->rowCount() == 1 && $_SESSION["role"] == "author") {
                    header("Location: welcome.php");
                }
                else if ($stmt->rowCount() == 1 && $_SESSION["role"] == "admin") {
                    header("Location: index.php");
                }
                else {
                    echo "Username or Password is Incorrect";
                }

                if (isset($_POST["remember"])) {
                    setcookie("emailcookie", $email, time() + 86400);
                    setcookie("passwordcookie", $password, time() + 86400);
                    setcookie("rolecookie", $role, time() + 86400);
                }

                echo "Successfully Login";
            }
            else {
                echo "Error";
            }

        }

        public function forgotAccount($email, $password)
        {
            # code...
        }

        /// View ///
        public function viewUser() 
        {
            $sql = " SELECT * FROM users ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            while ($result = $stmt->fetchAll()) {
                return $result;
            }
        }

    }
    

?>