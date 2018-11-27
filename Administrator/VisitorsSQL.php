<?php
	require_once '../helperFunctions.php';
	$conn = connectToDatabase();

	if(isset($_GET['stats'])) {

	//construct query, In the Query vv means visits verb
	$query = "SELECT name AS Name_Visitor_Of_All FROM visitor v
	                    WHERE NOT EXISTS(SELECT name FROM inmate i
	                    WHERE NOT EXISTS(SELECT inmate_ID FROM visits vv
	                    WHERE vv.Visitor_ID=v.Visitor_ID AND vv.Inmate_ID=i.Inmate_ID))";
	$result = $conn->query($query);

    //Execute query
	if($result->num_rows > 0){

		echo "<h1>These Visitors Visit Everyone or More Than one Person. Cautious</h1><br> <br>";
		echo "<table align=\"center\"border= \"1\">";
		echo "<br> <br>
		<tr><th>Visitors who visit everyone</th></tr>";
		// output data for each row
		while($row = $result->fetch_assoc()){
			echo "<tr><td>" . $row["Name_Visitor_Of_All"] . " </td></tr>";
		}

	}	else{
		echo "<h1>0 result found</h1>";
	}

    echo "<h1>\n</h1>";
    $result = $conn->query($query);

    $query = "SELECT v.name AS Visitor_Of_More_Than_one
                                  FROM visitor v, visits vv
                                  WHERE v.Visitor_ID = vv.Visitor_ID
                                  GROUP BY v.Visitor_ID
                                  HAVING COUNT(*) > 1";
	$result = $conn->query($query);

	//Execute query
	if($result->num_rows > 0){
		echo "<table align=\"center\"border= \"1\">";
		echo "<tr><th>Visitors Who visit more than one inmate</th></tr>";
		// output data for each row
		while($row = $result->fetch_assoc()){
			echo "<tr><td>" . $row["Visitor_Of_More_Than_one"] . " </td></tr>";
		}
	} else{
		echo "<h1>0 result found</h1>";
	}

	$conn->close();


	}
	else {

		$InmateID=$_POST['inmateID'];
		$InmateName=$_POST['inmateName'];
		$VisitorID = $_POST['visitorID'];
		$VisitorName = $_POST['visitorName'];
		$VisitorDate = $_POST['visitorDate'];

		//Checking connection
		if($conn->connect_error){
			die("Connection failed: ". $conn->connecte_error);
		}

		//construct query
		$query = "SELECT v.Visitor_ID, v.Name as visitorName, i.Name as InmateName, vv.Relationship, vl.Date, vl.Time_in, vl.Time_out
        	          FROM inmate i, visitor v, visitor_logs vl, visits vv
        	          WHERE vl.visitor_ID = v.Visitor_ID AND vl.visitor_ID = vv.visitor_ID AND vv.Visitor_ID = v.Visitor_ID
        	                                                AND i.Inmate_ID = vv.Inmate_ID AND vv.Visit_ID = vl.Visit_ID AND
        	                                                (i.name = '$InmateName' OR i.Inmate_ID = '$InmateID'
        	                                                OR v.Visitor_ID = '$VisitorID' OR v.name = '$VisitorName')";
		$result = $conn->query($query);

		//Execute query
		if($result->num_rows > 0){

			echo "<h1>The Visitor</h1>";
			echo "<table align=\"center\"border= \"1\">";
			echo "<tr><th>VisitorId</th><th>VisitorName</th><th>Inmate_Name</th><th>Relationship</th>
						<th>Visit_date</th><th>Time_in</th><th>Time_out</th></tr>";
			// output data for each row
			while($row = $result->fetch_assoc()){
				echo "<tr><td>" . $row["Visitor_ID"] . " </td><td>". $row[ "visitorName"]
					. "</td><td>" . $row["InmateName"] . " </td><td>" . $row["Relationship"] . "</td>
					<td>" . $row["Date"] . "</td><td>" . $row["Time_in"] . "</td><td>"
					. $row["Time_out"] . " </td></tr>";
			}

		}	else{
			echo "<h1>0 result found</h1>";
		}
		$conn->close();
	}
?>