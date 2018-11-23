<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./../style.css">
    <title>Federal Department of Justice</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./admin.js" type="text/javascript" defer></script>
</head>
<body>
    <?php include('./../templates/header.php'); ?>
    <main>
        <nav>
            <ul>
                <li id='navCell'>Prison Cells</li>
                <li id='navDelivery'>Shipping Management</li>
                <li id='navVisitor'>Visitor Info</li>
                <li id='navInmate'>Inmate Info</li>
            </ul>
        </nav>

        <div class="cells">
            <input id="cSearchButton" type="button" value="Show All">

        </div>

        <div class="delivery">
            <label for="deliveryID">Delivery Co ID:</label>
            <input id="did" type="text" name="deliveryID">
            <label for="deliveryName">Delivery Co Name:</label>
            <input id="dname" type="text" name="deliveryName">

            <input id="dSearchButton" type="button" value="Search">
            <button id='dStatsButton'>CURRENT STATS</button>
        </div>

        <div class="visitor">
            <label for="inmateID">Inmate ID:</label>
            <input id="idv" type="text" name="inmateID">
            <label for="inmateName">Inmate Name:</label>
            <input id="namev" type="text" name="inmateName">

            <label for="visitorID">Visitor ID:</label>
            <input id="vid" type="text" name="visitorID">
            <label for="visitorName">Visitor Name:</label>
            <input id="vname" type="text" name="visitorName">
            <label for="visitDate">Visit Date:</label>
            <input id="vdate" type="text" name="visitDate">

            <input id="vSearchButton" type="button" value="Search">
            <button id='vStatsButton'>CURRENT STATS</button>
        </div>

        <div class="inmate">
            <label for="inmateID">Inmate ID:</label>
            <input id="idi" type="text" name="inmateID">
            <label for="inmateName">Inmate Name:</label>
            <input id="namei" type="text" name="inmateName">

                    <input id="iSearchButton" type="button" value="Search">
                </form>
            </body>
        </div>

        <div class="results">

        </div>
    </main>

    <?php include('./../templates/footer.php'); ?>
</body>
</html>