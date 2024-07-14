<?php
include 'config/connection.php';
// include 'config/paystack_config.php';
$firebase_api = "AAAA2duc7ig:APA91bFxglXkl_YjrO0wlUbGVwkExI1LOacVBMUUNuwLVAlcVFuUTM_2TAKyQEcFC95U9H_kumR16bvp1eWGMkIGo0BRngXI3bWxCcTVIrlCBNYfhVqOXE7gsDvHyYTMXf-xqMcA_6Sy";

session_start();
extract($_GET);
extract($_SESSION);
extract($_POST);
if (isset($_POST['addmit'])) {
	$todate = date("D/M/Y");
	$query = $dBASE->query("UPDATE applicant_admission set status='ADMITTED' where app_id='$appid'");
	
	$query2 = $dBASE->query("SELECT * FROM applicant_info where app_id='$appid'");
	
	$row = $query2->fetch_array();
	
	        

        $username = "paymable";
        $password = "samiu987";
    
        $firstname = $row['firstname'];
        $lastname = $row['surname'];
        $middlename = $row['middlename'];
        $course = $row['course'];
    

        //Multiple mobiles numbers separated by comma
        $mobileNumber = $row['phone'];
        $message = "Hello $firstname $middleame $surname, you have been addmitted into JSIIT to study $course";

        //Your message to send, Add URL encoding here.
        $message = urlencode($message);
        $appi = "https://smslight.com.ng/api/sms/dnd-route?username=$username&password=$password&sender=@@sender@@&recipient=@@recipient@@&message=@@message@@";
        $appi = str_replace("@@sender@@","JSIIT",$appi);
        $appi = str_replace("@@recipient@@",$mobileNumber,$appi);
        $appi = str_replace("@@message@@",$message,$appi);
        file_get_contents($appi);


$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Applicant Admitted Successfully</strong></div>";


	header("Location: Applicants");
	// echo '<script>location = "applicants";</script>';

}




if(isset($_GET['change_pass'])){
    $pass = md5("123456");
    $query = $dBASE->query("UPDATE students set password='$pass' where studentid='$change_pass'");
$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Password Updated Successfully</strong></div>";
header("Location: Students");
}

if (isset($_POST['revoke'])) {
$query = $dBASE->query("UPDATE applicant_admission set status='UNSUBMITTED' where app_id='$appid'");
$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Admission Revoke Successfully</strong></div>";

header("Location: Applicants");
	// echo '<script>location = "applicants";</script>';


}


if(isset($_GET['unsubmit'])){
    $query = $dBASE->query("UPDATE applicants SET app_status='UN' WHERE appid='$unsubmit'");
    
    $_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Subsmssion Revoke Successfully</strong></div>";

header("Location: Applicants");
}

if (isset($_POST['delete_room'])) {
		$query2 = $dBASE->query("DELETE FROM hostel_room where room='$room'");
	$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Room Deleted Successfully</strong></div>";
header("Location: Blocks");

}

if (isset($_POST['delete_block'])) {
		$query2 = $dBASE->query("DELETE FROM hostel_block where block='$block'");
	$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Block Deleted Successfully</strong></div>";
header("Location: Blocks");

}

if (isset($_POST['delete_course'])) {
		$query2 = $dBASE->query("DELETE FROM courses where coursecode='$coursecode'");
	$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Course Deleted Successfully</strong></div>";
header("Location: Courses");

}

if (isset($_POST['delete_staff_role'])) {
		$query2 = $dBASE->query("DELETE FROM staff_class_role where staff_id='$staffid'");
	$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Staff Role Deleted Successfully</strong></div>";
header("Location: ManageStaffClass?staffid=$staffid");

}

if (isset($_POST['delete_payment'])) {
	$query2 = $dBASE->query("DELETE FROM payment_schedule where id='$id'");
$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Staff Deleted Successfully</strong></div>";
header("Location: PaymentShedule");
}


if (isset($_POST['delete_library_user'])) {
	$query2 = $dBASE->query("DELETE FROM library_login where regno='$regno'");
$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: User Deleted Successfully</strong></div>";
header("Location: LibraryUsers");
}

if (isset($_POST['delete_library_credential'])) {
	$query2 = $dBASE->query("DELETE FROM library_credentials where username='$username'") or die($dBASE->error);
$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Credential Deleted Successfully</strong></div>";
header("Location: LibraryCredentials");
}

if (isset($_POST['revoke_hostel'])) {
	$query2 = $dBASE->query("DELETE FROM hostel_applicant where student_id='$studentid'");
$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Applicant Revoked Successfully</strong></div>";
header("Location: HostelApplicants");

}


