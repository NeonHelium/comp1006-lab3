<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Details</title>
    <!-- Boostrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
</head>
<?php
        $clubId = null;
        $clubName = null;
        $ground = null;

        if(isset($_GET['clubId'])){
            if(is_numeric($_GET['clubId'])){
                $clubId = $_GET['clubId'];

                // Get the info from the database
                require 'db.php';
                $sql = "SELECT * FROM clubs WHERE clubId = :clubId";
                $cmd = $db->prepare($sql);
                $cmd->bindParam(':clubId', $clubId, PDO::PARAM_INT);   // Bind param, must be int. Done for security
                $cmd->execute();
                $club = $cmd->fetch(); // Return 1 result, so use fetch, not fetchAll();
                $clubName = $club['clubName'];
                $ground = $club['ground'];

                echo "<script>console.log('debug objects: '" . $clubName . ");</script>";

                // Disconnect
                $db = null;
            }
        }
    ?>
<body>
    <main>
        <h1>Add/Edit Club Information</h1>
        <!-- Page form -->
        <form method="POST" action="save-club.php">
            <fieldset>
                <label for="clubName">Club Name:</label>
                <input name="clubName" id="clubName" required maxlength="100" value="<?php echo $clubName; ?>">
            </fieldset>
            <fieldset>
                <label for="ground">Club Ground:</label>
                <input name="ground" id="ground" required maxlength="100" value="<?php echo $ground; ?>">
            </fieldset>
            <input type="hidden" name="clubId" id="clubId" value="<?php echo $clubId; ?>">
            <button>Save</button>
        </form>
    </main>
</body>
</html>