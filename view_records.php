<?php
include 'db.php';

$racks_result = $conn->query("SELECT * FROM racks ORDER BY id ASC");

$subject_filter = isset($_GET['subject']) ? $_GET['subject'] : "";
$rack_filter = isset($_GET['rack']) ? $_GET['rack'] : "";

$sql = "SELECT records.*, racks.rack_name 
        FROM records 
        JOIN racks ON records.rack_id = racks.id 
        WHERE 1=1";

if (!empty($subject_filter)) {
    $sql .= " AND records.subject LIKE '%$subject_filter%'";
}

if (!empty($rack_filter)) {
    $sql .= " AND records.rack_id = '$rack_filter'";
}

$sql .= " ORDER BY records.id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <h2 class="text-center mb-3">📁 View Records</h2>

        <!-- Search Form -->
        <form method="GET" action="" class="row g-3 mb-4">
            <div class="col-12 col-md-5">
                <input type="text" name="subject" class="form-control" placeholder="Search by Subject" value="<?= htmlspecialchars($subject_filter) ?>">
            </div>
            <div class="col-12 col-md-4">
                <select name="rack" class="form-select">
                    <option value="">-- Filter by Rack --</option>
                    <?php while ($row = $racks_result->fetch_assoc()) { ?>
                        <option value="<?= $row['id'] ?>" <?= ($rack_filter == $row['id']) ? "selected" : "" ?>>
                            <?= $row['rack_name'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-12 col-md-3 text-center">
                <button type="submit" class="btn btn-primary w-100">🔍 Search</button>
                <a href="view_records.php" class="btn btn-secondary w-100 mt-2">Reset</a>
            </div>
        </form>

        <!-- Records Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Rack</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?= $row["id"] ?></td>
                                <td><?= htmlspecialchars($row["title"]) ?></td>
                                <td><?= htmlspecialchars($row["subject"]) ?></td>
                                <td><?= $row["day"] . " " . $row["month"] . " " . $row["year"] ?></td>
                                <td><?= htmlspecialchars($row["rack_name"]) ?></td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr><td colspan="5" class="text-center">No records found.</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
