
<?php
$Connect= mysqli_connect('localhost','root','','petcare');
start_session();
if(!$Connect){

    die(mysqli_error($Connect));
}

if (isset($_POST['Add'])){
  $PetName=$_POST['pet'];
  $date=$_POST['AppDate'];
  $time=$_POST['time'];
  $note=$_POST['note'];
  $service=$_POST['service'];

$pEmal=$_SESSION['email'];
	$Query_Add = mysqli_query($Connect,"INSERT INTO `petappointment`(`pEmail`, `pName`, `date`, `time` ,`notes`,`service`,`mEmail`) VALUES ('$pEmail','$PetName','$date','$time','$note','$service','khloud@hotmail.com')");
if($Query_Add)
echo "<script>alert('Service Has Been Added successfully');</script>";
	}else {
		echo "<script>alert('Failed To Add Service')</script>";
	}


?>
