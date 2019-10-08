<?php 
session_start();
$_SESSION['LAST_ACTIVITY'] = time();

$db = mysqli_connect('localhost','root','','multi_login');

$username = "";
$errors = array();
$msg = "";
$msg_class = "";



if(isset($_POST['register_btn'])){
    register();
}

function register(){
    global $db, $errors, $username;

    $username = e($_POST['username']);
    $password_1 = e($_POST['password_1']);
    $password_2 = e($_POST['password_2']);

    if(empty($username)) {
        array_push($errors, "Username is required");
    }
    if(empty($password_1)){
        array_push($errors, "Password is required");
    }
    if($password_1 != $password_2){
        array_push($errors, "Given passwords don't match");
    }

    if (count($errors) == 0) {
        $password = base64_encode($password_1); //Encrypt password before saving

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO users (username, user_type, password) 
					  VALUES('$username', '$user_type', '$password')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: home.php');
		}else{
			$query = "INSERT INTO users (username,, user_type, password) 
					  VALUES('$username', 'user', '$password')";
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

//update function is for updating user profile info
function update(){
    global $db;
    $name = $_POST['name'];
    $desc = $_POST['info'];
    $id = $_SESSION['user']['id'];
    $query = "UPDATE users SET username = '".$name."', 
    info = '".$desc."' WHERE id = '".$id."'"; 

    $result = mysqli_query($db, $query);

    if($result){
        echo 'Data Updated';
        header('location: login.php');
    }else {
        echo 'Data not Updated';
    }
    mysqli_close($db);
    }






//new test batch of update()
if(isset($_POST['save_profile'])){

    $id = $_SESSION['user']['id'];

    $user = stripslashes($_POST['username']);
    $bio = stripslashes($_POST['bio']);
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
        if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)){
            $sql = "UPDATE users SET profile_image='$profileImageName',username= '$user' ,info= '$bio' WHERE id = '$id'";
            if(mysqli_query($db, $sql)){
                $msg = "Image uploaded and saved in the Database";
                $msg_class = "alert-success";
                $_SESSION['user']['profile_image'] = $profileImageName;
                $_SESSION['user']['username'] = $user;
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