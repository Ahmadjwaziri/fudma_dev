<?php


include 'config/connection.php';

$rider = "1";
$firebase_api_rider = "AAAANwp-pDk:APA91bHZnirjgX_16vSzP5SzXFg1DrdjHZKh2AzVnws0IvTVP7OGjh8u_NqjcY1TJdChQJB95rG31gtIhplfZ2RhnjLqvA98V-P-C1oroKwNcIXyleWR24yQO_X_nK9TtQV01wlWjc8P";


// 	$query2 = $dBASE->query("SELECT * FROM drivers where id='$rider'");
// 	$row2 = $query2->fetch_array();
	
	// Send Firebase Notification
			require_once __DIR__ . '/notification/notification.php';
						$notification = new Notification();
						$title = "New Order Assign to You";
						$message = "aiigned";
						// $imageUrl = isset($_POST['image_url'])?$_POST['image_url']:'';
						$action = "activity";
						$actionDestination = "MainActivity";
	
						if($actionDestination ==''){
							$action = '';
						}
						$notification->setTitle($title);
						$notification->setMessage($message);
						$notification->setImage($imageUrl);
						$notification->setAction($action);
						$notification->setActionDestination($actionDestination);
						$firebase_token = $token;
				// 		$topic = "orders";
						$requestData = $notification->getNotificatin();
						
						// if($_POST['send_to']=='topic'){
				// 			$fields = array(
				// 				'to' => '/topics/' . $topic,
				// 				'data' => $requestData,
				// 			);
							
							$fields = array(
								'to' => $row2['token'],
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
							'Authorization: key=' . $firebase_api_rider,
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
				
				
				?>