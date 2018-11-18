<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('../style.css'); ?>
    <title>Federal Department of Justice</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <?php require '../templates/header.php'?>

    <main>
        <div class="filters">
            <h3>Filters</h3>

            <label for="inmateID">ID:</label>
            <input id="iid" type="text" name="inmateID">
            <label for="inmateName">Inmate Name:</label>
            <input id="iname" type="text" name="inmateName">

            <label for="paroleDate">Parole Date:</label>
            <input id="paroleDate" type="text" name="paroleDate">

            <input id="searchButton" type="button" value="Search">
        </div>

        <div class="results">
            <?php require './guardSQL.php' ?>
        </div>
    </main>

    <?php require '../templates/footer.php'?>
</body>
</html>


<script>
    $('#searchButton').click(function() {
        let iid = $('#iid').val();
        let iname = $('#iname').val();
        let pdate = $('#paroleDate').val();

        $.ajax({
            method: "POST",
            url: 'guardSQL.php',
            data: {
                inmateName: iname,
                inmateID: iid,
                paroleDate: pdate
            },
            success: function(html) {
                $('.results').html(html);
            }
        });
    });
</script>