if (isset($_POST['add_staff'])) {
	$pass = md5($password);
			$query2 = $dBASE->query("INSERT INTO staff (staffid, fullname, password, role) VALUES ('$staffid','$fullname','$pass','$role')");
	$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Staff Added Successfully</strong></div>";
header("Location: Staffs");

}

if (isset($_POST['add_staff_role'])) {
			$query2 = $dBASE->query("INSERT INTO staff_class_role (staff_id, program, level, ccode) VALUES ('$staffid','$program','$level','$ccode')");
	$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Staff Role Added Successfully</strong></div>";
header("Location: ManageStaffClass?staffid=$staffid");

}

if (isset($_POST['add_student'])) {
	$pass = md5("123456");
			$query2 = $dBASE->query("INSERT INTO students (studentid, firstname, surname, porgram, course, level, password='$pass') VALUES ('$studentid', '$firstname', '$surname', '$porgram', '$course', '$level')");
	$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Student Added Successfully</strong></div>";
header("Location: Student");

}

if (isset($_POST['add_room'])) {
			$query2 = $dBASE->query("INSERT INTO hostel_room (room, block, remain) VALUES ('$room','$block','$remain')");
	$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Block Room Added Successfully</strong></div>";
header("Location: Blocks");

}

if (isset($_POST['add_course'])) {
			$query2 = $dBASE->query("INSERT INTO courses (coursetitle, coursecode, units, level, semester) VALUES ('$coursetitle','$coursecode','$units','$level','$semester')");
	$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Course Added Successfully</strong></div>";
header("Location: Courses");

}

if (isset($_POST['approve_allocate'])) {
			$query2 = $dBASE->query("UPDATE hostel_applicant SET block='$to' where student_id='$studentid'");
			$query2 = $dBASE->query("DELETE FROM hostel_allocate where student_id='$studentid'");
	$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Block Allocated Successfully</strong></div>";
header("Location: HostelAllocate");

}


if (isset($_POST['add_payment_schedule'])) {
	$query2 = $dBASE->query("INSERT INTO payment_schedule (paymentname, amount, level, semester, program) VALUES ('$paymentname', '$amount', '$level', '$semester', '$program')");
$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Course Added Successfully</strong></div>";
header("Location: PaymentSchedule");

}


if (isset($_POST['add_library_user'])) {
	$query = $dBASE->query("SELECT * FROM library_login where student_id='$studentid'");
	if ($query->num_rows > 0) {
		$_SESSION['response'] =  "<div class='alert alert-danger wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Error: User Already Added</strong></div>";
header("Location: LibraryUsers");
	}else{
	$query2 = $dBASE->query("INSERT INTO library_login (regno, student_id) VALUES ('$regno', '$studentid')");
$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: User Added Successfully</strong></div>";
header("Location: LibraryUsers");
}
}


if (isset($_POST['add_library_credential'])) {
	$query2 = $dBASE->query("INSERT INTO library_credentials (username, password) VALUES ('$username', '$password')");
$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Credentials Added Successfully</strong></div>";
header("Location: LibraryCredentials");

}




if (isset($_POST['update_announcement'])) {
		$today = date("Y/m/d");
		$query = $dBASE->query("UPDATE notice SET content='$content', ondate='$today'");
		
		// Send Firebase Notification
			require_once __DIR__ . '/notify/notification.php';
						$notification = new Notification();
						$title = "Announcement";
						$message = $content;
						// $imageUrl = isset($_POST['image_url'])?$_POST['image_url']:'';
						$action = "activity";
						$actionDestination = "Dashboard";
	
						if($actionDestination ==''){
							$action = '';
						}
						$notification->setTitle($title);
						$notification->setMessage($message);
						$notification->setImage($imageUrl);
						$notification->setAction($action);
						$notification->setActionDestination($actionDestination);
						$firebase_token = $token;
						$topic = "announcement";
						$requestData = $notification->getNotificatin();
						
						// if($_POST['send_to']=='topic'){
							$fields = array(
								'to' => '/topics/' . $topic,
								'data' => $requestData,
							);
							
						// }else{
							
						// 	$fields = array(
						// 		'to' => $firebase_token,
						// 		'data' => $requestData,
						// 	);
						// }
						// Set POST variables
						$url = 'https://fcm.googleapis.com/fcm/send';
						$headers = array(
							'Authorization: key=' . $firebase_api,
							'Content-Type: application/json'
						);
						
						// Open connection
						$ch = curl_init();
 
						// Set the url, number of POST vars, POST data
						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						// Disabling SSL Certificate support temporarily
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
						// Execute post
						$result = curl_exec($ch);
						if($result === FALSE){
							die('Curl failed: ' . curl_error($ch));
						}
 
						// Close connection
						curl_close($ch);
						echo '<h2>Result</h2><hr/><h3>Request </h3><p><pre>';
						echo json_encode($fields,JSON_PRETTY_PRINT);
						echo '</pre></p><h3>Response </h3><p><pre>';
						echo $result;
						echo '</pre></p>';
		
		
	   $_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Notice Updated Successfully</strong></div>";
	   
header("Location: Announcement");
}


