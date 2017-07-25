 <?php
 //$message = $_GET['message'];
  
   $con = mysql_connect("localhost", "x003540_db","FUlnFXCF5H");
    die('MySQL connection failed');
   if(!$con){
   }
 
   $db = mysql_select_db("x003540_db");
   if(!$db){
    die('Database selection failed');
   }
 
 
   $registatoin_ids = array();
   $sql = "SELECT * FROM tblRegistration";
   $result = mysql_query($sql, $con);
   while($row = mysql_fetch_assoc($result)){
    array_push($registatoin_ids, $row['registration_id']);
   }
 
   // Set POST variables
         $url = 'https://android.googleapis.com/gcm/send';
   
	$data = array("user" => $_GET['user'] , "message" => $_GET['message']);
//		echo $_GET['user'];
//		echo $_POST['message'];
//		echo "  SEMMI  ";
         $fields = array(
             'registration_ids' => $registatoin_ids,
             'data' => $data,
         );
   
         $headers = array(
             'Authorization: key=AIzaSyAbixgoPh4sNe4IVgntbeKV4kKDC7y9v2E',
             'Content-Type: application/json'
         );
         // Open connection
         $ch = curl_init();
   
         // Set the url, number of POST vars, POST data
         curl_setopt($ch, CURLOPT_URL, $url);
   
         curl_setopt($ch, CURLOPT_POST, true);
         curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   
         // Disabling SSL Certificate support temporarly
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   
         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
   
         // Execute post
         $result = curl_exec($ch);
         if ($result === FALSE) {
             die('Curl failed: ' . curl_error($ch));
         }
   
         // Close connection
         curl_close($ch);
         echo $result;
  
 ?>