<!DOCTYPE html>
<html>
<head>
    <title>Assignment 4 – Days Between Two Dates</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h3>Assignment 4 – Number of Days Between Two Dates</h3>

<form method="post">
    <div class="mb-2">
        <label for="date1" class="form-label">Date 1</label>
        <input type="date" id="date1" name="date1" class="form-control" 
        value="<?php echo isset($_POST['date1']) ? $_POST['date1'] : ''; ?>" required>
    </div>

    <div class="mb-2">
        <label for="date2" class="form-label">Date 2</label>
        <input type="date" id="date2" name="date2" class="form-control" 
        value="<?php echo isset($_POST['date2']) ? $_POST['date2'] : ''; ?>" required>
    </div>

    <button class="btn btn-primary">Calculate</button>
</form>

<hr>

<h5>Output:</h5>
<div class="alert alert-success">
<?php
if ($_POST) {
    $date1 = new DateTime($_POST['date1']);
    $date2 = new DateTime($_POST['date2']);

    // Calculate difference
    $diff = $date1->diff($date2);
    $days = $diff->days;

    echo "<strong>$days Days</strong><br>";

    // Convert number to words
    // Use NumberFormatter
    if (class_exists('NumberFormatter')) {
        $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        echo ucfirst($f->format($days)) . " Days";
    } else {
        echo "(Number to word conversion not available)";
    }
}
?>
</div>

</body>
</html>
