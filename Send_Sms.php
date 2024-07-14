<?php

function SendSmsOtp($from,$to,$message){
    

    $postData = array(
        'from' => $from,
        'message' => $message,
        'to' => $to
    );

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.getspendo.com/gateway/api/v1/send/sms',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($postData),
        CURLOPT_HTTPHEADER => array(
            'apiKey: pk_live_kXIY0RHjDPSFFYI8LkMXhQSO18Zi77gW1d2WP27adN4B4QX70T',
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    // Check if cURL request was successful
    // if ($response === false) {
    //     echo "Failed to send SMS. cURL error: " . curl_error($curl);
    // } else {
    //     // Check if the response is valid JSON
    //     $responseData = json_decode($response, true);
    //     if ($responseData === null) {
    //         echo "Failed to send SMS. Invalid JSON response from the server.";
    //     } else {
    //         // Check if the response contains a status field
    //         if (isset($responseData['status'])) {
    //             // Check if the status indicates success
    //             if ($responseData['status'] == 'success') {
                    // echo "<div class='success-message'>SMS sent successfully to {$to}.</div>";
                    // echo "<script>setTimeout(function() { window.location.href = 'index.php'; }, 5000);</script>";
            //     } else {
            //         // Handle other status values (e.g., 'error')
            //         echo "Failed to send SMS. Reason: " . $responseData['message'];
            //     }
            // } else {
            //     // Handle missing status field in the response
            //     echo "Failed to send SMS. Unexpected response format from the server.";
            }
//         }
//     }
// }

