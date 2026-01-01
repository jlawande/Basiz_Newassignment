<!DOCTYPE html>
<html>
<head>
    <title>Assignment 6 – Triplet Sum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h3>Assignment 6 – Find Triplet with Given Sum</h3>

<form method="post">
    <!-- Array Input -->
    <div class="mb-2">
        <label for="array" class="form-label">Enter Array Elements (comma separated)</label>
        <input type="text" id="array" name="array" class="form-control" placeholder="e.g. 12,3,4,1,6,9" 
        value="<?php echo isset($_POST['array']) ? $_POST['array'] : '12,3,4,1,6,9'; ?>" required>
    </div>

    <!-- Sum Value -->
    <div class="mb-2">
        <label for="val" class="form-label">Enter Sum Value</label>
        <input type="number" id="val" name="val" class="form-control" placeholder="e.g. 24" 
        value="<?php echo isset($_POST['val']) ? $_POST['val'] : '24'; ?>" required>
    </div>

    <button class="btn btn-primary">Find Triplet</button>
</form>

<hr>

<h5>Output:</h5>
<div class="alert alert-success">
<?php
if ($_POST) {
    // Get array and sum value
    $array = array_map('intval', explode(',', $_POST['array']));
    $val = intval($_POST['val']);
    $found = false;

    // Loop to find triplet
    $n = count($array);
    for ($i = 0; $i < $n - 2; $i++) {
        for ($j = $i + 1; $j < $n - 1; $j++) {
            for ($k = $j + 1; $k < $n; $k++) {
                if ($array[$i] + $array[$j] + $array[$k] == $val) {
                    echo "Triplet Found: {" . $array[$i] . "," . $array[$j] . "," . $array[$k] . "}<br>";
                    $found = true;
                    break 3; // exit all loops once found
                }
            }
        }
    }

    if (!$found) {
        echo "No Triplet Found that sums to $val";
    }
}
?>
</div>

</body>
</html>
