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
		//echo "<br> ID". "\t Max_Occupants". "\t Location <br>"; 
		echo "<table align=\"center\"border= \"1\">";
        echo "<tr><th>Cell_ID</th><th>Max_Occupants</th><th>Location</th>";
		while($row = $result->fetch_assoc()){
			extract($row);
			//$link = $row["Cell_ID"];
			//echo "<a href=INSERT APPROPRIATE LINK HERE>$link</a>";
			echo "<tr><td>". $row["Cell_ID"]. "</td><td>". $row["Max_Occupants"]. "</td><td>". $row["Location"]. "</td></tr>";
		}
	}
	else{
		echo "0 results!";
	}
	clearConnection($conn);

?>
