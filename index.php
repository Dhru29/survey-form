<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Routine Survey</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script>
        function toggleData() {
            var dataDiv = document.getElementById('dataDiv');
            if (dataDiv.style.display === 'none') {
                dataDiv.style.display = 'block';
            } else {
                dataDiv.style.display = 'none';
            }
        }
    </script>
</head>
<body>
<div class="container">
    <h2 class="mt-5">Daily Routine Survey-1</h2>
    <form action="submit.php" method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="wake_up_time">Wake Up Time:</label>
            <input type="time" class="form-control" id="wake_up_time" name="wake_up_time" required>
        </div>
        <div class="form-group">
            <label for="breakfast_time">Breakfast Time:</label>
            <input type="time" class="form-control" id="breakfast_time" name="breakfast_time" required>
        </div>
        <div class="form-group">
            <label for="work_start_time">Work Start Time:</label>
            <input type="time" class="form-control" id="work_start_time" name="work_start_time" required>
        </div>
        <div class="form-group">
            <label for="lunch_time">Lunch Time:</label>
            <input type="time" class="form-control" id="lunch_time" name="lunch_time" required>
        </div>
        <div class="form-group">
            <label for="dinner_time">Dinner Time:</label>
            <input type="time" class="form-control" id="dinner_time" name="dinner_time" required>
        </div>
        <div class="form-group">
            <label for="sleep_time">Sleep Time:</label>
            <input type="time" class="form-control" id="sleep_time" name="sleep_time" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <button onclick="toggleData()" class="btn btn-info mt-3">View Submitted Data</button>

    <div id="dataDiv" style="display:none;" class="mt-3">
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
</div>
</body>
</html>
