<?php
// to use connect DB function
require_once '../helperFunctions.php';
$conn = connectToDatabase();
//echo all inmates with links
$query = "SELECT Inmate_ID, Name, Age, Sex FROM inmate";
$result = $conn->query($query);


//echo all inmates with links
if($result->num_rows > 0){
	echo "<table border= \"1\">";
	echo "<tr><th> ID</th><th> NAME</th><th> AGE</th><th> SEX </th></tr>";
	while($row = $result->fetch_assoc()){
		$link = $row["Inmate_ID"];
		echo "<tr><td><a href='./inmateProfile.php?login&id=$link'>$link</a></td>";
		echo "<td>". $row["Name"]. "</td><td>". $row["Age"]. "</td><td>". $row["Sex"]. "</td></tr>";
	}
}
else{
	echo "0 results!";
}
clearConnection($conn);


//search for inmates
$searchParam = 0;
$id = '';
$name='';
$paroleDate='';
if(!empty($_POST['inmateID'])) {
    $id = $_POST['inmateID'];
	$searchParam += 1;
}
if(!empty($_POST['inmateName'])){
	$name = $_POST['inmateName'];
	$searchParam += 2;
}
if(!empty($_POST['paroleDate'])){
	$paroleDate = $_POST['paroleDate'];
	$searchParam += 4;
}


switch($searchParam){
	//just ID
	case 1:
		$query = "SELECT Inmate_ID, Name, Age, Sex FROM inmate WHERE Inmate_ID = $id";
		$result = $conn->query($query);
		break;
	//just Name
	case 2:
		$query = "SELECT Inmate_ID, Name, Age, Sex FROM inmate WHERE Name LIKE '%$name%'";
		$result = $conn->query($query);
		break;
	// ID + Name
	case 3:
		$query = "SELECT Inmate_ID, Name, Age, Sex FROM inmate WHERE Inmate_ID = $id OR Name LIKE '%$name%'";
		$result = $conn->query($query);
		break;
	//just Parole_Date
	case 4:
		$query = "SELECT Inmate_ID, Name, Age, Sex FROM inmate WHERE Parole_Date = $paroleDate";
		$result = $conn->query($query);
		break;
	//ID + Parole_Date
	case 5:
		$query = "SELECT Inmate_ID, Name, Age, Sex FROM inmate WHERE Inmate_ID = $id OR Parole_Date = $paroleDate";
		$result = $conn->query($query);
		break;
	//Name + Date
	case 6:
		$query = "SELECT Inmate_ID, Name, Age, Sex FROM inmate WHERE Parole_Date = $paroleDate OR Name LIKE '%$name%'";
		$result = $conn->query($query);
		break;
	//ID + Name + Date
	case 7:
		$query = "SELECT Inmate_ID, Name, Age, Sex FROM inmate WHERE Inmate_ID = $id OR Name LIKE '%$name%' OR Parole_Date = $paroleDate";
		$result = $conn->query($query);
		break;

}

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
	$link = $row["Inmate_ID"];
	echo "<p><a href='./inmateProfile.php?login&id=$link'>$link</a>";
	echo "\t". $row["Name"]. "\t". $row["Age"]. "\t". $row["Sex"]. "</p>";
	}
}
else{
	echo "<br>0 results!";
}
clearConnection($conn);
$conn->close();


?>
