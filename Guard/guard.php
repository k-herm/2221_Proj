<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./../style.css">
    <title>Federal Department of Justice</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <?php include('./../templates/header.php'); ?>
    <main>
        <div class="filters">
            <label for="inmateID">Inmate ID:</label>
            <input id="iid" type="text" name="inmateID">
            <label for="inmateName">Inmate Name:</label>
            <input id="iname" type="text" name="inmateName">

            <label for="paroleDate">Parole Date:</label>
            <input id="paroleDate" type="text" name="paroleDate">

            <input id="searchButton" type="button" value="Search">
            <div></div>
            <div>
                <input type="checkbox" id="checkCell" name="cell" value="cell">Cell ID
                <input type="checkbox" id="checkSecurity" name="security" value="security">Security Level
                <input type="checkbox" id="checkGuard" name="guard" value="guard">Guard ID
                <input type="checkbox" id="checkCrime" name="crime" value="crime">Crime
                <input type="checkbox" id="checkParole" name="parole" value="parole">Parole Date
            </div>
        </div>

        <div class="results">
            <?php include('./guardSQL.php'); ?>
        </div>
    </main>
</body>
</html>


<script>
    $('#searchButton').click(function() {
        let iid = $('#iid').val();
        let iname = $('#iname').val();
        let pdate = $('#paroleDate').val();

        let cell = $('#checkCell').prop("checked");
        let security = $('#checkSecurity').prop("checked");
        let guard = $('#checkGuard').prop("checked");
        let crime = $('#checkCrime').prop("checked");
        let parole = $('#checkParole').prop("checked");

        $.ajax({
            method: "POST",
            url: 'guardSQL.php',
            data: {
                inmateName: iname,
                inmateID: iid,
                paroleDate: pdate,
                cell: cell,
                security: security,
                guardId: guard,
                crime: crime,
                parole: parole
            },
            success: function(html) {
                $('.results').html(html);
            }
        });
    });
</script>