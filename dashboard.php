<?php
include 'db.php';

$total_records = $conn->query("SELECT COUNT(*) AS total FROM records")->fetch_assoc()['total'];
$total_racks = $conn->query("SELECT COUNT(*) AS total FROM racks")->fetch_assoc()['total'];

$recent_records = $conn->query("SELECT title, subject, rack_id FROM records ORDER BY id DESC LIMIT 5");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <h2 class="text-center mb-4">📊 Dashboard</h2>

        <!-- Stats Cards -->
        <div class="row text-center">
            <div class="col-md-6 mb-3">
                <div class="card shadow p-3">
                    <h4>Total Records</h4>
                    <h2><?= $total_records ?></h2>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card shadow p-3 bg-success text-white">
                    <h4>Total Racks</h4>
                    <h2><?= $total_racks ?></h2>
                </div>
            </div>
        </div>

        <!-- Recent Records -->
        <div class="mt-4">
            <h4>📋 Recent Records</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Title</th>
                            <th>Subject</th>
                            <th>Rack</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $recent_records->fetch_assoc()) { ?>
                            <tr>
                                <td><?= htmlspecialchars($row["title"]) ?></td>
                                <td><?= htmlspecialchars($row["subject"]) ?></td>
                                <td><?= htmlspecialchars($row["rack_id"]) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="text-center mt-4">
            <a href="add_record.php" class="btn btn-primary">➕ Add Record</a>
            <a href="view_records.php" class="btn btn-secondary">📂 View Records</a>
        </div>
    </div>
</body>
</html>
