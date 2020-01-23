<html>
<head>
  <style>
  table{
    border:2px solid black;
  }
  td{
    border:2px solid black;
    padding:1vw;
  }
  button{
    margin-top:1vw;
  }
  </style>
<?php
$name=$_POST["name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$address=$_POST["address"];
$city=$_POST["city"];
$zip=$_POST["zip"];
$pizza=$_POST["pizza"];
$qnty=$_POST["quantity"];
$conn=new mysqli("localhost","root","","restaurant");
if($conn->connect_error)
{
  die("Connection failed".$conn->connect_error);
}
$sql="INSERT INTO onlinebooking (NAME,EMAIL,PHONE_NO,ADDRESS,CITY,PIN_CODE,ITEM,QUANTITY)
VALUES ('$name','$email','$phone','$address','$city','$zip','$pizza','$qnty')";
if($conn->query($sql)==FALSE)
{
    echo "ERROR : ".$sql."<br>".$conn->connect_error;
}
$sql="SELECT PRICE FROM menu WHERE PIZZA='$pizza'";
$res=$conn->query($sql);
if(!$res)
{
    echo "ERROR : ".$sql."<br>".$conn->connect_error;
}
$result=$res->fetch_row();
$total=$result[0]*$qnty;
$conn->close();
 ?>
 <head>
 <body>
   <table>
     <tr>
      <td>Name</td>
      <td><?php echo $name; ?></td>
    </tr>
    <tr>
      <td>Phone no.</td>
      <td><?php echo $phone; ?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $address; ?></td>
    </tr>
    <tr>
      <td>City</td>
      <td><?php echo $city; ?></td>
    </tr>
    <tr>
      <td>Pizza Type</td>
      <td><?php echo $pizza; ?></td>
    </tr>
    <tr>
      <td>Quantity</td>
      <td><?php echo $qnty; ?></td>
    </tr>
    <tr>
      <td>Amount</td>
      <td><?php echo $total; ?></td>
  </table>
  <button onclick="window.print()">Print</button>
</body>
</html>
