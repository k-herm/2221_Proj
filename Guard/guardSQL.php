<!--
    variables:
    inmateName
    inmateID
    paroleDate
-->

<?php
// to use connect DB function
require_once '../helperFunctions.php';

//echo all inmates with links


//search for inmates
if(isset($_POST['inmateName'])) {
    $name = $_POST['inmateName'];
    echo "<h1>" . $name . "</h1>";
}


?>