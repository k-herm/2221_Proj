<!--
    variables:

    deliveryName
    deliveryID
-->

<?php

	require_once '../helperFunctions.php';
    $conn = connectToDatabase();

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
        echo "<tr><th>Delivey Company</th><th>ID";
        // output data for each row
        while($row = $result->fetch_assoc()){
        	echo "<tr><td>" . $row["Name"] . "</td><td>". $row["Company_ID"] . "</td></tr>";
        }

	}	else{
		echo "<h1>0 result found with this ID and Name</h1>";
	}
    
	$conn->close();
?>