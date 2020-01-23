<?php
$name=$_POST["name"];
$date=$_POST["date"];
$time=$_POST["time"];
$person=$_POST["person"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$conn=new mysqli("localhost","root","","restaurant");
if($conn->connect_error){
  die("Connection failed".$conn->connect_error);
}
$sql="INSERT INTO tablebooking (NAME,DATE,TIME,PERSON,EMAIL,PHONE_NO)
VALUES ('$name','$date','$time','$person','$email','$phone')";
if($conn->query($sql)==FALSE)
{
  echo "ERROR : ".$sql."<br>".$conn->connect_error;
}
$conn->close();
 ?>
 <script>
 alert("THANK YOU");
 window.location.href="index.html";
 </script>
