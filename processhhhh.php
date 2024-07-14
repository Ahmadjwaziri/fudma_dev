<?php 
session_start();
extract($_SESSION);
extract($_POST);
extract($_GET);
include 'config/connection.php';


// Delete User
if (isset($_POST['delete_user'])) {
	$query = $dBASE->query("DELETE FROM users where id='$id'");
	$_SESSION['response'] = '
            <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        User Deleted Successfully
    </div>'; 
		header("Location: Users");
}


// Add Rider to specific order
if (isset($_POST['add_rider'])) {
	$query = $dBASE->query("UPDATE orders SET rider='$rider', order_status='PROCESSING' where id='$id'");
	$_SESSION['response'] = '
            <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Rider Assigning to the Order
    </div>'; 
// 		header("Location: Orders");

}

// Delete Driver
if (isset($_POST['delete_user'])) {
	$query = $dBASE->query("DELETE FROM drivers where id='$id'");
	$_SESSION['response'] = '
            <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Driver Deleted Successfully
    </div>'; 
		header("Location: Drivers");
}

// Add New Driver
if (isset($_POST['add-driver'])) {
	$pass = md5($password);
	$query = $dBASE->query("INSERT INTO drivers (fullname, phone, email, password) VALUES ('$fullname', '$phone', '$email', '$pass')") or die($dBASE->error);
	$_SESSION['response'] = '
            <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Driver Added Successfully
    </div>'; 
		header("Location: Drivers");
}


// Add New Restaurant
if (isset($_POST['add_restaurant'])) {
    $target_path = "../images/";  
$target_path = $target_path.basename( $_FILES['fileToUpload']['name']); 
$file = $_FILES['fileToUpload']['name'];  
	$pass = md5($password);
	$query = $dBASE->query("INSERT INTO restaurant (restaurant_name, restaurant_address, phone, email, image) VALUES ('$restaurant_name', '$restaurant_address', '$phone', '$email', 'https://ebulk.com.ng/namu/images/$file')") or die($dBASE->error);
	$_SESSION['response'] = '
            <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Restaurant Added Successfully
    </div>'; 
		header("Location: Restaurants");
}

// Delete Restaurant
if (isset($_GET['delete_restaurant'])) {
		$query = $dBASE->query("DELETE FROM restaurant where rid='$delete_restaurant'");
	$_SESSION['response'] = '
            <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Restaurant Deleted Successfully
    </div>'; 
		header("Location: Restaurants");
}


// Add New Food
if (isset($_POST['add-food'])) {
$today = date("Y-m-d");
$target_path = "../images/";  
$target_path = $target_path.basename( $_FILES['fileToUpload']['name']); 
$file = $_FILES['fileToUpload']['name'];  
  
if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path)) {  
   $query = $dBASE->query("INSERT INTO foods (title,description,price,restaurant,image) VALUES ('$title','$description','$price','$restaurant', 'https://ebulk.com.ng/namu/images/$file')") or die($dBASE->error);
		// $_SESSION['response'] = "Uploaded Successfully"; 
   $_SESSION['response'] = '
            <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Food Uploaded Successfully
    </div>'; 
		header("Location: Foods");
} else{  
    echo "Sorry, file not uploaded, please try again!";  
}  
}

// Delete Food
if (isset($_GET['delete_food'])) {
		$query = $dBASE->query("DELETE FROM foods where id='$delete_food'");
	$_SESSION['response'] = '
            <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Food Deleted Successfully
    </div>'; 
		header("Location: Foods");
}

// Update Settings
if (isset($_POST['update-setting'])) {
    $query = $dBASE->query("UPDATE settings SET delivery_charge='$delivery_charge', service_tax='$service_tax', app_name='$app_name' where id='1'");
    $_SESSION['response'] = '
            <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Settings Updated Successfully
    </div>'; 
        header("Location: general-setting");
}
?>