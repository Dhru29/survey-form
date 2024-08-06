<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Submitted Survey Data</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Wake Up Time</th>
                <th>Breakfast Time</th>
                <th>Work Start Time</th>
                <th>Lunch Time</th>
                <th>Dinner Time</th>
                <th>Sleep Time</th>
                <th>Submitted At</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once('db.php');
          

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM daily_routine";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['wake_up_time']}</td>
                            <td>{$row['breakfast_time']}</td>
                            <td>{$row['work_start_time']}</td>
                            <td>{$row['lunch_time']}</td>
                            <td>{$row['dinner_time']}</td>
                            <td>{$row['sleep_time']}</td>
                            <td>{$row['created_at']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No data found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
