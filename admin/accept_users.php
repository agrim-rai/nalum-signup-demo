<?php
include('../backend/connection.php');

?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <title>admin -- nalum</title>
    <link rel="shortcut icon" href="../assets/img/logo_new.jpg" type="image/x-icon">


    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            white-space: nowrap;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .btn {
            padding: 8px 12px;
            margin-right: 5px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 12px;
        }

        .btn-accept {
            background-color: #4CAF50;
            color: white;
        }

        .btn-reject {
            background-color: #f44336;
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
        }

        .action-column {
            text-align: center;
        }

        .scrollable-table {
            overflow-x: auto;
        }
    </style>
</head>


<body>
    <div class="scrollable-table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>filepath</th>
                    <th>datetime</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php

                try {
                    $sql = "SELECT *
FROM waiting_users
WHERE id NOT IN (
    SELECT id 
    FROM accepted_users
);";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();


                    // Fetch all results as an associative array
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($results as $row) {
                        $id = $row['id'];
                        $waitingid = $row['waitingid'];
                        $email = $row['email'];
                        $filepath = $row['filepath'];
                        $current_datetime = $row['current_datetime'];
                ?>
                        <tr>


                            <td><?php echo $id; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><img src="<?php echo '../' . $filepath; ?>" alt="Image" style="width: 50px; height: 50px;"></td>
                            <td><?php echo $current_datetime; ?></td>
                            <td class="action-column">

                                <form action="admin_backend/acceptuser.php" method="get">
                                    <input type="hidden" name="userid" value="<?php echo $id; ?>">
                                    <input type="hidden" name="userwaitingid" value="<?php echo $waitingid; ?>">
                                    <button class="btn btn-accept">Accept</button>
                                </form>

                                <form action="admin_backend/rejectuser.php" method="get">
                                    <input type="hidden" name="userid" value="<?php echo $id; ?>">
                                    <input type="hidden" name="userwaitingid" value="<?php echo $waitingid; ?>">
                                    <button class="btn btn-reject">Reject</button>
                                </form>

                            </td>
                        </tr>
                <?php
                    }
                } catch (Exception $e) {
                    echo $e;
                }

                ?>

            </tbody>
        </table>
    </div>
</body>
<script>
    // Select all images on the page
    const images = document.querySelectorAll('img');

    // Add click event listener to each image
    images.forEach(image => {
        image.addEventListener('click', () => {
            const imageUrl = image.src; // Get the source of the clicked image
            window.open(imageUrl, '_blank'); // Open the image in a new tab
        });
    });
</script>

</html>