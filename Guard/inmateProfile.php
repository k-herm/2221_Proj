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
            </div>
            <img id="profilePic" src="./Img/criminalProfile.jpg" alt="">
        </div>
    </main>

</body>
</html>