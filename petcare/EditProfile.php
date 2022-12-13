<?php
session_start();
require_once 'db.php';

$sql = "SELECT * FROM petowner ";
$result= mysqli_query($Connect, $sql);
$row=mysqli_fetch_assoc($result);
if(isset($_POST['delete'])){
$query = "DELETE from petowner WHERE email='$Email' ";


}

if(isset($_POST['Submit'])){
$FName = $_POST['FirstName'];
$LName=$_POST['LastName'];
$Email=$_POST['Email'];
$Password=$_POST['Password'];
$phone=$_POST['phone'];
$Gender=$_POST['Gender'];
$query = "UPDATE petowner SET email='$Email' , password='$Password', gender='$Gender', phone='$phone', Fname='$FName', Lname='$LName' WHERE email='$Email' ";
$result=mysqli_query($Connect , $query);


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
  echo $target_file;
  mysqli_query($con,"UPDATE petowner set photo = '$target_file'");
  } else {
  echo "Sorry, there was an error uploading your file.";
  }


}
echo 'done ';?>
