<!--
    no variables(???)

    echo a table with <a> links on cell id
-->
<?php
	require_once '../helperFunctions.php';
	$conn = connectToDatabase();
	$query = "SELECT * FROM cell";
	$result = $conn->query($query);


	
	if($result->num_rows > 0){
		echo "<br> ID". "\t Max_Occupants". "\t Location <br>"; 
		while($row = $result->fetch_assoc()){
			extract($row);
			//$link = $row["Cell_ID"];
			//echo "<a href=INSERT APPROPRIATE LINK HERE>$link</a>";
			echo "\t". $row["Cell_ID"]. "\t". $row["Max_Occupants"]. "\t". $row["Location"]. "<br>";
		}
	}
	else{
		echo "0 results!";
	}
	clearConnection($conn);

?>
