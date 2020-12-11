<?php

 function loginUser($email,$user_pass){


     $curl = curl_init();


     curl_setopt_array($curl, array(
         CURLOPT_PORT => "8000",
         CURLOPT_URL => "http://api:8000/services/login.php",
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => "",
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 30,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => "POST",
         CURLOPT_POSTFIELDS => "{\n\n\n\"email\":\"$email\",\n\"user_pass\":\"$user_pass\"\n\n\n}",
         CURLOPT_HTTPHEADER => array(
             "Content-Type: application/json",
             "Postman-Token: 76b76a15-fcb3-4dc4-9ee4-304c72c5dfdf",
             "cache-control: no-cache"
         ),
     ));

     $response = curl_exec($curl);
     $err = curl_error($curl);

     curl_close($curl);

     if ($err) {
         echo "Error #:" . $err;

     } else {
         $json = json_decode($response, true);

         return $json;



     }
}

?>