if (isset($_POST['approve_payment_student'])) {
		$query = $dBASE->query("UPDATE students SET payment_status='PAID' where studentid='$studentid'");
		$query3 = $dBASE->query("UPDATE student_manual_payment SET status='PAID' where student_id='$studentid' And teller_no='$tellerno'");
	$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Payment Approved Successfully</strong></div>";
header("Location: ManualPaymentStudent");
}


if (isset($_POST['reject_payment_student'])) {
				$query3 = $dBASE->query("DELETE FROM student_manual_payment where student_id='$studentid' And teller_no='$tellerno'") or die($dBASE->error);
	$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Payment Rejected Successfully</strong></div>";
header("Location: ManualPaymentApplicant");
}


if (isset($_POST['approve_payment_applicant'])) {
		$query = $dBASE->query("UPDATE applicants SET payment_status='PAID' where appid='$appid'")or die($dBASE->error);
				$query3 = $dBASE->query("UPDATE rrr_app SET status='PAID' where app_id='$appid'") or die($dBASE->error);
	$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Payment Approved Successfully</strong></div>";
header("Location: PaymentHistory");
}



if (isset($_POST['reject_payment_applicant'])) {
				$query3 = $dBASE->query("DELETE FROM rrr_app where app_id='$appid'") or die($dBASE->error);
	$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Payment Rejected Successfully</strong></div>";
header("Location: ManualPaymentApplicant");
}


// Assesments
if (isset($_POST['add_new_assesment'])) {
	$_SESSION['ccode']=$ccode;
	$_SESSION['level']=$level;

	header("Location: AddAssesment");

}


if (isset($_POST['view_assesment'])) {
	$_SESSION['ccode']=$ccode;
	$_SESSION['level']=$level;

	header("Location: AssesmentList");
}


// Modules

if (isset($_POST['add_new_module'])) {
	$_SESSION['semester']=$semester;
	$_SESSION['level']=$level;

	header("Location: AddModule");

}


if (isset($_POST['view_modules'])) {
	$_SESSION['semester']=$semester;
	$_SESSION['level']=$level;

	header("Location: ModuleList");
}


if(isset($_POST['click_student'])){
						require_once __DIR__ . '/notify/notification.php';
						$notification = new Notification();
						$title = "Student Clicked";
						$message = "Welcome Clicked";
						// $imageUrl = isset($_POST['image_url'])?$_POST['image_url']:'';
						$action = "activity";
						$actionDestination = "Welcome";
	
						if($actionDestination ==''){
							$action = '';
						}
						$notification->setTitle($title);
						$notification->setMessage($message);
						$notification->setImage($imageUrl);
						$notification->setAction($action);
						$notification->setActionDestination($actionDestination);
						$firebase_token = $token;
						$topic = "login";
						$requestData = $notification->getNotificatin();
						
						// if($_POST['send_to']=='topic'){
						// 	$fields = array(
						// 		'to' => '/topics/' . $topic,
						// 		'data' => $requestData,
						// 	);
							
						// }else{
							
							$fields = array(
								'to' => $firebase_token,
								'data' => $requestData,
							);
						// }
						// Set POST variables
						$url = 'https://fcm.googleapis.com/fcm/send';
						$headers = array(
							'Authorization: key=' . $firebase_api,
							'Content-Type: application/json'
						);
						
						// Open connection
						$ch = curl_init();
 
						// Set the url, number of POST vars, POST data
						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						// Disabling SSL Certificate support temporarily
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
						// Execute post
						$result = curl_exec($ch);
						if($result === FALSE){
							die('Curl failed: ' . curl_error($ch));
						}
 
						// Close connection
						curl_close($ch);
						echo '<h2>Result</h2><hr/><h3>Request </h3><p><pre>';
						echo json_encode($fields,JSON_PRETTY_PRINT);
						echo '</pre></p><h3>Response </h3><p><pre>';
						echo $result;
						echo '</pre></p>';
}


