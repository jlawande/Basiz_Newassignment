<!DOCTYPE html>
<html>
<head>
    <title>Assignment 3 – String Replace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h3>Assignment 3 – Replace Name, Email, Mobile, Designation</h3>

<form method="post">
    <!-- Original String -->
    <div class="mb-2">
        <label for="text" class="form-label">Input String</label>
        <textarea id="text" name="text" class="form-control" rows="8">
@Name@ ipsum dolor sit amet, consectetur adipiscing elit. Praesent in mollis magna. Donec eu elit pellentesque, maximus nisl vitae, cursus velit. Sed Loremnibh sed elit auctor tincidunt. Donec tempor est id nunc ullamcorper rhoncus. Phasellus nec arcu et dui varius ullamcorper commodo quis ligula. Etiam ultrices nisi @email@, ut euismod elit tempor sed. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor turpis vel nisi fermentum, a sodales magna egestas. Vestibulum lobortis elit sed neque rhoncus, sit amet @mobile@ magna blandit. @designation@ nec leo ac diam euismod fringilla.
        </textarea>
    </div>

    <!-- Name -->
    <div class="mb-2">
        <label for="name" class="form-label">Name</label>
        <input id="name" name="name" class="form-control" value="RRRR">
    </div>

    <!-- Email -->
    <div class="mb-2">
        <label for="email" class="form-label">Email</label>
        <input id="email" name="email" class="form-control" value="RRR@RRR.com">
    </div>

    <!-- Mobile -->
    <div class="mb-2">
        <label for="mobile" class="form-label">Mobile</label>
        <input id="mobile" name="mobile" class="form-control" value="9988775566">
    </div>

    <!-- Designation -->
    <div class="mb-2">
        <label for="designation" class="form-label">Designation</label>
        <input id="designation" name="designation" class="form-control" value="Software Developer">
    </div>

    <button class="btn btn-primary">Replace</button>
</form>

<hr>

<h5>Output:</h5>
<div class="alert alert-success">
<?php
if($_POST){
    $text = $_POST['text'];

    // Create replace array
    $replace = [
        "@Name@" => $_POST['name'],
        "@email@" => $_POST['email'],
        "@mobile@" => $_POST['mobile'],
        "@designation@" => $_POST['designation']
    ];

    // Replace placeholders with actual values
    echo nl2br(str_replace(array_keys($replace), array_values($replace), $text));
}
?>
</div>

</body>
</html>
