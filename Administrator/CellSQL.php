
<?php
	require_once '../helperFunctions.php';
	$conn = connectToDatabase();
	$query = "SELECT c.Cell_ID, c.Max_Occupants, c.Location,Max_Occupants - COUNT(*) AS Vacancy
              FROM cell c, inmate i
              WHERE c.Cell_ID = i.Cell_Id
              GROUP BY i.Cell_ID";
	$result = $conn->query($query);
    clearConnection($conn);
    $query2 = "SELECT COUNT(*) FROM CELL";
    $result2 = $conn->query($query2);

	if($result->num_rows > 0){
		echo "<table align=\"center\"border= \"1\">";
        echo "<tr><th>Cell_ID</th><th>Max_Occupants</th><th>Location</th><th>Vacancy</th>";
		while($row = $result->fetch_assoc()){
			extract($row);
			//$link = $row["Cell_ID"];
			//echo "<a href=INSERT APPROPRIATE LINK HERE>$link</a>";
			echo "<tr><td>". $row["Cell_ID"]. "</td><td>". $row["Max_Occupants"]. "</td><td>". $row["Location"]. "</td><td>" . $row["Vacancy"] ."</td></tr>";
		}
	}
	else{
		echo "0 results!";
	}

    if($result2->num_rows > 0 ){
        $row = $result2->fetch_assoc();
        echo "<h1>There are ". $row["COUNT(*)"]. " cells in the prison.</h1>";
    }

	clearConnection($conn);
	$conn->close();

?>
