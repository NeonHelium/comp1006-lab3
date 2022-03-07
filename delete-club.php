<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleting record...</title>
    <!-- Boostrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
    <!-- custome js -->
    <script src="js/confirmDelete.js"></script>
</head>
<body>
    <main>
        <h1>Deleting club record...</h1>
        <?php 
            // Delete the record from the database if the record exists
            if(isset($_GET['clubId'])){
                if(is_numeric($_GET['clubId'])){
                    require 'db.php';

                    $sql = "DELETE FROM clubs WHERE clubId = :clubId";
                    $cmd = $db->prepare($sql);
                    // Remember: We have not saved any $clubId variable, so we need to 
                    // get it from the $_GET array
                    $cmd->bindParam(':clubId', $_GET['clubId'], PDO::PARAM_INT);
                    $cmd->execute();

                    $db = null;

                    echo "Club record successfully deleted!";
                }
                else{
                    echo "Club ID not numeric";
                }
            }
            else{
                echo "Club missing";
            }
            echo '<a href="clubs.php">Return to Clubs Lists</a>';
        ?>
    </main>
</body>
</html>