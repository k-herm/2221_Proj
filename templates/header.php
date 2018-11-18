<header>

<h1>Federal Department of Justice</h1>

<?php
    if(isset($_GET['login'])) {

        $login = $_GET['login'];

        if ($login == true) {
            echo '<a href="../index.php">
            <button id="logout" name="logout" type="button">Logout</button>
            </a>';
        }
    }

?>
</header>

