<header>
    <img src='./Img/coatofarms.png' alt='' class='coatOfArms'>
    <h1>Federal Department of Justice</h1>
    <h1>Database</h1>
    <?php
        if(isset($_GET['login'])) {
            echo '<div class="logoutHeader">';
            echo '<p id="today">' . date("F j Y") . '</p>';
            echo '<a href="../index.php">
                <button id="logout" name="logout" type="button">Logout</button>
                </a>';
            echo '</div>';
        }
    ?>
</header>