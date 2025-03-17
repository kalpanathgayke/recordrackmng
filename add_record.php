<?php
// Database connection
include 'db.php';

// Fetch racks from database
$racks_result = $conn->query("SELECT * FROM racks ORDER BY id ASC");

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $subject = $_POST["subject"];
    $day = $_POST["day"];
    $month = $_POST["month"];
    $year = $_POST["year"];
    $rack_id = $_POST["rack"];

    $sql = "INSERT INTO records (title, subject, day, month, year, rack_id) 
            VALUES ('$title', '$subject', '$day', '$month', '$year', '$rack_id')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Record added successfully in Rack ID: $rack_id!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Add Record</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Title:</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Subject:</label>
                <input type="text" name="subject" class="form-control" required>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Day:</label>
                    <select name="day" class="form-select" required>
                        <?php for ($i = 1; $i <= 31; $i++) echo "<option>$i</option>"; ?>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Month:</label>
                    <select name="month" class="form-select" required>
                        <?php 
                        $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                        foreach ($months as $month) echo "<option>$month</option>";
                        ?>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Year:</label>
                    <select name="year" class="form-select" required>
                        <?php for ($i = 2000; $i <= date("Y"); $i++) echo "<option>$i</option>"; ?>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Select Rack:</label>
                <select name="rack" class="form-select" required>
                    <option value="">-- Select Rack --</option>
                    <?php while ($row = $racks_result->fetch_assoc()) { ?>
                        <option value="<?= $row['id'] ?>"><?= $row['rack_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Record</button>
        </form>
    </div>
</body>
</html>
