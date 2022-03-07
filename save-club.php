<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saving club...</title>
</head>
<body>
    <main>
        <?php 
            // Get the inputs from the POST array
            $clubId = $_POST['clubId'];
            $clubName = $_POST['clubName'];
            $ground = $_POST['ground'];
            $okay = true;

            // Validate the data
            if(empty($clubName) || strlen($clubName) >= 100){
                echo "Club Name cannot be empty and must not be longer than 100 characters.";
                $okay = false;
            }

            if(empty($ground) || strlen($ground) >= 100){
                echo "Club Ground field cannot be empty and ground name cannot exceed 100 characters.";
                $okay = false;
            }

            // If we are okay to proceed, then save the data to the database
            if($okay){
                require "db.php";

                if(empty($clubId)){
                    $sql = "INSERT INTO clubs (clubName, ground) VALUES (:clubName, :ground)";
                }
                else{
                    $sql = "UPDATE clubs SET clubName = :clubName, ground = :ground WHERE clubId = :clubId";
                }

                $cmd = $db->prepare($sql);
                $cmd->bindParam(':clubName', $clubName, PDO::PARAM_STR, 100);
                $cmd->bindParam(':ground', $ground, PDO::PARAM_STR, 100);
                if(!empty($clubId)){
                    $cmd->bindParam(':clubId', $clubId, PDO::PARAM_INT);
                }

                $cmd->execute();

                // Disconnect
                $db = null;

                echo "Club saved";
                echo '<a href="clubs.php">Return to Clubs Lists</a>';
                echo '<a href="club-details.php">Add Another Club</a>';
            }
        ?>
    </main>
</body>
</html>