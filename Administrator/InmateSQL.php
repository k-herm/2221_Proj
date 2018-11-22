<!--
    variables:

    inmateName
    inmateID

-->

<?php
	$servername = "localhost";
	$username = "root";
	$password = "Lostsdjl++?";
	$dbname = "prison";

	$InmateID=$_POST['inmateID'];
    $InmateName=$_POST['inmateName'];

	//create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	//Checking connection
	if($conn->connect_error){
		die("Connection failed: ". $conn->connecte_error);
	}	else{
		echo "Connection Successful";
	}

	//construct query
	$query = "SELECT * FROM inmate WHERE name = '$InmateName'";
	$result = $conn->query($query);

	//Execute query
	if($result->num_rows > 0){

		echo "<h1>Inmates Found</h1>";
        echo "<table align=\"center\"border= \"1\">";
        echo "<tr><th>Inmate_ID</th><th>Inmate_Name</th><th>Security_Level</th></tr>";
        // output data for each row
        while($row = $result->fetch_assoc()){
        	echo "<tr><td>" . $row["Inmate_ID"] . " </td><td>". $row[ "Name"]
        		. "</td><td>" . $row["Security_Level"] . "</td></tr>";
        }

	}	else{
		echo "<h1>0 result found</h1>";
	}
	$conn->close();
?>