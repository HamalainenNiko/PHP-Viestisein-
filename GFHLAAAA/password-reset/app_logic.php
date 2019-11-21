<?php 

include_once ('config.php');

if(isset($_GET['token'])){
    $_SESSION['token']=mysqli_real_escape_string($db,$_GET['token']);
}
//email

if(isset($_POST['reset-password'])){
    $sent = "";
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
        $subject = "Reset your password ";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $headers .= "From: N";
        $msg = "Click on this <a href=\"localhost/nikoHamalainen/random/GFHLAAAA/password-reset/new_password.php?token=" .$token. "\">link</a> to reset your password";
        $msg = wordwrap($msg,70);
        
        if($sent == 0){
            mail($to, $subject, $msg, $headers);
            $sent = 1;
            header('location: pending.php?email=' . $email);
        }
    }else{
        array_push($errors, "Error(s) found");
    }
}

//New password
if(isset($_POST['new_password'])){

    $new_pass = mysqli_real_escape_string($db, $_POST['new_pass']);
    $new_pass_c = mysqli_real_escape_string($db, $_POST['new_pass_c']);
    if(empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
    if($new_pass !== $new_pass_c) array_push($errors, "Passwords don't match");
    if(count($errors) == 0){
        $sql ="SELECT email FROM password_resets WHERE token='$token' LIMIT 1";
        $results = mysqli_query($db, $sql);
        $email = mysqli_fetch_assoc($results)['email'];

        if($email){
            $new_pass = base64_encode($new_pass);
            $sql = "UPDATE users SET password='$new_pass' WHERE email='$email'";
            $results = mysqli_query($db, $sql);

            $del = "DELETE * FROM password_resets WHERE token='$token' LIMIT 1";
            $results = mysqli_query($db, $del);
            header('location: ../index.php');

        }else{
            array_push($errors, "An error has occurred.");
        }
    }else{
        array_push($errors, "An error has occurred (sql, results, email fetch...)");
    }
}
?>