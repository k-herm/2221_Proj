<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./../style.css">
    <title>Federal Department of Justice</title>
</head>
<body>
    <?php include('./../templates/header.php'); ?>

    <main>
        <div class="inmateProfile">
            <div class="inmateInfo">
                <table>
            <?php
                require_once '../helperFunctions.php';
                $conn = connectToDatabase();

                $id = $_GET['id'];
                $query = "SELECT * FROM inmate WHERE Inmate_ID = $id";
                $result = $conn->query($query);

                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                        echo "<tr><td>ID: </td><td>" . $row["Inmate_ID"] . "</td></tr>";
                        echo "<tr><td>Name: </td><td>" . $row["Name"] . "</td></tr>";
                        echo "<tr><td>Cell ID: </td><td>" . $row["Cell_Id"] . "</td></tr>";
                        echo "<tr><td>Guard ID: </td><td>" . $row["Employee_ID"] . "</td></tr>";
                        echo "<tr><td>Security Level: </td><td>" . $row["Security_Level"] . "</td></tr>";
                        echo "<tr><td>Age: </td><td>" . $row["Age"] . "</td></tr>";
                        echo "<tr><td>Sex: </td><td>" . $row["Sex"] . "</td></tr>";
                        echo "<tr><td>Crime: </td><td>" . $row["Crime"] . "</td></tr>";
                        echo "<tr><td>Parole Date: </td><td>" . $row["Parole_Date"] . "</td></tr>";
                }
            ?>
                </table>
                <br><br>
                <form action="#" method="post">
                    <select name="attributeList">
                        <option value="Name">Name</option>
                        <option value="Cell_ID">Cell ID</option>
                        <option value="Employee_ID">Guard ID</option>
                        <option value="Security_Level">Security Level</option>
                        <option value="Age">Age</option>
                        <option value="Sex">Sex</option>
                        <option value="Crime">Crime</option>
                        <option value="Parole_Date">Parole Date</option>
                    </select>
                    <input type="text" name="updateField">
                    <input id="updateButton" name="update" type="submit" value="UPDATE">
                </form>

            </div>
            <!-- Image used from jolawoffice.com -->
            <div class="right">
                <img id="profilePic" src="./Img/criminalProfile.jpg" alt="">
                <form action="#" method="post">
                    <input id="deleteButton" name="delete" type="submit" value="DELETE">
                </form>
            </div>
        </div>
    </main>

</body>
</html>

<?php
	require_once '../helperFunctions.php';
	$conn = connectToDatabase();
	if($conn->connect_error){
		die("Connection failed: ". $conn->connect_error);
		}

	if(isset($_POST['update'])) {
		$attribute = $_POST['attributeList'];
        $newInfo = $_POST['updateField'];

		$query = "UPDATE inmate SET $attribute = '$newInfo' WHERE Inmate_ID = $id";
        $result = $conn->query($query);

        $loc = "Location: ./inmateProfile.php?login&id=$id";
        header($loc);
    }
    if(isset($_POST['delete'])) {
        $query = "DELETE FROM inmate WHERE Inmate_ID = $id";
        $result = $conn->query($query);

	    header('Location: ./guard.php?login');
    }
	clearConnection($conn);
?>
