<?php 
session_start();
$_SESSION['LAST_ACTIVITY'] = time();

$db = mysqli_connect('localhost','root','','multi_login');

$username = "";
$email = "";
$errors = array();
$msg = "";
$msg_class = "";



if(isset($_POST['register_btn'])){
    register();
}

function register(){
    global $db, $errors, $username;

    $username = e($_POST['username']);
    $email = e($_POST['email']);
    $password_1 = e($_POST['password_1']);
    $password_2 = e($_POST['password_2']);

    if(empty($username)) {
        array_push($errors, "Username is required");
    }
    if(empty($email)){
        array_push($errors, "Email is required");
    }
    if(empty($password_1)){
        array_push($errors, "Password is required");
    }
    if($password_1 != $password_2){
        array_push($errors, "Given passwords don't match");
    }

    $user_check_query ="SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if($user){
        if($user['username'] === $username){
            array_push($errors, "Username is already taken");
        }
        if($user['email'] === $email){
            array_push($errors, "User has already been registered with this email");
        }
    }

    if (count($errors) == 0) {
        $password = base64_encode($password_1); //Encrypt password before saving

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO users (username, user_type, password, email) 
					  VALUES('$username', '$user_type', '$password', '$email')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: home.php');
		}else{
			$query = "INSERT INTO users (username, user_type, password, email) 
					  VALUES('$username', 'user', '$password', '$email')";
			mysqli_query($db, $query);

			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); 
            $_SESSION['success']  = "You are now logged in";
			header('location: profile.php');				
		}
	}
}

function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;
	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}

function isLoggedIn() {
    if(isset($_SESSION['user'])){
        return true;
    }else{
        return false;
    }
}

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['user']);
    header("location: index.php");
}

//call login() if register button is clicked
if(isset($_POST['login_btn'])){
    login();
}

//user login
function login(){
    global $db, $username, $errors;

    
    $username = e($_POST['username']);
    $password = e($_POST['password']);

    if(empty($username)){
        array_push($errors, "Username is required");
    }
    if(empty($password)) {
        array_push($errors, "Password is required");
    }

    if(count($errors) == 0){
        $password = base64_encode($password);

        $query = "SELECT * FROM users WHERE username='$username' AND password = '$password' LIMIT 1";
        $results = mysqli_query($db, $query);

        if(mysqli_num_rows($results) == 1){ //Check if logged is user or admin
            $logged_in_user = mysqli_fetch_assoc($results);
            if($logged_in_user['user_type'] == 'admin'){

                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success'] = "You have been logged in";
                header('location: admin/home.php');
            }else{
                $_SESSION['user'] =  $logged_in_user;
                $_SESSION['success'] = "You are now logged in";
                header('location: profile.php');
            }
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

function isAdmin(){
    if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ){
        return true;
    }else{
        return false;
    }
}

if(isset($_POST['update_btn'])){
    update();
}





//updates database information
if(isset($_POST['save_profile'])){
    global $db;

    $id = $_SESSION['user']['id'];

    $user = $_POST['username'];
    $info = mysqli_real_escape_string($db, $_POST['bio']);
    $profileImageName = time() . '-' . $_FILES['profileImage']['name'];

    $target_dir = "images/";
    $target_file = $target_dir . basename($profileImageName);

    if($_FILES['profileImage']['size'] > 200000) {
        $msg = "Image size shouldn't be greater than 200Kb";
        $msg_class = "alert-danger";
    }

    if(file_exists($target_file)){
        $msg = "File already exists";
        $msg_class = "alert-danger";
    }

    if(empty($error)){
        if(!$profileImageName){
            $profileImageName = $_SESSION['user']['profile_image'];
        }
        if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)){
            $sql = "UPDATE users SET profile_image='$profileImageName', username='$user' , info='$info' WHERE id = '$id'";
            if(mysqli_query($db, $sql)){
                $msg = "New information uploaded and saved in the Database";
                $msg_class = "alert-success";
                $_SESSION['user']['profile_image'] = $profileImageName;
                $_SESSION['user']['username'] = $user;
                header('location: profile.php');
            } else {
                $msg = "There was an error in the database";
                $msg_class = "alert-danger";
            }
        }else{
            $msg = "There was an error while uploading the file";
            $msg_class = "alert-danger";
        }
    }
}



?>