if(isset($_POST['approve_hostel_allocate'])){
             $s_query = $dBASE->query("SELECT * FROM students where studentid='$studentid'");
             $s_row = $s_query->fetch_assoc();

						require_once __DIR__ . '/notify/notification.php';
						$notification = new Notification();
						$title = "Hostel Allocate Approved Successfully";
						$message = "Hi, your hostel allocate application has been successfully approved.";
						// $imageUrl = isset($_POST['image_url'])?$_POST['image_url']:'';
						$action = "activity";
						$actionDestination = "HostelActivity";
	
						if($actionDestination ==''){
							$action = '';
						}
						$notification->setTitle($title);
						$notification->setMessage($message);
						$notification->setImage($imageUrl);
						$notification->setAction($action);
						$notification->setActionDestination($actionDestination);
						$firebase_token = $s_row['token'];
						$requestData = $notification->getNotificatin();
		
							$fields = array(
								'to' => $firebase_token,
								'data' => $requestData,
							);
						// }
						// Set POST variables
						$url = 'https://fcm.googleapis.com/fcm/send';
						$headers = array(
							'Authorization: key=' . $firebase_api,
							'Content-Type: application/json'
						);
						
						// Open connection
						$ch = curl_init();
 
						// Set the url, number of POST vars, POST data
						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						// Disabling SSL Certificate support temporarily
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
						// Execute post
						$result = curl_exec($ch);
						if($result === FALSE){
							die('Curl failed: ' . curl_error($ch));
						}
 
						// Close connection
						curl_close($ch);
						echo '<h2>Result</h2><hr/><h3>Request </h3><p><pre>';
						echo json_encode($fields,JSON_PRETTY_PRINT);
						echo '</pre></p><h3>Response </h3><p><pre>';
						echo $result;
						echo '</pre></p>';
						
						header("Location: HostelAllocate");
}




if (isset($_POST['change_password'])) {
    $old = md5($oldpassword);
    $new = md5($newpassword);
    $query1 = $dBASE->query("SELECT password,staffid FROM staff WHERE staffid='$staffid' And password='$old'");

    if (!$query1->num_rows > 0) {
       $_SESSION['response'] =  "<div class='alert alert-danger wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Error: </strong>Old Password Is Incorrect</div>";
                header('location: settings');
    }else{
    $query = $dBASE->query("UPDATE staff SET password='$new' where staffid='$staffid'");

    $_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: </strong>Password Updated Successfully</div>";
                header('location:Settings');
}

}


if(isset($_GET['delete_user'])){
        $query = $dBASE->query("DELETE FROM staff where id='$delete_user'");

    $_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: </strong>Staff Deleted Successfully</div>";
                
            header('location:Users');
}


if(isset($_POST['add_user'])){
    $pass = md5($password);
        $query = $dBASE->query("INSERT INTO staff (staffid, fullname, password, role) VALUES ('$staffid', '$fullname', '$pass', '$role')");

    $_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: </strong>Staff Added Successfully</div>";
                
            header('location:Users');
}


if (isset($_POST['change-programme'])) {
		$query2 = $dBASE->query("UPDATE applicants SET program='$pprogram' where appid='$appid'") or die($dBASE->error);
	$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Programme Updated Successfully</strong></div>";
// header("Location: Applicants");

}



if (isset($_POST['create_student'])) {
	$pass = md5($password);
    $query2 = $dBASE->query("INSERT INTO students (studentid, firstname, surname, gender, dob, nationality, state, lga, email, phone, program, course, department, matricyear, level, password,app_id) VALUES ('$matricno', '$firstname', '$surname', '$gender', '$dob', '$nationality', '$state', '$lga', '$email', '$phone', '$pprogram', '$ccourse', 'Computer Science', '$matricyear', '$level', '$pass','$appid')");
	$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Student Created Successfully</strong></div>";
header("Location: AdmittedApplicants");

}



if (isset($_GET['approve_payment'])) {
		$query2 = $dBASE->query("UPDATE applicants SET payment_status='PAID' where appid='$approve_payment'") or die($dBASE->error);
	$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Payment Approved Successfully</strong></div>";
header("Location: Applicants");

}




if (isset($_GET['approve_payment_students'])) {
		$query2 = $dBASE->query("UPDATE students SET payment_status='PAID' where studentid='$approve_payment_students'") or die($dBASE->error);
	$_SESSION['response'] =  "<div class='alert alert-success wow fadeInUp animated' data-wow-duration='500ms' data-wow-delay='900ms'><button class='close' data-dismiss='alert'>&times;</button><strong>Success: Payment Approved Successfully</strong></div>";
header("Location: Students");

}



?>
