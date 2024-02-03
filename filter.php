<?php 
// $conn=new mysqli("localhost","root","","whatsarc");
$conn=new mysqli("localhost","whatsarc","","whatsarc");

	$sel="SELECT * FROM `dataset` LIMIT 1";
	$que=$conn->query($sel);
	if ($que->num_rows > 0) {
		
		$row=$que->fetch_assoc();
		
		$numbers = json_decode($row['numbers']);
		$names = json_decode($row['names']);

		$NumElementCount  = count($numbers);

		// echo $NumElementCount."<br>";
		$RecID=$row['id'];

		for ($i=0; $i < $NumElementCount; $i++) {
			$checkExist="SELECT * FROM `filtered` WHERE `number`='$numbers[$i]'";
			$quecheck=$conn->query($checkExist);
			if (!$quecheck->num_rows > 0) {
				$name=((@$names[$i])?$names[$i]:"data");

				$setData="INSERT INTO `filtered`(`number`,`name`) VALUES ('$numbers[$i]','$name')";
				if (!$conn->query($setData))
					echo "Error ---> ".$conn->error;
			}
		}
		$delData="DELETE FROM `dataset` WHERE `id`=$RecID";
		$conn->query($delData);
	}

$conn->close();
?>
<script language="javascript">
document.write ( "<img src = \"https://javascript-tutor.net/java_tutor/" +
            Math.floor( 1 + Math.random() * 6 ) +
            ".jpg\" width = \"50\" height = \"50\" />");
           
 document.writeln("<br><hr>Reload to throw again");            
</script>
