<!DOCTYPE html>
<html>
<head>
    <title>Assignment 5 – HTML Find & Replace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h3>Assignment 5 – HTML Content Find & Replace</h3>

<form method="post">
    <!-- Sample HTML -->
    <div class="mb-2">
        <label for="html" class="form-label">HTML Content</label>
        <textarea id="html" name="html" class="form-control" rows="8">
<p align="justify" style="orphans: 0; widows: 0; margin-left: 0.39cm; margin-bottom: 0cm; border: none; padding: 0cm">
<b>PARTY</b>2NAME<i>, </i>a company incorporated under the laws of ROC2LAW having its Registered Office at P1OFFICEADD. which expression, shall unless it be repugnant to the context or meaning thereof, mean and include its successors and assigns (hereinafter referred to as ‘‘ Service Provider’) of the ONE PART
</p>
        </textarea>
    </div>

    <!-- Text to Find 1 -->
    <div class="mb-2">
        <label for="find1" class="form-label">Text to Find 1</label>
        <input id="find1" name="find1" class="form-control" value="PARTY">
    </div>

    <!-- Text to Replace 1 -->
    <div class="mb-2">
        <label for="replace1" class="form-label">Text to Replace 1</label>
        <input id="replace1" name="replace1" class="form-control" value="Abc india pvt. Ltd.">
    </div>

    <!-- Text to Find 2 -->
    <div class="mb-2">
        <label for="find2" class="form-label">Text to Find 2</label>
        <input id="find2" name="find2" class="form-control" value="P1OFFICEADD.">
    </div>

    <!-- Text to Replace 2 -->
    <div class="mb-2">
        <label for="replace2" class="form-label">Text to Replace 2</label>
        <input id="replace2" name="replace2" class="form-control" value="Mount Road,chennai-60014.">
    </div>

    <button class="btn btn-primary">Replace</button>
</form>

<hr>

<h5>Output:</h5>
<div class="alert alert-success">
<?php
if($_POST){
    $html = $_POST['html'];

    // Array of find and replace
    $find = [$_POST['find1'], $_POST['find2']];
    $replace = [$_POST['replace1'], $_POST['replace2']];

    // Replace text in HTML
    echo str_replace($find, $replace, $html);
}
?>
</div>

</body>
</html>
