<?php 
$regId = $_GET['regId'];
 
 $con = mysql_connect("localhost", "x003540_db","FUlnFXCF5H");
 if(!$con){
  die('MySQL connection failed'.mysql_error());
 }
 
 $db = mysql_select_db("x003540_db",$con);
 if(!$db){
  die('Database selection failed'.mysql_error());
 }
 
 $sql = "INSERT INTO tblRegistration (registration_id) values ('$regId')";
 
 if(!mysql_query($sql, $con)){
  die('MySQL query failed'.mysql_error());
 }
 
mysql_close($con);