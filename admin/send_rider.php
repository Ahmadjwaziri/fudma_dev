<?php 

// DRIVER NOTIFY



	//Here we will send specific user
 $sqll = $dBASE->query("SELECT * FROM drivers where id='$rider'");
 $tokenn = array();
    while($roww =$sqll->fetch_array())
       {
         $tokenn[]=$roww["token"]; 
        // echo $row["token"];  
  }
 
// var_dump($token);
 $titlee = "New ORDER Assign to you";
 $notificationn = "New Order has been assigned to you!";
 $msgg =
 [
    'message'   => $notificationn,
    'title'   => $titlee
 ];
 $fields = 
 [
    'registration_ids'  => $tokenn,
    'data'      => $msgg
 ];
 
 $headers = 
 [
   'Authorization: key=' . DRIVER_API_ACCESS_KEY,
   'Content-Type: application/json'
 ];
 $ch = curl_init();
 curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
 curl_setopt( $ch,CURLOPT_POST, true );
 curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
 curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
 curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
 curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
 $result = curl_exec($ch );
 curl_close( $ch );

?>