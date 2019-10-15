<?php 

$errors = [];
$user_id="";

$db = mysqli_connect('localhost', 'root' ,'', 'multi_login');

if(isset($_POST['login_user'])){
    $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(empty($user_id)) array_push($errors, "Username is required");
    if(empty($password)) array_push($errors, "Password is required");

    if(count($errors) == 0){
        $password = base64_encode($password);
        $sql = "SELECT * FROM users 
        WHERE username='$user_id' OR email='$user_id' AND password='$password'";
        $results = mysqli_query($db, $sql);

        if(mysqli_num_rows($results) == 1){
            $_SESSION['username'] == $user_id;
            $_SESSION['success'] = "You are now logged in";
            header('location: ../index.php');
        }else{
            array_push($errors, "Wrong credentials");
        }
    }
}


//email

if(isset($_POST['reset-password'])){
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $query = "SELECT email FROM users WHERE email='$email'";
    $results = mysqli_query($db, $query);

    if(empty($email)){
        array_push($errors, "Email is required");
    }else if(mysqli_num_rows($results) <= 0){
        array_push($errors, "No users exist with this email/username");
    }

    $token = bin2hex(random_bytes(50));

    if(count($errors) == 0){
        $sql = "INSERT INTO password_resets(email, token) VALUES ('$email', '$token')";
        $results = mysqli_query($db, $sql);

        $to = $email;
        $subject = "Reset your password on GFHLAAAA";
        $msg = "Click on this <a href=\"new_password.php?token=" .$token. "\">link</a> to reset your password";
        $msg = wordwrap($msg,70);
        $headers = "From: Naiko";
        mail($to, $subject, $msg, $headers);
        header('location: pending.php?email=' . $email);
    }else{
        array_push($errors, "Error(s) found");
    }
}
//New password
if(isset($_POST['new_password'])){
    $new_pass = mysqli_real_escape_string($db, $_POST['new_pass']);
    $new_pass_c = mysqli_real_escape_string($db, $_POST['new_pass_c']);

    $token = $_SESSION['token'];
    if(empty($new_pass) || empty($new_pass_c)) array_push ($errors, "Password is required");
    if($new_pass !== $new_pass_c) array_push($errors, "Passwords don't match");
    if(count($errors) == 0){
        $sql ="SELECT email FROM password_resets WHERE token='$token' LIMIT 1";
        $results = mysqli_query($db, $sql);
        $email = mysqli_fetch_assoc($results)['email'];

        if($email) {
            $new_pass = base64_encode($new_pass);
            $sql = "UPDATE users SET password='$new_pass' WHERE email='$email'";
            $results = mysqli_query($db, $sql);
            header('location: index.php');
        }else{
            array_push($errors, "An error has occurred");
        }
    }else{
        array_push($errors, "An error has occurred");
    }
}
?>