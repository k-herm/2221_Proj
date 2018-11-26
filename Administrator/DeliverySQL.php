<!--
    variables:

    deliveryName
    deliveryID
-->

<?php

	require_once '../helperFunctions.php';
    $conn = connectToDatabase();

if(isset($_GET['stats'])) {
	$query = "SELECT name, company_id, frequency
              FROM Delivery_company 
              GROUP BY company_id
              ORDER BY 
                CASE frequency
                    WHEN 'ON DEMAND' THEN 1
                    WHEN 'WEEKLY' THEN 2
                    WHEN 'BI-WEEKLY' THEN 3
                    ELSE 4
                    END";
	$result = $conn->query($query);


	if($result->num_rows > 0){
		echo "<h1> Companies Based on Frequency </h1>"; 
		echo "<table align=\"center\"border= \"1\">";
        echo "<tr><th>Delivery Company</th><th>ID</th><th>Frequency</th>";
		while($row = $result->fetch_assoc()){
			echo "<tr><td>". $row["name"]. "</td><td>". $row["company_id"] . "</td><td>". $row["frequency"]. "</td></tr>";
		}
	}
}
else{

	$deliveryName=$_POST['deliveryName'];
    $deliveryID=$_POST['deliveryID'];

	//Checking conn
	if($conn->connect_error){
		die("Connection failed: ". $conn->connecte_error);
	}



	//construct query
	$query = "SELECT * FROM Delivery_company WHERE name = '$deliveryName' OR company_ID = '$deliveryID'";
	$result = $conn->query($query);

	//Execute query
	if($result->num_rows > 0){
		echo "<h1>Companies based on search:</h1>";
        echo "<table align=\"center\"border= \"1\">";
        echo "<tr><th>Delivery Company</th><th>ID";
        // output data for each row
        while($row = $result->fetch_assoc()){
        	echo "<tr><td>" . $row["Name"] . "</td><td>". $row["Company_ID"] . "</td></tr>";
        }

	}	else{
		echo "<h1>0 result found with this ID and Name</h1>";
	}
}
    
	$conn->close();
?>