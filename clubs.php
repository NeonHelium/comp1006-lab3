<!-- handles retreival and display of information from the database -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clubs</title>
    <!-- Boostrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <h1>Clubs List</h1>
    <table>
        <thead>
            <tr>
                <th>Club Name</th>
                <th>Club Ground</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Connect to the db
                require 'db.php';

                // Retreive the information from the database
                $sql = "SELECT clubId, clubName AS 'Club Name', ground AS 'Club Ground' FROM clubs";

                $cmd = $db->prepare($sql);
                $cmd->execute();
                $clubs = $cmd->fetchAll();

                foreach($clubs as $club){
                    echo '<tr>
                            <td>
                                <a href="club-details.php?clubId=' . $club['clubId'] . '">' . $club['Club Name'] . '</a>' . 
                            '</td>
                            <td>'
                                . $club['Club Ground'] . 
                            '</td>
                        </tr>';  
                }

                // Disconnect
                $db = null;
            ?>
        </tbody>
    </table>
</body>
</html>