<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style.css">
    <title>Federal Department of Justice</title>
</head>
<body class="loginBody">
    <?php include('./templates/header.php'); ?>
    <main class="loginMain">
        <h1>Employee Login</h1>

        <form class="loginForm" action="#" method="post">
            <label for="loginName">Login Name:</label>
            <input id="loginName" type="text" name="loginName">
            <label for="pswd">Password:</label>
            <input id="pswd" type="password" name="pswd">

            <input type="radio" name="employee" id="admin" value="Admin" checked>
            <label for="admin">Administrator</label>
            <input type="radio" name="employee" id="guard" value="Guard">
            <label for="guard">Guard</label>

            <input id="loginButton" name="submit" type="submit" value="Login">


			<?php
				require_once './helperFunctions.php';
				$conn = connectToDatabase();
				if($conn->connect_error){
					die("Connection failed: ". $conn->connect_error);
					}

				if(isset($_POST['submit'])) {
					$employee = $_POST['employee'];
					$username = $_POST['loginName'];
					$password = $_POST['pswd'];
					if ($employee == "Guard"){
						$query = "SELECT Login_pass, Username FROM guard_login WHERE Login_pass = '$password' AND Username = '$username'";
						$result = $conn->query($query);
						if($result->num_rows == 1)
							header('Location: ./Guard/guard.php?login');
						else{
							echo "<p>INCORRECT LOGIN INFORMATION</p>";
						}
					}
					if ($employee == "Admin"){
						$query = "SELECT Login_pass, Username FROM admin_login WHERE Login_pass = '$password' AND Username = '$username'";
						$result = $conn->query($query);
						if($result->num_rows == 1)
						header('Location: ./Administrator/admin.php?login');
						else{
							echo "<p>INCORRECT LOGIN INFORMATION</p>";
						}
					}
				}
				clearConnection($conn);
			?>


        </form>
    </main>
    <?php include('./templates/footer.php'); ?>
</body>
</html>
